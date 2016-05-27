from flask import *
import database as db
import json

workouts = Blueprint('workouts', __name__, template_folder='views')

@workouts.route('/workout/add', methods=['POST'])
def add_workout_route():
  """ Add a workout """
  cur = db.get_cursor()
  
  data = request.get_json()
  user_id = data['user_id']
  date = data['date']
  short_name = data['short_name']
  weight = data['weight']
  reps = data['reps']
  sets = data['sets']
  notes = data['notes']

  print data
  print user_id
  # Make sure thelift exists in the database... really can't happen
  cur.execute("SELECT COUNT(*) AS count FROM lifts WHERE short_name = %s", [short_name])
  if cur.fetchone()['count'] == 0:
    abort(425)
  cur.execute("""
    INSERT INTO workouts 
    (user_id, workout_date, short_name, weight, reps, sets, notes)
    VALUES (%s, %s, %s, %s, %s, %s, %s);
    """, [user_id, date, short_name, weight, reps, sets, notes])

  return "Added the workout!" 

@workouts.route('/workouts/all')
def get_all_workouts_route():
  """ Gets all of a users workouts """
  print session
  if 'user_id' in session:
    cur = db.get_cursor()
    user_id = session['user_id']
    sql = """
      SELECT users.user_id, lifts.name, workout_date, weight, reps, sets
      FROM workouts, lifts 
      WHERE workouts.short_name = lifts.short_name AND
        workouts.user_id = %s 
      ORDER BY workout_date
      """ % user_id
    print sql
    cur.execute(sql)
    print cur.fetchall()
    return jsonify(cur.fetchall())
  return "Nothing"

@workouts.route('/workouts/recent')
def get_recent_workouts_route():
  """ Gets all of a users workouts """
  cur = db.get_cursor()
  data = {}
  data['best_lift'] = 200
  data['recent_lift'] = 100
  return jsonify(data)
