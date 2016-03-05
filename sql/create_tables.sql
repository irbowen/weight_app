
drop table if exists workout;
drop table if exists workouts;
drop table if exists users;
drop table if exists lifts;
drop table if exists lift_variants;

/*Ex. [1, Squat, Best lift there is],
[2, Curls in the Squat Rack, .....] */
CREATE TABLE lifts (
  short_name VARCHAR(10) PRIMARY KEY,
  name VARCHAR(255),
  description VARCHAR(255)
);

CREATE TABLE lift_variants (
  short_name VARCHAR(10) REFERENCES lifts,
  variant_short_name VARCHAR(10) PRIMARY KEY,
  variant_name VARCHAR(255),
  description VARCHAR(255)
);

/*Will have to chagne after fb login is done*/
CREATE TABLE users (
  user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  facebook_id VARCHAR(255),
  last_login DATETIME DEFAULT NOW()
);

/*Anything else to add here?*/
CREATE TABLE workouts (
  workout_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id INT REFERENCES users,
  short_name VARCHAR(10) REFERENCES lifts,
  variant_short_name VARCHAR(10) REFERENCES lifts,
  workout_date DATE,
  weight INT,
  reps INT,
  sets INT,
  notes VARCHAR(1024)
);
