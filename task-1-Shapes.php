<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Different Shapes Area (Class Inheritance)</title>
</head>
<body style="font-size: 25px">

<?php
  class Shape {
    // Setting the variables
    public $x;
    public $y;
    public $r;
  }   
    // Class for Calculating Circle area
    class cicle extends Shape {
      public function __construct( $r ) {
        $this-> r = $r; 
      }

      // Method for Calculating Circle area
      public function cicleArea () { 
        $this -> c_area = number_format($this -> r * $this -> r * pi(), 2, '.', '');
        echo "The area of the Circle is: <b>" . $this ->c_area ."</b><br />";
      } 
    } 

    // Class for Calculating Rectangle area
    class rectangle extends Shape {
      public function __construct($x, $y) {
        $this-> x = $x; 
        $this-> y = $y; 
      }

      // Method for Calculating Rectangle area
      public function rectangleArea () { 
        $this -> r_area = $this -> x * $this -> y;
        echo "The area of the Rectangle is: <b>" . $this ->r_area ."</b>";
      } 
    }

    //Setting the dimensions of shapes
    $c_area = new cicle(3); 
    $r_area = new rectangle(3, 5);

    //Printing the Calculated area
    $c_area -> cicleArea();
    $r_area -> rectangleArea();
?>
 
</body>
</html>
