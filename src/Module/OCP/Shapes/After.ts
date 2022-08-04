interface Shape {
    calculateArea(): number;
}

class Rectangle implements Shape {
    public width: number;
    public height: number;

    constructor(width: number, height: number) {
        this.width = width;
        this.height = height;
    }

    public calculateArea(): number {
        return this.width * this.height;
    }
}

class Circle implements Shape {
    public radius: number;

    constructor(radius: number) {
        this.radius = radius;
    }

    public calculateArea(): number {
        return Math.PI * (this.radius * this.radius);
    }
}

class AreaCalculator {
    public calculateArea(shape: Shape): number {
        return shape.calculateArea();
    }
}
