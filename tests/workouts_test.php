<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class WorkoutAPI_Test extends TestCase {

    public function test(): void {

        $workout_model = new MemoryWorkoutModel(); 
        $session = new MemorySession();
        $workout_api = new WorkoutAPI($workout_model, $session);
        $workout_api.addWorkout();
    }

}