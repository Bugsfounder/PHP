<?php 

    class Employee 
    {
         // CLASS PROPERTIES
        public $name;
        public $salary;
        public $id;


         // CLASS METHODS
         // CONSTRUCTOR HERE - IT ALLOWS YOU TO INITIALIZE OBJECTS. IT IS THE CODE WHICH IS EXECUTED WHENEVER A NEW OBJECT IS INSTANTIATED
        // function __construct(){
        //     // echo "This is my Constructor for Employee";

        // }
        function __construct($id, $name, $salary){
            $this->id = $id;
            $this->name = $name;
            $this->salary = $salary;
        }

        
    }
    
    $harry = new Employee(1, "Harry", 1000);

    echo $harry->id;
    echo"<br>";
    echo $harry->name;
    echo"<br>";
    echo $harry->salary;
    echo"<br>";


?>