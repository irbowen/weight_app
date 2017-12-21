package weightliftingtracker.weightliftintracker.test;

import org.junit.jupiter.api.Test;
import weightliftingtracker.Lift;
import weightliftingtracker.Workout;

import static org.junit.jupiter.api.Assertions.*;

public class WorkoutTest {

    private static final Lift ANY_LIFT = Lift.SQAUT;
    private static final int ANY_WEIGHT = 150;
    private static final int ANY_SETS = 10;
    private static final int ANY_REPS = 5;
    private static final Workout ANY_WORKOUT =
            new Workout(ANY_LIFT, ANY_WEIGHT, ANY_SETS, ANY_REPS);

    @Test
    public void testCanGetLiftFromWorkout() {
       assertEquals(ANY_LIFT, ANY_WORKOUT.getLift());
    }

    @Test
    public void testCanGetWeightFromWorkout() {
        assertEquals(ANY_WEIGHT, ANY_WORKOUT.getWeight());
    }

    @Test
    public void testCanGetSetsFromWorkout() {
        assertEquals(ANY_SETS, ANY_WORKOUT.getSets());
    }

    @Test
    public void testCanGetRepsFromWorkout() {
        assertEquals(ANY_REPS, ANY_WORKOUT.getReps());
    }

    @Test
    public void testCanGetTotalNumberOfRepsFromWorkout() {
        assertEquals(ANY_REPS * ANY_SETS,
                ANY_WORKOUT.getTotalNumberOfReps());
    }

    @Test
    public void testCanGetTotalAmountOfWeightMovedFromWorkout() {
        assertEquals(ANY_REPS * ANY_SETS * ANY_WEIGHT,
                ANY_WORKOUT.getTotalAmountOfWeightMoved());
    }
}
