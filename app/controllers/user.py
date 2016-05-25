from flask import *
import database as db
import json

user = Blueprint('user', __name__, template_folder='views')

@user.route('/user', methods=['POST'])
def create_user_routes():
  """ Creates a new user, otherwise updates the last login time """
  cur = db.get_cursor()
  data = request.get_json()
  name = data['name']
  user_id = data['user_id']
  if name is None or user_id is None:
    abort(404)
  cur.execute('SELECT count(*) as user_count FROM users WHERE facebook_id = %s', [user_id])
  if cur.fetchone()['user_count'] == 0:
    cur.execute('INSERT INTO users(name, facebook_id) VALUES(%s, %s)', [name, user_id])
  else:
    cur.execute('UPDATE users SET last_login = NOW() WHERE facebook_id = %s', [user_id])
  cur.execute('SELECT name, facebook_id, last_login FROM users WHERE facebook_id = %s', [user_id])
  result = cur.fetchone()
  return jsonify(result)
