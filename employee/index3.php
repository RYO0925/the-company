<?php
    include "employee.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Employee</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <form action="" method="post">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" name="full_name" id="full-name" placeholder="John Doe" required class="form-control mb-3">

                    <label for="civil-status" class="form-label">Civil Status</label>
                    <select name="civil_status" id="civil-status" class="form-select mb-3" required>
                        <option disabled selected>Select Civil Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                    </select>
                    <label for="position" class="form-label">Position</label>
                    <select name="position" id="position" class="form-select mb-3" required>
                        <option disabled selected>Select Position</option>
                        <option value="staff">Staff</option>
                        <option value="admin">Admin</option>
                    </select>

                    <label for="employment-status" class="form-label">Employment Status</label>
                    <select name="employment_status" id="employment-status" class="form-select mb-3" required>
                        <option disabled selected>Select Employment Status</option>
                        <option value="contractual">Contractual</option>
                        <option value="probationary">Probationary</option>
                        <option value="regular">Regular</option>
                    </select>

                    <label for="regular-hours" class="form-label">Regular Hours</label>
                    <input type="number" name="regular_hours" id="regular-hours" required class="form-control mb-3">

                    <label for="over-hours" class="form-label">Over Time Hours</label>
                    <input type="number" name="ot_hours" id="ot-hours" required class="form-control mb-3">

                    <input type="submit" class="btn btn-success w-100 mb-3" value="submit" name="btn_submit">
                </form>
            </div>


    <div class="col-8">
    <?php
    //FORM HANDLING
        if(isset($_POST['btn_submit']))
        {
            //INPUT
            $full_name = $_POST["full_name"];
            $civil_status = $_POST["civil_status"]; 
            $position = $_POST["position"];
            $employment_status = $_POST["employment_status"];
            $regular_hours = $_POST["regular_hours"];
            $ot_hours = $_POST["ot_hours"];
            
            //instantiate
            $employee = new Employee($full_name,  $civil_status, $position, $employment_status, $regular_hours, $ot_hours);

    ?>

            <table class="table table-bordered table-striped w-50 mx-auto">
                <tbody>
                    <tr>
                        <th class="bg-dark text-white">Full Name</th>
                        <td><?php echo ucfirst($employee->getName());?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white">Civil Status</th>
                        <td><?php echo ucfirst($employee->getCivilStatus());?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white">Position</th>
                        <td><?php echo ucfirst($employee->getPosition());?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white">Employment Status</th>
                        <td><?php echo ucfirst($employee->getEmploymentStatus());?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white">Gross Income</th>
                        <td>
                            <?php echo $employee->computeGrossIncome();?>
                            <br>
                            <small class="text-muted fst-italic">Regular Pay(<?php echo $employee->getRegularHours();?> hrs x <?php echo $employee->getRegularRate();?>) + OT Pay( <?php echo $employee->getOTHours();?> hrs x <?php echo $employee->getOTRate();?>)</small>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white">Net Income</th>
                        <td>
                            <?php echo $employee->computeNetIncome(); ?>
                            <br>
                            <small class="text-muted fst-italic">Gross Income(<?php echo $employee->computeGrossIncome();?>)- Deductions(Tax:<?php echo $employee->computeTax();?> + Health Care: <?php echo $employee->getHealthCare();?>)</small>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>