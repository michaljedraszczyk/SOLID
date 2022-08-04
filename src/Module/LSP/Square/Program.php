<?php

namespace App\Module\LSP\Square;

use Exception;

class Program
{
    public function init(): void
    {
        $shape1 = new Rectangle();
        $shape2 = new Square(); // child of rectangle.

        $collection = new ShapesCollection();
        $collection->addShape($shape1);
        $collection->addShape($shape2);

        $area = null;
        /** @var Rectangle $shape */
        foreach ($collection->getShapes() as $shape) {
            // IF we change mother for child (square for rectangle) we should ALWAYS get the same results from each method.
            $shape->setWidth(2);
            $shape->setHeight(3);

            $checkArea = $shape->area();

            if (null !== $area && $area !== $checkArea) {
                throw new Exception('LSP break');
            }
        }
    }
}
