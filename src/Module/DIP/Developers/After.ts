interface Developer {
    develop(): void;
}

class FrontendDeveloper implements Developer {
    public develop(): void {
        this.writeTypeScriptCode();
    }

    private writeTypeScriptCode(): void {
        // some method
    }
}

class BackendDeveloper implements Developer {
    public develop(): void {
        this.writePHPCode();
    }

    private writePHPCode(): void {
        // some method
    }
}

class SoftwareProject {
    public developers: Developer[];

    public createProject(): void {
        this.developers.forEach((developer: Developer) => {
            developer.develop();
        });
    }
}
