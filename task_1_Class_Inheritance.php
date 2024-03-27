<?php

class Shape {
    public $shapeName;

    public function __construct( $shapeName = '' ) {
        $this->shapeName = $shapeName;
    }

}

class Circle extends Shape {
    public function area( $radius ) {
        return M_PI * pow( $radius, 2 );
    }
}

class Rectangle extends Shape {
    public $length;
    public $height;
    public function area( $length, $height ) {
        return $length * $height;
    }
}

$myCircle = new Circle( 'The Circle' );
echo $myCircle->shapeName . " has an area of " . $myCircle->area( 10 );

echo PHP_EOL . PHP_EOL;

$myRectangle = new Rectangle( 'The Rectangle' );
echo $myRectangle->shapeName . " has an area of " . $myRectangle->area( 32, 10 );