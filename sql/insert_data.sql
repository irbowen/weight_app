
INSERT INTO lifts(short_name, name, description) VALUES 
('squat', 'Squat',  'Low-bar and below parallel'),
('osquat', 'Olypmic Squat',  'High bar, still below parallel'),
('bench', 'Bench Press',  'Flat bench touching your chest each time'),
('deadlift', 'Deadlift',  'Standard deadlift'),
('overhead', 'Overhead Press',  'Touching your chest each time'),
('row', 'Bent-Over Row',  'Gettin that cobra');

/*
INSERT INTO lift_variants(short_name, variant_short_name, variant_name, description) VALUES
('squat', 'lowbar', 'Low Bar Full Squat', 'Insert details here'),
('squat', 'highbar', 'High Bar / Olympic Squat', 'Insert details here'),
('bench', 'flatbench', 'Flat Bench', 'Touch your chest!'),
('bench', 'incline', 'Incline Bench', 'I only do incline, because I'm stronger on incline');
*/

INSERT INTO users(user_id, name) values (10153202870797322, 'Isaac Bowen');

INSERT INTO workouts(user_id, short_name, workout_date, weight, reps, sets, notes) VALUES
(10153202870797322, 'bench', '2016-05-28', 185, 5, 5, 'first time @rails'), 
(10153202870797322, 'deadlift', '2016-05-28', 185, 5, 4, 'grip stength is failing'),  
(10153202870797322, 'bench', '2016-06-01', 205, 5, 5, 'plus @225 3,4w/ help on last set'); 
