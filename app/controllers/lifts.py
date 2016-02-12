from flask import *
import database as db
import json

lifts = Blueprint('lifts', __name__, template_folder='views')

@lifts.route('/lifts')
def get_lifts_route():
  """ Return all of the primary lists """
  cur = db.get_cursor()
  cur.execute("SELECT name FROM lifts ORDER BY short_name")
  lift_names = cur.fetchall()
  return json.dumps(lift_names)

@lifts.route('/lifts/desc')
def get_lifts_desc_route():
  """ Return all of the primary lists  with their description"""
  cur = db.get_cursor()
  cur.execute("SELECT name, description FROM lifts ORDER BY short_name")
  lift_names = cur.fetchall()
  return json.dumps(lift_names)
