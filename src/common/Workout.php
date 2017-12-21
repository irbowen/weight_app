<?php declare(strict_types = 1);

/*
 * TODO
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */
class Workout {

    private $lift_type;
    private $set_collection;

    public function __construct(LiftType $lift_type) {
        $this->lift_type = $lift_type;
        $this->set_collection = array();
    }

    public function addSet(Set $set): void {

    }

    public function getNumberOfSets(): int {
    	return 0;
    }

    public function getAllSets(): array {
        return array();
    }

}
