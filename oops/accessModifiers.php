<?php
    echo "welcome to access modifiers in php" ;
    echo "<br>";
    
class Employee 
{
     // CLASS PROPERTIES
    private $name;
    private $salary;
    private $id;

    // DECLARE VARIALBE WITHOUT ANY ACCESS MODIFIER
    var $variable = "Harry";


     // CLASS METHODS
     // DISTRUCTOR HERE
     function __construct($id, $name, $salary){
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
    }

    function __destruct(){
        echo "I am distruct $this->name<br>";

    }

    // BY DEFAULT METHODS ARE PRIVATE BUT WE ARE DYNAMICALLY SET ITS ACCESS MODIFIERS 
    private function iAmPrivate(){
            echo " I  am a private function in this class";
    }
    
}

$harry = new Employee(1, "Harry", 1000);

// WE CANNOT ACCESS THE PRIVATE VARIABLES FROM OUTSIDE OF THE CLASS WE HAVE TO MAKE GETTERS AND SETTERS FOR GETTING VALUES OF THE VARIABLES
// echo $harry->id;
// echo"<br>";
// echo $harry->name;
// echo"<br>";
// echo $harry->salary;
// echo"<br>";

// DO NOT CALL THE PRIVATE FUNCTION.
// $harry->iAmPrivate(); //  --> ERROR



?>