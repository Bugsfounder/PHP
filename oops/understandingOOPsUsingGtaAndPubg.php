<?php

    // DEFINING CLASS HERE
    class Player{
        // PROPERTIES 
        public $name;
        public $speed = 5;
        public $running = false;
        public $stopRunning = false;

        // METHODS
        function setName($name){
            $this->name = $name;
        }

        function getName(){
            return $this->name;
        } 

        function stopRun(){
            $this->stopRunning = true;
        }

    }


    // MAIN PROGRAM STARTS HERE

    echo"welcome to oops understanding tutorial from codewithharry";
    echo"<br>";

    $player1 = new Player();
    $player1->setName("Harry");
    echo $player1->getName();
    echo"<br>";

    $player2 = new Player();
    $player2->setName("Larry");
    echo $player2->getName();
    echo"<br>";


    $player3 = new Player();
    $player3->setName("Marry");
    echo $player3->getName();
    echo"<br>";


    $player4 = new Player();
    $player4->setName("Carry");
    echo $player4->getName();
    echo"<br>";

    

?>