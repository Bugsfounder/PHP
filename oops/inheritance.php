<?php
    echo "What is inheritance";
    echo "<br>";
            
        class Employee {
            // private $name = "harry";
            // private $salary = 9000;
            protected $name = "harry";
            protected $salary = 9000;

            function showName(){
                echo "The name of Employee is: $this->name";
            }


        }
            
        class Programmer extends Employee {
           
            private $language = "Php";
            
            function showLang(){
                echo "The Language of the Programmer is: $this->language";
            }
            function changeLanguage($lang){
                $this->language=$lang;
            }



        }

        $harry = new Programmer();

?>