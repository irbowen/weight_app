
INSERT INTO lifts(short_name, name, description) VALUES 
("squat", "Squat",  "Low-bar and below parallel"),
("osquat", "Olypmic Squat",  "High bar, still below parallel"),
("bench", "Bench Press",  "Flat bench touching your chest each time"),
("deadlift", "Deadlift",  "Standard deadlift"),
("overhead", "Overhead Press",  "Touching your chest each time"),
("row", "Bent-Over Row",  "Gettin that cobra");

/*
INSERT INTO lift_variants(short_name, variant_short_name, variant_name, description) VALUES
("squat", "lowbar", "Low Bar Full Squat", "Insert details here"),
("squat", "highbar", "High Bar / Olympic Squat", "Insert details here"),
("bench", "flatbench", "Flat Bench", "Touch your chest!"),
("bench", "incline", "Incline Bench", "I only do incline, because I'm stronger on incline");
*/

INSERT INTO workouts(user_id, short_name, workout_date, weight, reps, sets) VALUES
(10153202870797322, 'squat', '2016-03-01', 135, 5, 5), 
(10153202870797322, 'squat', '2016-03-02', 140, 5, 5), 
(10153202870797322, 'squat', '2016-03-03', 145, 5, 5), 
(10153202870797322, 'squat', '2016-03-04', 150, 5, 5), 
(10153202870797322, 'squat', '2016-03-05', 155, 5, 5), 
(10153202870797322, 'squat', '2016-03-06', 165, 5, 5); 
