from flask import *

main = Blueprint('main', __name__)

# Just send the index.html page
# It will then make requests to all of the other resoures that it needs
@main.route('/')
def main_route():
  """ Send the main html page, and watch the magic happen """	
  return send_file('static/js/index.html')

