package weightliftingtracker.weightliftintracker.test;

import org.junit.jupiter.api.Test;
import weightliftingtracker.Lift;

import static org.junit.jupiter.api.Assertions.*;

public class LiftTest {

    @Test
    public void testSquatIsCorrect() {
        assertEquals(Lift.SQAUT.getShort_name(), "squat");
        assertEquals(Lift.SQAUT.getFull_name(), "Squat");
    }

    @Test
    public void testBenchIsCorrect() {
        assertEquals(Lift.BENCH.getShort_name(), "bench");
        assertEquals(Lift.BENCH.getFull_name(), "Bench Press");
    }
}
