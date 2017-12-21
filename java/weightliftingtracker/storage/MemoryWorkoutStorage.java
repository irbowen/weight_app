package weightliftingtracker.storage;

import weightliftingtracker.User;
import weightliftingtracker.Workout;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class MemoryWorkoutStorage implements WorkoutStorage {

    private final HashMap<User, ArrayList<Workout>> storage;

    public MemoryWorkoutStorage() {
       this.storage = new HashMap<>();
    }

    @Override
    public void addWorkout(User user, Workout workout) {
        this.storage.putIfAbsent(user, new ArrayList<>());
        this.storage.get(user).add(workout);
    }

    @Override
    public List<Workout> getAllWorkouts(User user) {
        return this.storage.get(user);
    }
}
