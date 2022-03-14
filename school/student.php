<?php
    require_once "person.php";

    //class Student is the child class; person is the parent class
    class Student extends Person
    {

        public function study($subject)
        {
            echo $this->name." is studying $subject"; //property name is from parent class
        }
    }

    //instantiate
    $student = new Student("Hiroya Haga", "Japan");
    echo "NAME: ".$student->getName()."<br>"; //from parent class (person)
    echo "ADDRESS: ".$student->getAddress()."<br>"; //from parent class(person)
    $student->study("Math");//from child class (student)

    //NOTE: The child class/ sub class van't inherit PRIVATE property and/ or METHODS FROM the parent class
?>