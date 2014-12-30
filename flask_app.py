import sqlite3
from contextlib import closing
from flask import Flask, make_response, jsonify, request, g
from flask import render_template, redirect, url_for
import time


app = Flask(__name__)
app.config.update(DATABASE = '/home/dequone/simpleapi/base2.db', DEBUG = False)

def connect_db():
    return sqlite3.connect(app.config['DATABASE'])

# run once from bash to setup tables
def init_db():
    with closing(connect_db()) as db:
        with app.open_resource('schema.sql', mode='r') as f:
            db.cursor().executescript(f.read())
        db.commit()
    db = connect_db()
    db.execute("insert into userinfo (username, password, status) values ('admin1', 'zxC_aQL2', 'ok')") #good
    db.commit()

@app.before_request
def before_request():
    g.db = connect_db()

@app.teardown_request
def teardown_request(exception):
    db = getattr(g, 'db', None)
    if db is not None:
        db.close()

# just show the main page
@app.route('/')
def index():
    login = request.args.get('login')
    user_error = request.args.get('user_error')
    return render_template('index.html', login = login, user_error = user_error)


# account page, target - login
@app.route('/account', methods=['POST', 'GET'])
def account():
    if request.method == 'POST':
        # data from forms (still index-page)
        username = request.form['user']
        password = request.form['pass']

        if len(str(username)) == 0:
            return redirect(url_for('index', login = 'user', user_error = None))
        elif len(str(password)) == 0:
            return redirect(url_for('index', login = 'pass', user_error = None))
        else:
            # check if can load account-page
            res = g.db.execute('select * from userinfo where username = "' + username + '"').fetchall()
            for row in res:
                if username in row:
                    if password in row:
                        uid = row[0]
                        u = row[1]
                        s = row[3]
                        toks = g.db.execute('select token from tokens where user_id = ' + str(uid)).fetchall()
                        return render_template('account.html', username = u, status = s, tokens = toks)
            return redirect(url_for('index', login = 'nouser', user_error = None))
    else:
        # reload from inside of account ...
        u = request.args.get('username')
        p = request.args.get('password')
        comp = g.db.execute('select password, status, user_id from userinfo where username = "'+str(u)+'"').fetchall()[0]
        # comp = [ password, status, user_id ]
        if p == comp[0]:
            toks = g.db.execute('select token from tokens where user_id = ' + str(comp[2])).fetchall()
            return render_template('account.html', username = u, status = comp[1], tokens = toks)
        else:
            return redirect(url_for('index', login = 'pass', user_error = None))


@app.route('/create_new_token', methods=['POST'])
def creat_new_token():
    username = request.form['user']
    try:
        # find user_id and status
        res = g.db.execute('select user_id, password, status from userinfo where username = "' + str(username) + '"')
        res = res.fetchall()[0] # be carefull!
        user_id = res[0]
        password = res[1]
        status = res[2]
        # create new token
        if status == 'ok' or status == 'new':
            buf = "( " + str(user_id) + ", '" + do_random(username) + "', 'NA', 1)"
            g.db.execute("insert into tokens (user_id, token, permission, expiration) values " + buf)
            g.db.commit()
        else:
            status = "Can't add a new token to your account"
        # redirect back
        return redirect(url_for('account' , username = username, password = password))
    except Exception as e:
        r = {'log': str(e), 'error-tag': 'user', 'code': 401, 'message': 'oh fuck...'}
        return make_response(jsonify(r))

# create a token here, demo; IMPROVE
def do_random(username):
    return str(int(time.time()/1000-10.5)) + username.upper() + str(int(time.time()*1000))

# ----- hope I can add a little more security
@app.route('/delete_token', methods=['POST'])
def delete_token():
    token = request.form['token']
    username = request.form['user']
    res = g.db.execute('select password from userinfo where username = "' + str(username) + '"').fetchall()[0]
    # delete, without any checkup now...
    g.db.execute("delete from tokens where token = '" + token + "'")
    g.db.commit()
    return redirect(url_for('account' , username = username, password = res[0]))


# create new user
@app.route('/registration', methods=['POST'])
def sign_up():
    username = request.form['user']
    password = request.form['pass']
    if len(str(username)) == 0:
        return redirect(url_for('index.html', login = None, user_error = 'user'))
    elif len(str(password)) == 0:
        return redirect(url_for('index.html', login = None, user_error = 'pass'))
    else:
        # check if no user , create new...
        res = register(username, password)
        if res == 'done':
            return redirect(url_for('index', login = None, user_error = 'done'))
            #return render_template('index.html', login = None, user_error = 'done')
        else:
            return redirect(url_for('index', login = None, user_error = 'occup'))
            #return render_template('index.html', login = None, user_error = 'occup')

def register(u, p):
    res = g.db.execute("select username from userinfo").fetchall()
    for name in res:
        if u in name:
            return 'occup'
    try:
        buf = "('"+ u + "', '" + p + "', 'new')"
        g.db.execute("insert into userinfo (username, password, status) values " + buf)
        g.db.commit()
        return 'done'
    except:
        return 'occup'


@app.route('/delete_account', methods = ['POST'])
def delete_account():
    user = request.form['user']
    pasw = request.form['pass']
    user_id = check_user_pass(user, pasw)
    if user_id == -1:
        return redirect(url_for('account' , username = user))
    else:
        # delete account + all tokens
        g.db.execute("delete from tokens where user_id = " + str(user_id))
        g.db.execute("delete from userinfo where user_id = " + str(user_id))
        g.db.commit()
        return redirect(url_for('index'))


# add check-password-method, returns user_id on success and -1 if no user!!!
def check_user_pass(u, p):
    res = g.db.execute("select password, user_id from userinfo where username = '" + str(u) + "'").fetchall()[0]
    if p in res:
        return res[1]
    else:
        return -1


# --- DEVELOPERS API ---

# demo1 (with page)
@app.route('/v1', methods=['GET'])
def get_one():
    auth_token = request.args.get('auth_token')
    try:
        v = int(request.args.get('v'))
    except:
        v = None
    return render_template('v1api.html', auth_token = auth_token, v=v)

# demo2 (json only)
@app.route('/v2', methods=['GET'])
def post_one():
    auth_token = request.args.get('auth_token')
    method = request.args.get('method')
    res = g.db.execute('select * from tokens').fetchall()
    for t in res:
        if auth_token in t:
            r = {"auth_token": auth_token, "base": t,
                "template": "user_id, token, permissions, expiration", "method": str(method)}
            return make_response(jsonify(r))
    r = {'message': 'this auth_token is not registered', 'error-tag': 'auth_token', 'code': 401}
    return make_response(jsonify(r))


# --- ERRORS ---

@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify({'code': 404, 'message': 'Page not found'}), 404)

if __name__ == '__main__':
    app.run(host='0.0.0.0')
