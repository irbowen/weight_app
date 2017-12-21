<?php declare(strict_types = 1);

/*
 * Defines all the functionss that workout storage
 * should be able to perform.
 *
 * No surprises here - it should store workouts.
 * For now, it supports adding a workout to a users
 * workout list, and getting all workouts for a given
 * user
 *
 * @author Isaac Bowen bowen.isaac@gmail.com
 */ 
interface WorkoutStorage {
    public function add(User $user, Workout $workout);
    public function getAllWorkouts(User $user);
}

