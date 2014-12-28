from flask import Flask, make_response, jsonify, request, render_template

app = Flask(__name__)

@app.route('/')
def hello_world():
    r = '<html><title>dequone</title><h4>Hi there from Flask!</h4>'
    r += '<p>This is a root page.</p>'
    r += "Go to <a href='http://dequone.pythonanywhere.com/v1'>http://dequone.pythonanywhere.com/v1</a> "
    r += "passing 'auth_token' and 'v' parameters to continue the work"
    r += "<p>Thank you!</p></html>"
    return r


@app.route('/v1', methods=['GET'])
def post_one():
    auth_token = request.args.get('auth_token')
    v = request.args.get('v')
    if v != "1":
        v = None
    return render_template('v1api.html', auth_token = auth_token, v=v)


# work on this better...
@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify({'error': 'Not1 found', 'message': 'testing good'}), 404)


if __name__ == '__main__':
    app.run(host='0.0.0.0') #debug=True) #
