<?php declare(strict_types = 1);

require_once __DIR__ . '/../../vendor/autoload.php';

class WorkoutStorage {

  public function __construct(WorkoutModel $workout_model, Session $session) {
    $this->workout_model = $workout_model;
    $this->session = session;
  }

  public function add(Workout $workout) {
  
  }

  public function getAllWorkouts(Request $request, Response $response): array {

  }


}