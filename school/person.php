<?php
    class Person
    {
        protected $name; //protected access modifier->property/method is accesible to the parent class and the child class only
        private $address; //private access modifier->property/method is accesible to the parent class where it belongs only
        //public access modifier-> zccesible anywhere. It could accesible outside the class

        public function __construct($name, $address)
        {
            $this->name = $name;
            $this->address = $address;
        }

        //GETTERS
        public function getName()
        {
            return  $this->name;
        }

        public function getAddress()
        {
            return  $this->address;
        }
    }
?>
