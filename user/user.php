<?php
    class User
    {
        //properties
        private $first_name;
        private $last_name;
        private $birthday;

        //constructor
        public function __construct($first_name, $last_name, $birthday)
        {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->birthday = $birthday;
        }

        public function getFirstName()
        {
            return $this->first_name;
        }

        public function getLastName()
        {
            return $this->last_name;
        }

        public function getBirthday()
        {
            return $this->birthday;
        }

        //method
        public function age()
        {
            $birthday = new DateTime($this->birthday);
            $now = new DateTime();
            $difference = $now->diff($birthday);
            return  $difference->y;
        }
    }
?>