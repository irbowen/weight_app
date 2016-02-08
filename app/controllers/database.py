import MySQLdb
import MySQLdb.cursors
import os

def init():
  """ Intialize the database connection """
  global db
  is_gunicorn = "gunicorn" in os.environ.get("SERVER_SOFTWARE", "")
  options = {
    "host": "localhost",
    "user": "root" if is_gunicorn else "root",
    "passwd": "root" if is_gunicorn else "root",
    "db": "weight", 
    "cursorclass" : MySQLdb.cursors.DictCursor
  }
  db = MySQLdb.connect(**options)
  db.autocommit(True)

def get_cursor():
  return db.cursor()

