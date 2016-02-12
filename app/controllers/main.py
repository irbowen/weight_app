from flask import *
import database

main = Blueprint('main', __name__)

@main.route('/')
def main_route():
	return redirect( url_for('static', filename='js/index.html') )
