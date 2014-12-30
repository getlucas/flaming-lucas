import sqlite3
from contextlib import closing
from flask import Flask, make_response, jsonify, request, render_template, g
import time


app = Flask(__name__)
app.config.update(DATABASE = '/home/dequone/simpleapi/base2.db', DEBUG = True)

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
    return render_template('index.html', login = None, user_error = None)


# account page, target - login
@app.route('/account', methods=['POST'])
def account():
    username = request.form['user']
    password = request.form['pass']
    if len(str(username)) == 0:
        return render_template('index.html', login = 'user', user_error = None)
    elif len(str(password)) == 0:
        return render_template('index.html', login = 'pass', user_error = None)
    else:
        try:
            # load username, status; check pass
            res = g.db.execute('select * from userinfo where username = "' + username + '"').fetchall()
            for row in res:
                if username in row:
                    if password in row:
                        uid = row[0]
                        u = row[1]
                        s = row[3]
                        # get tokens
                        res = g.db.execute('select token from tokens where user_id = ' + str(uid)).fetchall()
                        return render_template('account.html', username = u, status = s, tokens = res)
            return render_template('index.html', login = 'nouser', user_error = None)
        except Exception as ex:
            return "Exception inside /account:<br><br>" + str(ex)


@app.route('/create_new_token', methods=['POST'])
def creat_new_token():
    username = request.form['user']
    try:
        # find user_id and status
        res = g.db.execute('select user_id, status from userinfo where username = "' + str(username) + '"')
        res = res.fetchall()[0] # be carefull!
        #return make_response(jsonify({"res":res, "len":len(res), "type": str(type(res))}))
        user_id = res[0]
        status = res[1]
        #return make_response(jsonify({"user_id": user_id, "status": status}))
        # add token
        if status == 'ok' or status == 'new':
            buf = "( " + str(user_id) + ", '" + do_random(username) + "', 'NA', 1)"
            g.db.execute("insert into tokens (user_id, token, permission, expiration) values " + buf)
            g.db.commit()
        else:
            status = "Can't add a new token to your account"
        # load updated page
        res = g.db.execute('select token from tokens where user_id = ' + str(user_id))
        res = res.fetchall()
        return render_template('account.html', username = username, status = status, tokens = res)
    except Exception as e:
        r = {'message': str(e), 'error-tag': 'user', 'code': 401}
        return make_response(jsonify(r))

# create a token here, demo; IMPROVE
def do_random(username):
    return str(int(time.time()/1000-10.5)) + username.upper() + str(int(time.time()*1000))


@app.route('/registration', methods=['POST'])
def sign_up():
    username = request.form['user']
    password = request.form['pass']
    if len(str(username)) == 0:
        return render_template('index.html', login = None, user_error = 'user')
    elif len(str(password)) == 0:
        return render_template('index.html', login = None, user_error = 'pass')
    else:
        # check if no user , create new...
        res = register(username, password)
        #return make_response(jsonify({"res":res}))
        if res == 'done':
            return render_template('index.html', login = None, user_error = 'done')
        else:
            return render_template('index.html', login = None, user_error = 'occup')


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
    #auth_token = request.args.get('auth_token')
    v = request.args.get('v')
    try:
        r = {'ver': int(v), 'message': 'abc hi!'}
    except:
        r = {'message': 'int for version required', 'error-tag': 'v'}
    return make_response(jsonify(r))


# -- error handling --
@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify({'code': 404, 'message': 'Page not found'}), 404)

if __name__ == '__main__':
    app.run(host='0.0.0.0')
    #debug=True) #
