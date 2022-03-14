<?php
    class Employee
    {
        //properties
        private $name;
        private $civil_status;
        private $position;
        private $employment_status;
        private $regular_hours;
        private $ot_hours;

        //constructor
        public function __construct($name, $civil_status, $position, $employment_status, $regular_hours, $ot_hours)
        {
            $this->name = $name;
            $this->civil_status = $civil_status;
            $this->position= $position;
            $this->employment_status = $employment_status;
            $this->regular_hours = $regular_hours;
            $this->ot_hours = $ot_hours;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getCivilStatus()
        {
            return $this->civil_status;
        }

        public function getPosition()
        {
            return $this->position;
        }
        
        public function getEmploymentStatus()
        {
            return $this->employment_status;
        }

        public function getRegularHours()
        {
            return $this->regular_hours;
        }

        public function getOTHours()
        {
            return $this->ot_hours;
        }

        public function getRegularRate()
        {
            $position = $this->getPosition();
            $employment_status = $this->employment_status;

            if($position == "staff" && $employment_status == "contractual")
            {
                return "300/day";
            }
            elseif($position == "staff" && $employment_status == "probationary")
            {
                return "350/day";
            }
            elseif($position == "staff" && $employment_status == "regular")
            {
                return "400/day";
            }
            elseif($position == "admin" && $employment_status == "contractual")
            {
                return "350/day";
            }
            elseif($position == "admin" && $employment_status == "probationary")
            {
                return "400/day";
            }
            elseif($position == "admin" && $employment_status == "regular")
            {
                return "500/day";
            }
        }

        public function getOTRate()
        {
            $position = $this->getPosition();
            $employment_status = $this->employment_status;

            if($position == "staff" && $employment_status == "contractual")
            {
                return "10/hr";
            }
            elseif($position == "staff" && $employment_status == "probationary")
            {
                return "25/hr";
            }
            elseif($position == "staff" && $employment_status == "regular")
            {
                return "30/hr";
            }
            elseif($position == "admin" && $employment_status == "contractual")
            {
                return "15/hr";
            }
            elseif($position == "admin" && $employment_status == "probationary")
            {
                return "30/hr";
            }
            elseif($position == "admin" && $employment_status == "regular")
            {
                return "40/hr";
            }
        }

        //methods
        public function computeGrossIncome()
        {
            //gross income = regular pay + ot pay
            return $this->computeRegularPay() + $this->computeOTPay();
        }

        public function computeRegularPay()
        {
            $position = $this->position;
            $employment_status = $this->employment_status;
            $regular_hours = $this->regular_hours;


            if($position == "staff" && $employment_status == "contractual")
            {
                //rate in hr * hours rendered
                return (300/8) * $regular_hours;
            }
            elseif($position == "staff" && $employment_status == "probationary")
            {
                return (350/8) * $regular_hours;
            }
            elseif($position == "staff" && $employment_status == "regular")
            {
                return (400/8) * $regular_hours;
            }
            elseif($position == "admin" && $employment_status == "contractual")
            {
                return (350/8) * $regular_hours;
            }
            elseif($position == "admin" && $employment_status == "probationary")
            {
                return (400/8) * $regular_hours;
            }
            elseif($position == "admin" && $employment_status == "regular")
            { 
                return (500/8) * $regular_hours;
            }
        }

        public function computeOTPay()
        {
            $position = $this->position;
            $employment_status = $this->employment_status;
            $ot_hours = $this->ot_hours;

            if($position == "staff" && $employment_status == "contractual")
            {
                return 10 * $ot_hours;
            }
            elseif($position == "staff" && $employment_status == "probationary")
            {
                return 25 * $ot_hours;
            }
            elseif($position == "staff" && $employment_status == "regular")
            {
                return 30 * $ot_hours;
            }
            elseif($position == "admin" && $employment_status == "contractual")
            {
                return 15 * $ot_hours;
            }
            elseif($position == "admin" && $employment_status == "probationary")
            {
                return 30 * $ot_hours;
            }
            elseif($position == "admin" && $employment_status == "regular")
            {
                return 40 * $ot_hours;
            }
        }

        public function computeNetIncome()
        {
            //net income = gross income - deductions
            //deductions = tax + healthcare
            $deduction = $this->computeTax() + $this->getHealthCare();
            $net_income = $this->computeGrossIncome() -  $deduction;

            return $net_income;
        }

        public function computeTax()
        {
            $civil_status = $this->civil_status;
            $gross_income = $this->computeGrossIncome();

            if($civil_status = "single" &&  $gross_income<= 1000)
            {
                return 0;
            }
            elseif($civil_status = "single" &&  $gross_income > 1000)
            {
                return $gross_income * .05;
            }
            elseif($civil_status = "married" &&  $gross_income > 1500)
            {
                return $gross_income * .03;
            }
        }

        public function getHealthCare()
        {
            $civil_status = $this->civil_status;

            if($civil_status = "single")
            {
                return 200;
            }
            else //married
            return 75;
        }

    }
    
?>