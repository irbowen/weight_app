
from flask import *
import database
import json

login = Blueprint('login', __name__, template_folder='views')

@login.route('/login', methods=['GET', 'POST'])
def login_route():
  """ Logs the user in, and redirects to /user/edit or the page 
      they were try to access beforehand """
  return "logged in"

@login.route('/logout', methods=['POST'])
def logout_route():
  """ Logs the user out """
  return "Logged out"
  
