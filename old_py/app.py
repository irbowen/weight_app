#!/usr/bin/env python

from flask import Flask, render_template, session
import controllers
import os

app = Flask(__name__, template_folder='templates')

PREFIX = "/api"

# This serves the javascript code to the user
app.register_blueprint(controllers.main)
# And these are the endpoints the angular js app will hit
app.register_blueprint(controllers.user, url_prefix = PREFIX)
app.register_blueprint(controllers.workouts, url_prefix = PREFIX)
app.register_blueprint(controllers.login, url_prefix = PREFIX)
app.register_blueprint(controllers.lifts, url_prefix = PREFIX)

# This is for privacy and sessions - latter
app.secret_key = os.urandom(24)

# If this is the main application (that is, you ran 'python app.py'),
# this will run on this address on port 4000, which should be the same
# port that you have in your Vagrantfile
if __name__ == '__main__':
    # listen on external IPs
    app.run(host='0.0.0.0', port=4000, debug=True)
