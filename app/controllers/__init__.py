# Import everything, and then run the database init

from database import *
from workouts import *
from login import *
from main import *
from lifts import *
from user import *

database.init()
