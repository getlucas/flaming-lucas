from flask import Flask, make_response, jsonify, request, g, render_template, redirect, url_for
from contextlib import closing
import sqlite3
import time
import uuid


app = Flask(__name__)
app.config.update(DATABASE = 'base.db', DEBUG = False)

def connect_db():
    return sqlite3.connect(app.config['DATABASE'])

# run once from bash to setup tables
def init_db():
    with closing(connect_db()) as db:
        with app.open_resource('schema.sql', mode='r') as f:
            db.cursor().executescript(f.read())
        db.commit()
    db = connect_db()
    db.execute("insert into userinfo (username, password, status) values ('admin1', 'zxC_aQL2', 5)") #good
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
    try:
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
                            toks = g.db.execute('select token from tokens where user_id = {0}'.format(uid)).fetchall()
                            return render_template('account.html', username = u, password = password,
                                                    exs = len(toks), limit = int(s), tokens = toks)
                return redirect(url_for('index', login = 'nouser', user_error = None))
        else:
            # redirect target, from inside of account ...
            u = request.args.get('username')
            p = request.args.get('password')
            comp = g.db.execute('select password, status, user_id from userinfo where username = "{0}"'.format(u)).fetchall()[0]
            # comp = [ password, limit, user_id ]
            if p == comp[0]:
                toks = g.db.execute('select token from tokens where user_id = {0}'.format(comp[2])).fetchall()
                return render_template('account.html', username = u, password = p,
                                        exs = len(toks), limit = int(comp[1]), tokens = toks)
            else:
                return redirect(url_for('index', login = 'pass', user_error = None))
    except Exception as e:
        return "Error {0}".format(e)


@app.route('/create_new_token', methods=['POST'])
def creat_new_token():
    username = request.form['user']
    try:
        # find user_id and limit (status)
        res = g.db.execute('select user_id, password, status from userinfo where username = "{0}"'.format(username))
        res = res.fetchall()[0] # be carefull!
        user_id = int(res[0])
        password = res[1]
        limit = int(res[2])
        exc = g.db.execute('select token from tokens where user_id = {0}'.format(user_id)).fetchall()
        if limit - len(exc) > 0:
            # create new token
            # datetime.datetime.fromtimestamp(x + 60*60*24*31) # to find date back
            g.db.execute("insert into tokens (user_id, token, permission, expiration) values ({0}, '{1}', 'basic', {2})".format(user_id, do_random(username), int(time.time()) + 60*60*24*30))
            g.db.commit()
        # redirect back
        return redirect(url_for('account' , username = username, password = password))
    except Exception as e:
        r = {'log': str(e), 'error-tag': 'user', 'code': 401, 'message': 'oh fuck...'}
        return make_response(jsonify(r))


def do_random(username):
    return str(uuid.uuid5(uuid.NAMESPACE_DNS, str(username.upper()) + str(int(time.time())) ))


@app.route('/delete_token', methods=['POST'])
def delete_token():
    token = request.form['token']
    username = request.form['user']
    password = request.form['secr']
    # security for side-post
    user_id = check_user_pass(username, password)
    if user_id == -1:
        return redirect(url_for('account' , username = username))
    else:
        g.db.execute("delete from tokens where token = '" + token + "'")
        g.db.commit()
        return redirect(url_for('account' , username = username, password = password))


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
        g.db.execute("insert into userinfo (username, password, status) values ('{0}', '{1}', 0)".format(u, p))
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
        g.db.execute("delete from tokens where user_id = {0}".format(user_id))
        g.db.execute("delete from userinfo where user_id = {0}".format(user_id))
        g.db.commit()
        return redirect(url_for('index'))

# --- DEVELOPERS API ---

# add check-password-method, returns user_id on success and -1 if no user!!!
def check_user_pass(u, p):
    if u != None and p != None:
        res = g.db.execute("select password, user_id from userinfo where username = '{0}'".format(u)).fetchall()[0]
        if p in res:
            return res[1]
    return -1

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
@app.route('/v2/<method>', methods=['GET'])
def post_one(method):
    if method == 'get_tokens':
        u = request.args.get('username')
        p = request.args.get('password')
        user_id = check_user_pass(u, p)
        if user_id == -1:
            return make_response(jsonify({"method": method, "error": "correct username or password are required"}))
        else:
            res = g.db.execute('select token, expiration from tokens where user_id = {0}'.format(user_id)).fetchall()
            out = []
            for row in res:
                r = {}
                r['auth_token'] = row[0]
                r['expires'] = row[1]
                out.append(r)
            return make_response(jsonify({"list": out}))
    else:
        auth_token = request.args.get('auth_token')
        res = g.db.execute('select * from tokens').fetchall()
        for t in res:
            if auth_token in t:
                # well, go on with all other methods
                if method == 'login':
                    # 1 - check token
                    # 2 - lauch script
                    # 3 - return

                    r = {"auth_token": auth_token, "base": t,
                        "template": "user_id, token, permissions, expiration", "method": str(method)}
                    return make_response(jsonify(r))
                else:
                    return make_response(jsonify({"method": method, "error": "this method is not registered"}))
        r = {'message': 'this auth_token is not registered', 'error-tag': 'auth_token', 'code': 401}
        return make_response(jsonify(r))


# --- ERRORS ---

@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify({'code': 404, 'message': 'Page not found'}), 404)


# --- HELPS, REFS ---

@app.route('/customer_help')
def customer_help():
    return render_template('customer_help.html')

@app.route('/developer_help')
@app.route('/v2')
def developer_help():
    return render_template('developer_help.html')


if __name__ == '__main__':
    app.run(host='0.0.0.0')
