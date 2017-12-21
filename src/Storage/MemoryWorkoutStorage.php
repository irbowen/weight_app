<?php declare(strict_types = 1);

/*
 * In-memory impl of work storage for testing
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */ 
class MemoryWorkoutStorage {

    private $storage;

    public function __construct() {
        $this->storage = array();
    }

    public function add(User $user, Workout $workout) {

    }

    public function getAllWorkouts(User $user) {

    }

}
