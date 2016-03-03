from flask import *
import database

main = Blueprint('main', __name__)

@main.route('/')
def main_route():
	return send_file('static/js/index.html')


