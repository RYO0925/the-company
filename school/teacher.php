<?php
     require_once "person.php";

     //class Teacher is the child class; person is the parent class
     class Teacher extends Person
     {
         public function teach($subject)
         {
            echo $this->name." teaches $subject"; //property name is from parent class
         }
     }

     //instantiate
     $teacher = new Teacher("Kirby Catalina", "Philippines");
        echo "NAME: ".$teacher->getName()."<br>"; //Method getName() is from parent class
        echo "ADDRESS: ".$teacher->getAddress()."<br>";//Method getAddress()  is from parent class
        echo $teacher->teach("Science");//from child class

        //NOTE: the child class/ subject can'T inherit PRIVATE PROPERTIES and/or METHODS FROM the parent class
    ?>