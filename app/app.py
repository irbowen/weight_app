
from flask import Flask, render_template, session
import controllers
import os

app = Flask(__name__, template_folder='templates')

PREFIX = "/api"

app.register_blueprint(controllers.main)
app.register_blueprint(controllers.login, url_prefix = PREFIX)
app.register_blueprint(controllers.lifts, url_prefix = PREFIX)

app.secret_key = os.urandom(24)

# comment this out using a WSGI like gunicorn
# if you dont, gunicorn will ignore it anyway
if __name__ == '__main__':
    # listen on external IPs
    app.run(host='0.0.0.0', port=4000, debug=True)
