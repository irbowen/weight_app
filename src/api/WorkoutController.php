<?php declare(strict_types = 1);

require_once __DIR__ . '/../../vendor/autoload.php';

/* 
 * This is the translater class - it receives incoming request objects,
 * and translate the HTTP request into a nice, clean, friendly for the
 * underlying storage system
 * 
 * @authoer Isaac Bowen bowen.isaac@gmail.com 
 */
class WorkoutController {

    WorkoutStorage $work_storage;
    Session $session;

    public function __construct(WorkoutStorage $work_storage, Session $session) {
        $this->work_storage = $work_storage;
        $this->session = session;
    }

    public function add(Request $request, Response $response) {

    }

    public function getAllWorkouts(Request $request, Response $response) {

    }

    public function getMaxWorkout(Request $request, Response $response) {
      // TODO
    }

    public function getMostRecentWorkout(Request $request, Response $response) {
      // TODO
    }
}



// Match an integer as id on:
// /api/workouts/max/USERID
$this->respond('GET', '/max/', WorkoutAPI::max
  function ($request, $response, $service, $app) {
    $user_id = $_SESSION['user_id'];
    $query = 'SELECT MAX(weight) AS max FROM workouts WHERE user_id = :user_id';
    $prepared_stmt = $app->db->prepare($query);
    $prepared_stmt->execute(['user_id' => $user_id]);
    $results = $prepared_stmt->fetch();
    $response->json(['user_id' => $user_id, 'best_lift' => $results['max']]);
  });

// Match an integer as id on:
// /api/workouts/recent/USERID
$this->respond('GET', '/recent/',
  function ($request, $response, $service, $app) {
    $user_id = $_SESSION['user_id'];
    $query = 'SELECT weight FROM workouts WHERE user_id = :user_id ORDER BY workout_date LIMIT 1';
    $prepared_stmt = $app->db->prepare($query);
    $prepared_stmt->execute(['user_id' => $user_id]);
    $response->json(['recent_lift' => $prepared_stmt->fetch()['weight']]);
  });

$this->respond('POST', '/add/',
  function ($request, $response, $service, $app) {

    /* We have to do this get the post params from angular. It sends things as application/json,
     * which we can then extract into local variables */
    $post_params = json_decode(trim(file_get_contents('php://input')), true);
    extract($post_params);

    $insert_stmt = 'INSERT INTO workouts(workout_date, user_id, short_name, weight, reps, sets, notes) VALUES';
    $insert_stmt .= '(:date, :user_id, :short_name, :weight, :reps, :sets, :notes)';

    $prepared_stmt = $app->db->prepare($insert_stmt);
    $prepared_stmt->execute(['date' => $date, 'short_name' => $short_name,'reps' => $reps,
      'sets' => $sets, 'user_id' => $user_id, 'weight' => $weight, 'notes' => $notes]);

    $response->json(['status' => 'good']);

  });

$this->respond('GET', '/all/',
  function ($request, $response, $service, $app) {
    $user_id = $_SESSION['user_id'];
    $query = 'SELECT weight,reps,sets,notes,workout_date,short_name FROM workouts WHERE user_id = :user_id ORDER BY workout_date';
    $prepared_stmt = $app->db->prepare($query);
    $prepared_stmt->execute(['user_id' => $user_id]);
    $results = $prepared_stmt->fetchAll();
    $response->json(['all_workouts' => $results]);
  });

