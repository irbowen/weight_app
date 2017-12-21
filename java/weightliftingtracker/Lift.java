package weightliftingtracker;

public enum Lift {
    SQAUT ("squat", "Squat", "TODO"),
    BENCH ("bench", "Bench Press", "TODO");

    private final String short_name;
    private final String full_name;
    private final String description;

    Lift(final String short_name, final String full_name, final String description) {
        this.short_name = short_name;
        this.full_name = full_name;
        this.description = description;
    }

    public String getShort_name() {
        return short_name;
    }

    public String getFull_name() {
        return full_name;
    }

    public String getDescription() {
        return description;
    }
}

