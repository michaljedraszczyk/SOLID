class Rectangle {
    public width: number;
    public height: number;

    constructor(width: number, height: number) {
        this.width = width;
        this.height = height;
    }
}

class Circle {
    public radius: number;

    constructor(radius: number) {
        this.radius = radius;
    }
}

class AreaCalculator {
    public calculateRectangleArea(rectangle: Rectangle): number {
        return rectangle.width * rectangle.height;
    }

    public calculateCircleArea(circle: Circle): number {
        return Math.PI * (circle.radius * circle.radius);
    }
}
