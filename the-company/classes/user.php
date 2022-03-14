<?php
    session_start();
    require_once "database.php";

    class User extends Database
    {
        public function createUser($first_name, $last_name, $username, $password)
        {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES('$first_name', '$last_name', '$username', '$hashed_password')";
          
            $result = $this->conn->query($sql); // $this->conn comes from the parent class (Database)

            if($result)
            {
                $_SESSION["success"] = 1;
                $_SESSION["message"] = "Registration Successful";
                header("Location: ../views/index.php");
            }
            else
            {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "An error occured. Kindly try again";
                header("Location: ../views/register.php");
            }
        }

        public function login($username, $password)
        {
            $sql = "SELECT * FROM users WHERE username= '$username' ";
            $result = $this->conn->query($sql);

            if($result) //check if sql statement runs sucessfully
            {

                if($result->num_rows==1) //check if sql statement returns
                {
                    $user_details = $result->fetch_assoc();
                    //verify password
                    $verify_password = password_verify($password, $user_details["password"]);

                    if($verify_password) //check if password correct
                    {
                        //save session details
                        $_SESSION["user_id"] = $user_details["user_id"];
                        $_SESSION["first_name"] = $user_details["first_name"];
                        $_SESSION["last_name"] = $user_details["last_name"];
                        $_SESSION["username"] = $user_details["username"];
                        //redirect to dashboard.php
                        header("Location: ../views/dashboard.php");
                    }
                    else
                    {
                        //select error message
                        $_SESSION["success"] = 0;
                        $_SESSION["message"] = "Inccorect Password.";
                        header("Location:../views/index.php");
                    }
                }
                else
                {
                    //select error message
                    $_SESSION["success"] = 0;
                    $_SESSION["message"] = "Username doesn't exist";
                    header("Location:index.php");
                }
            } 
            else
            {
                //set error message
                $_SESSION["success"] = 0;
                    $_SESSION["message"] = "An error occured. Failed to login.";
                    header("Location:index.php");
            }
        }

        public function getAllUsersExcept($user_id)
        {
            $sql = "SELECT * FROM users WHERE user_id != $user_id";
            $result = $this->conn->query($sql);

            if($result && $result->num_rows > 0)
            {
                return $result;
            }
            else
            {
                return FALSE;
            }
        }

        public function getUser($user_id)
        {
            $sql = "SELECT * FROM users WHERE user_id=$user_id";
            $result = $this->conn->query($sql);

            if($result && $result->num_rows == 1)
            {
                return $result->fetch_assoc();
            }
            else
            {
                return FALSE;
            }
        }

        public function updateUser($user_id, $first_name, $last_name, $username)
        {
            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE user_id = $user_id";
            $result = $this->conn->query($sql);

            if($result)
            {
                $_SESSION["success"] = 1;
                $_SESSION["message"] = "The record has been successfully updated.";
                header("Location:../views/dashboard.php");
            }
            else
            {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "An error occured. Failed to update the record. Kindly try again";
                header("Location:../views/dashboard.php");
            }
        }

        public function deleteUser($user_id)
        {
            $sql = "DELETE FROM users WHERE user_id = $user_id";
            $result = $this->conn->query($sql);

            if($result)
            {
                $_SESSION["success"] = 1;
                $_SESSION["message"] = "The record has been successfully deleted.";
                header("Location: ../views/dashboard.php");
            }
            else
            {
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "An error occured. Failed to delete the rocord. Kindly try again.";
                header("Location: ../views/dashboard.php");
            }
        }

        public function uploadFile($user_id, $file_name, $tmp_dir)
        {
            //filename saves
            $sql = "UPDATE users SET photo = '$file_name' WHERE user_id = $user_id";
            $result = $this->conn->query($sql);

            if($result)
            {
                //move the file to /assets/images
                $destination = "../assets/images/".$file_name;
                $result = move_uploaded_file($tmp_dir, $destination);

                if($result)
                {
                    $_SESSION["success"] = 1;
                    $_SESSION["message"] = "You have successfully upload your profile picture";
                    header("Location: ../views/profile.php");
                }
                else
                {
                    $_SESSION["success"] = 0;
                    $_SESSION["message"] = "An error occured. Failed to upload profile picture";
                    header("Location: ../views/profile.php");
                }
            }
            else
            {
                //set ERROR MESSAGE
                $_SESSION["success"] = 0;
                $_SESSION["message"] = "An error occured. Failed to upload profile picture";
                header("Location: ../views/profile.php");
            }
        }
    }
?>