<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

require_once('../src/common/Workout.php');

/*
 * Specifies the full set of lifts that this system will track
 * More to be added later
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */

const ANY_LIFT = SQUAT;
const ANY_WEIGHT = 135;
const ANY_SETS = 5;
const ANY_REPS = 6;

final class WorkoutTest extends TestCase {

    private $workout;

    public function setUp() {
        $this->workout = new Workout(ANY_LIFT, ANY_WEIGHT, ANY_SETS, ANY_REPS);
    }

    public function testWorkoutCanReturnLiftName(): void {
        $this->assertEquals(ANY_LIFT, $workout->getLiftShortname());
    }

    public function testWorkoutCanReturnNumberOfSets(): void {
        $this->assertEquals(ANY_SETS, $workout->getNumberOfSets());
    }

    public function testWorkoutCanReturnNumberOfRepsInEachSet(): void {
        $this->assertEquals(ANY_REPS, $workout->getNumberOfRepsPerSet());
    }

    public function testWorkoutCanReturnTotalNumberOfRepsInWorkout(): void {
        $this->assertEquals(ANY_SETS * ANY_REPS, $workout->getTotalRepsInWorkout());
    }

    public function testWorkoutCanReturnTotalWeightMovedInWorkout(): void {
        $this->assertEquals(ANY_SETS * ANY_REPS * ANY_WEIGHT, $workout->getTotalWeightMoved());
    }
}
