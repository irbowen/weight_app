package weightliftingtracker.storage;

import weightliftingtracker.User;
import weightliftingtracker.Workout;

import java.util.List;

public interface WorkoutStorage {

    void addWorkout(final User user, final Workout workout);
    List<Workout> getAllWorkouts(final User user);
}
