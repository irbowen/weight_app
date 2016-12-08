from flask import *
import database as db
import json

lifts = Blueprint('lifts', __name__, template_folder='views')

@lifts.route('/lifts')
def get_lifts_route():
  """ Return all of the primary lists """
  cur = db.get_cursor()
  cur.execute("SELECT name, short_name FROM lifts ORDER BY short_name")
  lift_names = cur.fetchall()
  return Response(json.dumps(lift_names), mimetype='application/json')

@lifts.route('/lifts/desc')
def get_lifts_desc_route():
  """ Return all of the primary lists  with their description"""
  cur = db.get_cursor()
  cur.execute("SELECT name, short_name, description FROM lifts ORDER BY short_name")
  lift_names = cur.fetchall()
  return Response(json.dumps(lift_names), mimetype='application/json')

# This probably will not be used.  I don't think we will need the 'variant' idea
@lifts.route('/lifts/variants/<short_name>')
def get_lift_variants(short_name):
  """  """
  cur = db.get_cursor()
  cur.execute("""
    SELECT name, variant_name 
    FROM lifts, lift_variants
    WHERE lifts.short_name = lift_variants.short_name
      AND lifts.short_name = %s""", [short_name])
  lift_names = cur.fetchall()
  return Response(json.dumps(lift_names), mimetype='application/json')

