
from flask import *
import database
import json

login = Blueprint('login', __name__, template_folder='views')

@login.route('/login', methods=['POST'])
def login_route():
  """ """
  userid = request.get_json()['userid']
  if userid is None:
  	return "Error"
  session['userid'] = userid
  print session
  return session['userid']

@login.route('/logout', methods=['POST'])
def logout_route():
  """ Logs the user out """
  return "Logged out"
  
