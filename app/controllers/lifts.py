from flask import *
import database as db
import json

lifts = Blueprint('lifts', __name__, template_folder='views')

@lifts.route('/lifts')
def get_lifts_route():
  """ Return all of the primary lists """
  cur = db.get_cursor()
  cur.execute("SELECT name FROM lifts ORDER BY lift_id")
  lift_names = cur.fetchall()
  print lift_names
  return json.dumps(lift_names)
