from flask import *
import database

main = Blueprint('main', __name__, template_folder='views')

@main.route('/')
def main_route():
  """ Just display the public albums """
  return "Hello world"
