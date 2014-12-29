import sqlite3
from flask import Flask, make_response, jsonify, request, render_template, g

# configuration
DATABASE = '/flaskr.db'
DEBUG = True
SECRET_KEY = 'development key'
USERNAME = 'admin'
PASSWORD = 'zxc321'

app = Flask(__name__)
app.config.from_envvar('FLASKR_SETTINGS', silent=True) #from_object(__name__)


def connect_db():
    return sqlite3.connect(app.config['DATABASE'])


# just show the main page
@app.route('/')
def index():
    return render_template('index.html', login = None, user_error = None)

# account page
@app.route('/account', methods=['POST'])
def account():
    username = request.form['user']
    password = request.form['pass']
    # load from db....
    if len(str(username)) == 0:
        return render_template('index.html', login = 'user', user_error = None)
    elif len(str(password)) == 0:
        return render_template('index.html', login = 'pass', user_error = None)
    else:
        return "got username: <u>" + str(username) + "</u><br>password: <u>" + str(password) + "</u>"
        #where load data? I think better here, and send list into page!
        #return render_template('account.html', data = dlist)


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
    v = request.args.get('v')

    try:
        r = {'ver': int(v), 'message': 'abc hi!'}
    except:
        r = {'message': 'int for version required', 'error-tag': 'v'}

    return make_response(jsonify(r))


# work on this better...
@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify({'error': 'Page not found', 'message': 'testing good, 404'}), 404)

if __name__ == '__main__':
    app.run(host='0.0.0.0') #debug=True) #
