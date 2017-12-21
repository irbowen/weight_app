package weightliftingtracker;

public class User {

    private final String user_id;

    public User(final String user_id) {
        this.user_id = user_id;
    }

    public String getUser_id() {
        return user_id;
    }

    @Override
    public boolean equals(Object o) {
        // TODO
        return false;
    }

    @Override
    public int hashCode() {
        // TODO
        return super.hashCode();
    }

    @Override
    public String toString() {
        // TODO
        return super.toString();
    }
}
