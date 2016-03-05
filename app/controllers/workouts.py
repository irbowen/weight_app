from flask import *
import database as db
import json

workouts = Blueprint('workouts', __name__, template_folder='views')

@workouts.route('/workout/add', methods=['POST'])
def add_workout_route():
  """ Add a workout """
  cur = db.get_cursor()
  
  data = request.get_json()
  userid = data['userid']
  date = data['date']
  short_name = data['short_name']
  weight = data['weight']
  reps = data['reps']
  sets = data['sets']
  notes = data['sets']

  #Verify lift is legit
  cur.execute("SELECT COUNT(*) AS count FROM lifts WHERE short_name = %s", [short_name])
  if cur.fetchone()['count'] == 0:
    abort(425)

  return "Added the workout!" 

@workouts.route('/workouts/all')
def get_all_workouts_route():
  """ Gets all of a users workouts """
  cur = db.get_cursor()
  print request.get_json()
  return cur.fetchall()

@workouts.route('/workouts/recent')
def get_recent_workouts_route():
  """ Gets all of a users workouts """
  cur = db.get_cursor()
  data = {}
  data['best_lift'] = 200
  data['recent_lift'] = 100
  return jsonify(data)
