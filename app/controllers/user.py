from flask import *
import database as db
import json

user = Blueprint('user', __name__, template_folder='views')

@user.route('/user', methods=['GET', 'POST'])
def create_user_routes():
  """ Return all of the primary lists """
  cur = db.get_cursor()
  if request.method == 'GET':
    return "Here"
  print request.json.get('name')
  print request.json.get('userid')
  name = request.json.get('name')
  userid = request.json.get('userid')
  cur.execute('SELECT count(*) as user_count FROM users WHERE facebook_id = %s', [userid])
  if cur.fetchone()['user_count'] == 0:
    cur.execute('INSERT INTO users(name, facebook_id) VALUES(%s, %s)', [name, userid])
  return "Or here"
