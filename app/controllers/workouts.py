from flask import *
import database as db
import json

workouts = Blueprint('workouts', __name__, template_folder='views')

@workouts.route('/workout/add')
def add_workout_route():
  """ Add a workout """
  cur = db.get_cursor()
  return "Added the workout!" 
