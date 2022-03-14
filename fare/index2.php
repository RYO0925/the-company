<?php
    include "fare.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Fare Activity</title>
</head>
<body>
    <div class="container">
        <div class="w-25 mt-5 mx-auto">
            <?php
                //FORM HANDLING
                if(isset($_POST['btn_submit']))
                {
                    //INPUT
                    $age = $_POST["age"];
                    $distance = $_POST["distance"];

                    //PROCESS
                    $fare = new Fare($age, $distance);
                    $fare->dueFare();
            ?>
                <div class="alert alert-success" role="alert">
                    Due fare is <?php echo $fare->dueFare(); ?>;
                </div>
            <?php
                }
            ?>
        </div>
        <div class="w-25 mx-auto mt-5">
            <form action="" method="post">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" required class="form-control mb-3" min="10" max="80">
                <label for="distance" class="form-label">DIstance (km)</label>
                <input type="number" name="distance" id="distance" required class="form-control mb-3">
                <input type="submit" value="submit" name="btn_submit" class="btn btn-success w-100">
            </form>
        </div>
    </div>
</body>
</html>