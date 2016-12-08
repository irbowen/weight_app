import MySQLdb
import MySQLdb.cursors
import os

def init():
  """ Intialize the database connection """
  global db
  # Hackish way to avoid changing passwords everywhere you deploy
  # for example, working on a local VM before pushing to product
  is_gunicorn = "gunicorn" in os.environ.get("SERVER_SOFTWARE", "")
  options = {
    "host": "localhost",
    "user": "root" if is_gunicorn else "root",
    "passwd": "root" if is_gunicorn else "root",
    "db": "weight", 
    "cursorclass" : MySQLdb.cursors.DictCursor
  }
  db = MySQLdb.connect(**options)
  # There is nothing we are doing that is so complicated we
  # need to worry about when we commit.  Just commit when 
  # the query happens
  db.autocommit(True)

# Pretty much what it says
def get_cursor():
  """ Makes the database object accessible to others """
  return db.cursor()

