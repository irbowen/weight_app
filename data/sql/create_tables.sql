drop table if exists workouts;
drop table if exists users;
drop table if exists lifts;

/*Ex. [1, Squat, Best lift there is],
[2, Curls in the Squat Rack, .....] */
CREATE TABLE lifts (
  lift_id serial PRIMARY KEY,
  name varchar(255),
  variant varchar(255),
  description varchar(255)
);

/*Will have to chagne after fb login is done*/
CREATE TABLE users (
  user_id serial PRIMARY KEY,
  name varchar(255),
  facebook_id varchar(255)
);

/*Anything else to add here?*/
CREATE TABLE workouts (
  workout_id serial PRIMARY KEY,
  user_id serial REFERENCES users,
  lift_id serial REFERENCES lifts,
  workout_date date,
  weight integer,
  reps integer,
  sets integer,
  notes varchar(1024)
);
