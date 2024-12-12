<?php
session_start();
include "connection.php";

$firstname_error = "";
$lastname_error = "";
$phone_error = "";
$dob_error = "";
$email_error = "";
$password_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $phone = $_POST['pno'];
    $dob = $_POST['dob'];
    $email = $_POST['eml'];
    $password = $_POST['pwd'];
    
    $_SESSION['error'] = [];
    if (empty($firstname)) {
        $_SESSION['error']['first_name_error'] = "First name is required";
    }
    if (empty($lastname)) {
        $_SESSION['error']['last_name_error'] = "Last name is required";
    }
    if (empty($phone) || strlen($phone) !== 10) {
        $_SESSION['error']['phone_error']= "Phone number must be exactly 10 digits";
    }
    if (empty($dob)) {
        $_SESSION['error']['dob_error'] = "Date of birth is required";
    } 
    elseif (time() < strtotime('+18 years', strtotime($dob))) {
        $_SESSION['error']['age_error'] = "Age must be 18 or older";
    }
    if (empty($email)) {
        $_SESSION['error']['email_error'] = "Email must be filled";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error']['email_error'] = "Invalid email format";
    }
    if (empty($password)) {
        $_SESSION['error']['password_error'] = "password must be filled";
    }
    // header("location:reg_form.php?error=Must fill all Correct");
}

if (isset($_POST['submit'])) {
    if (empty($firstname_error) && empty($lastname_error) && empty($phone_error) && empty($dob_error) && empty($email_error) && empty($password_error)) {
        $sql = "INSERT INTO players (first_name, last_name, phone_no, dob, email, password)
        VALUES ('$firstname', '$lastname', '$phone', '$dob', '$email', '$password')";
    
        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            header("location:reg_form.php?error=" . mysqli_error($conn));
        } else {
            header("location:reg_form.php?success=New player registered successfully!");
        }
    }
    
}

// echo "<pre>"; print_r($_SERVER);echo "</pre>";die();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="tour.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body class="reg_img">
    <div class="mx-auto" style="height: 600px; width:30%">
        <h2 class="text-center text-white">Registration Form</h2>
        
            <form action="reg_data.php" method="post">
                First Name <input type="text" class="form-control mt-3" name="fname" id="fname">
                <p><?php echo $firstname_error; ?></p>
                Last Name <input type="text" class="form-control mt-3" name="lname" id="lname">
                <p><?php echo $lastname_error;?></p>
                Phone no. <input type="number" class="form-control mt-3" name="pno" id="pno">
                <p><?php echo $phone_error?></p>
                DOB <input type="date" class="form-control mt-3" name="dob" id="dob">
                <p><?php echo $dob_error?></p>
                Email <input type="email" class="form-control mt-3" name="eml" autocomplete="off">
                <p><?php echo $email_error?></p>
                password <input type="password" class="form-control mt-3" name="pwd" autocomplete="new-password">
                <p><?php echo $password_error?></p>
                <button type="submit" class="form-control btn btn-warning mt-3" name="submit" onclick="return validationfrom()">Register</button>
        </div>
        </form>
    </div>
</body>

</html>
