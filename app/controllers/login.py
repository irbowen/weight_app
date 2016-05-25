
from flask import *
import database
import json

login = Blueprint('login', __name__, template_folder='views')

@login.route('/login', methods=['POST'])
def login_route():
  """ 
  Clients will post to this route with their user_id (from facebook)
  It should 
  - log you in if your user_id is valid
  - do nothing if you are already logged in (debug msg)
  - create an account for your
    - prompt you to create an account?
  """
  user_id = request.get_json()['user_id']
  if user_id is None:
  	return "Error"
  session['user_id'] = user_id
  print session
  return session['user_id']

@login.route('/logout', methods=['POST'])
def logout_route():
  """ Logs the user out """
  print "TODO"
  # TODO
  return "Logged out"
  
