<?php 

class Employee 
{
     // CLASS PROPERTIES
    public $name;
    public $salary;
    public $id;


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
    
}

$harry = new Employee(1, "Harry", 1000);
$harry1 = new Employee(2, "Harry1", 2000);
$harry2 = new Employee(3, "Harry2", 3000);

echo $harry->id;
echo"<br>";
echo $harry->name;
echo"<br>";
echo $harry->salary;
echo"<br>";

echo $harry1->id;
echo"<br>";
echo $harry1->name;
echo"<br>";
echo $harry1->salary;
echo"<br>";

echo $harry2->id;
echo"<br>";
echo $harry2->name;
echo"<br>";
echo $harry2->salary;
echo"<br>";


?>