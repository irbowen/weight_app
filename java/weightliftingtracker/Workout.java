package weightliftingtracker;

public class Workout {

    private final Lift lift;
    private final int weight;
    private final int sets;
    private final int reps;

    public Workout(final Lift lift, final int weight, final int sets, final int reps) {
        this.lift = lift;
        this.weight = weight;
        this.sets = sets;
        this.reps = reps;
    }

    public Lift getLift() {
        return lift;
    }

    public int getWeight() {
        return weight;
    }

    public int getSets() {
        return sets;
    }

    public int getReps() {
        return reps;
    }

    public int getTotalNumberOfReps() {
        return this.sets * this.reps;
    }

    public int getTotalAmountOfWeightMoved() {
        return getTotalNumberOfReps() * this.weight;
    }
}
