from flask import *
import database as db
import json

user = Blueprint('user', __name__, template_folder='views')

@user.route('/user', methods=['GET', 'POST'])
def create_user_routes():
  """ """
  cur = db.get_cursor()
  name = request.json.get('name')
  userid = request.json.get('userid')
  if name is None or userid is None:
    abort(404)
  cur.execute('SELECT count(*) as user_count FROM users WHERE facebook_id = %s', [userid])
  if cur.fetchone()['user_count'] == 0:
    cur.execute('INSERT INTO users(name, facebook_id) VALUES(%s, %s)', [name, userid])
  else:
    cur.execute('UPDATE users SET last_login = NOW() WHERE facebook_id = %s', [userid])
  cur.execute('SELECT last_login FROM users WHERE facebook_id = %s', [userid])
  result = cur.fetchone()
  return json.dumps(str(result['last_login']))
