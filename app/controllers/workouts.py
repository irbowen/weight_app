from flask import *
import database as db
import json

workouts = Blueprint('workouts', __name__, template_folder='views')

@workouts.route('/workout/add')
def add_workout_route():
  """ Add a workout """
  cur = db.get_cursor()
  print request.get_json()
  return "Added the workout!" 

@workouts.route('/workouts/all')
def get_all_workouts_route():
  """ Gets all of a users workouts """
  cur = db.get_cursor()
  print request.get_json()
  return cur.fetchall()
