<?php
    class Person
    {
        /**
         * Class Name
         * 1. class name should use PascalCase
         * 2. it shouls not use reserved PHP keywords(examples: isset, die, if, function)
         * 3. it should start with either a letter or an underscore(_)
         * 4. It should be singular
         */

         /**
          *  PROPERTIES -> variable declare inside your class
          */
          private $name;
          private $address;
          private $username = "user_example";
          private $password = "user_password";

          /**
           * METHOD -> functions declared inside the class
           * 
           */

           public function login($username, $password)
           {
                if( ($this->username == $username) && ($this->password == $password) ) 
                {
                    echo "Username and password matched";
                }
                else
                {
                    echo "Incorrect username and/or password";
                }
           }
    }

    // INSTANTIATION -> creating an object from a class
    $person = new Person();
    /**
     * start with the "new" keyword followed by the name of the class and a pair of parenthesis
     * the object will be assigned to variable person
     */
    $person->login("username", "password");
  
?>