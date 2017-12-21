package weightliftingtracker.weightliftintracker.test;

import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;
import weightliftingtracker.Lift;
import weightliftingtracker.User;
import weightliftingtracker.Workout;
import weightliftingtracker.storage.MemoryWorkoutStorage;

import java.util.UUID;

public class MemoryWorkStorageTest {

    private static User ANY_USER = new User(UUID.randomUUID().toString());
    private static Workout ANY_WORKOUT =
            new Workout(Lift.SQAUT, 150, 5, 10);

    @Test
    public void canAddWorkoutToStorage() {
        final MemoryWorkoutStorage storage = new MemoryWorkoutStorage();
        storage.addWorkout(ANY_USER, ANY_WORKOUT);
        Assertions.assertEquals(ANY_WORKOUT,
            storage.getAllWorkouts(ANY_USER).get(0));
    }
}
