from flask import *
import database as db
import json

user = Blueprint('user', __name__, template_folder='views')

def update_user_timestamp(user_id):
  """ Pretty much what the function name says """
  cur = db.get_cursor()
  cur.execute('UPDATE users SET last_login = NOW() WHERE user_id = %s', [user_id])

def create_user(user_id, name):
  """ Create a new entry in the users table """
  cur = db.get_cursor()
  cur.execute('INSERT INTO users(user_id, name) VALUES(%s, %s)', [user_id, name])

def user_exists(user_id):
  """ Check if a given user exists """
  cur = db.get_cursor()
  cur.execute('SELECT count(*) as C FROM users WHERE user_id = %s', [user_id])
  return cur.fetchone()['C'] == 1

@user.route('/login', methods=['POST'])
def create_user_routes():
  """ Creates a new user, otherwise updates the last login time """
  cur = db.get_cursor()
  data = request.get_json()
  name = data['name']
  user_id = data['user_id']
  if name is None or user_id is None:
    abort(404)
  if not user_exists(user_id):
    create_user(user_id, name)
  update_user_timestamp(user_id)
  
  cur.execute('SELECT name, user_id, last_login FROM users WHERE user_id = %s', [user_id])
  result = cur.fetchone()
  return jsonify(result)
