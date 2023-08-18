<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Method for Making Sounds (Polymorphism)</title>
</head>
<body style="font-size: 25px">
    
<?php

    // Declaring the Animal interface
    interface Animal{
        public function makeSound();
    }

    // Class to set the Dog sound
    class Dog implements Animal {
        private $dogSound;

        public function __construct($dogSound) {
            $this -> dogSound = $dogSound;
        }

        // Using interface method to set the Dog sound
        public function makeSound() {
            echo "The dog sound is <b>" . $this -> dogSound . "</b></br>";
        }
    }

    // Class to set the Cat sound
    class Cat implements Animal {
        private $catSound;

        public function __construct( $catSound ) {
            $this -> catSound = $catSound;
        }

        // Using interface method to set the Cat sound
        public function makeSound() {
            echo "The cat sound is <b>" . $this -> catSound . "</b></br>";
        }
    }

    // Setting the Dog and Cat sound
    $dSound = new Dog("Woof");
    $cSound = new Cat ("Meow");

     // Printing the Dog and Cat sound
    $dSound -> makeSound();
    $cSound -> makeSound();

?>

</body>
</html>