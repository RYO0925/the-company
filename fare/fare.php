<?php
    class Fare
    {
        //Properties
        private $age;
        private $distance;

        //constructor
        public function __construct($age, $distance)
        {
            $this->age = $age;
            $this->distance = $distance;
        }

        public function DueFare()
        {
            $age = $this->age;
            $distance = $this->distance;
            $base_fare = 8;

            if($distance <= 4 && $age >= 60)
            {
                return $base_fare * .80; //with discount
            }
            elseif($distance <= 4 && $age < 60)
            {
                return $base_fare;
            }
            elseif($distance > 4 && $age >= 60)
            {
                $fare = $base_fare + ($distance - 4);
                return $fare * .80; //with discount
            }
            elseif($distance > 4 && $age < 60)
            {
                return $base_fare + ($distance - 4);
            }
        }
    }
?>