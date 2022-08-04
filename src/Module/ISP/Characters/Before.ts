interface Character {
    swim(): void;
    talk(): void;
    dance(): void;
}

class Troll implements Character {
    public swim(): void {
        // a troll can't swim
    }

    public talk(): void {
        // a troll can't talk
    }

    public dance(): void {
        // some method
    }
}
