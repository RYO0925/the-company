<?php
    include "user.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Profile Page</title>
</head>
<body>
   <div>
       <div class="w-25 mx-auto mt-5">
           <form action="" method="post">
               <label for="first-name" class="form-label">First Name</label>
               <input type="text" name="first_name" id="first-name" required placeholder="John" class="form-control mb-3">
               <label for="last-name" class="form-label">Last Name</label>
               <input type="text" name="last_name" id="last-name" required placeholder="Doe" class="form-control mb-3">
               <label for="birthday" class="form-label">Birthday</label>
               <input type="date" name="birthday" id="birthday" required class="form-control mb-3">
               <input type="submit" value="submit" name="btn_submit" class="btn btn-success w-100">
           </form>
       </div>
       <div class="w-50 mx-auto mt-5">
            <?php
            //FORM HANDLING
            if(isset($_POST['btn_submit']))
            {
                //INPUT
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $birthday = $_POST["birthday"];

                //PROCESS
                //instantiate
                $user = new User($first_name, $last_name, $birthday);
                //line 39 came from line 33 to 35

                //OUTPUT
                ?>
                
                <table class="table table-bordered table-striped">
                    <thead class="bg-dark text-white"> 
                        <tr>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo$user->getFirstName()." ".  $user->getLastName();?></td>
                            <td><?php echo$user->getBirthday();?></td>
                            <td><?php echo$user->age();?></td>
                        </tr>
                    </tbody>
                </table>
            <?php
            }
            ?>
       </div>
   </div> 
</body>
</html>