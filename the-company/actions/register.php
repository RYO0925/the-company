<?php
include "../classes/user.php";

//instantiate

$user = new User();

//form handling
if(isset($_POST['btn_submit']))
{
    //input
    $first_name = $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //call createUser method user
    $user->createUser($first_name, $last_name, $username, $password );
}
?>