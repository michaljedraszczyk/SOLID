interface Talker {
    talk(): void;
}

interface Swimmer {
    swim(): void;
}

interface Dancer {
    dance(): void;
}

class Troll implements Swimmer, Dancer {
    public swim(): void {
        // some method
    }

    public dance(): void {
        // some method
    }
}
