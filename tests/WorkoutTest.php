<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

require_once('../src/common/Workout.php');
require_once('../src/common/LiftCollection.php');

/*
 * Specifies the full set of lifts that this system will track
 * More to be added later
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */
final class WorkoutTest extends TestCase {

    public function testWorkoutConstructionDefaults(): void {
        $lift_colleciton = new LiftCollection();
        $workout = new Workout($lift_colleciton->getLift(SQUAT));
        $this->assertEquals(0, $workout->getNumberOfSets());
        $this->assertEmpty($workout->getAllSets());

    }
}