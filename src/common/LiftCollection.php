<?php declare(strict_types = 1);

require_once('LiftType.php');

/*
 * Manages all of the allowable lifts in the system
 * To add a new lift, add a test to expect the value,
 * and then add 
 *      !) constant defintion
 *      2) the new LiftType to the $set_of_lifts
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */ 

// Constants to access every lift in the collection
// Ideally, this would be in an enum, but php...
define('SQUAT', 'squat');
define('BENCH', 'bench');

// On construction, builds an array of objects for each lift, 
// so this shouldn't be done often
// TODO: put this in a factory or singleton of some kind
class LiftCollection {

    private $set_of_lifts = array();

    public function __construct() {
        $this->set_of_lifts[SQUAT] = new LiftType(SQUAT, "Squat", "todo");
        $this->set_of_lifts[BENCH] = new LiftType(BENCH, "Bench Press", "todo");
    }

    public function getLift(string $lift_name): LiftType {
        return $this->set_of_lifts[$lift_name];
    }

    public function getAllLifts(): array {
        return $this->set_of_lifts;
    }

    public function getAllLiftShortNames(): array {
        return array_map(function (LiftType $liftType) {
            return $liftType->getShortName();
        }, $this->set_of_lifts);

    }

}
