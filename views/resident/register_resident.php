<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
require("../../database_instance.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title><meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to index navbar only -->
        <link href="../../css/index_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
    /* Add styles for the form */
    .resident-login-form {
        width: 400px;
        padding: 40px;
        border: 1px solid gray;
        border-radius: 10px;
        margin-top: 100px;
        background-color: lightgray;
    }

    /* Add styles for the form input fields */
    .resident-login-form input[type="text"],
    .resident-login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid black;
        border-radius: 5px;
    }

    /* Add styles for the form submit button */
    .resident-login-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        background-color: darkblue;
        color: white;
        cursor: pointer;
        border: none;
    }

    /* Add styles for the form heading */
    .resident-login-form h1 {
        margin-bottom: 30px;
        color: black;
    }

    /* Add styles for the form link */
    .resident-login-form a {
        color: blue;
        font-size: 12px;
        margin-top: 20px;
        display: block;
    }
</style>

</head>
<body>
    <!-- Top navbar at index ONLY -->
    <div class="index_navbar">
        <center>
            <a href="../index.php">Home</a>
            <a class="active" href="">Resident</a>
            <a href="../admin/admin_login_page.php">Admin</a>
        </center>
    </div>

    <center>
        <form action="register_resident.php" class="resident-login-form" method="POST">
            <h1>Sign up</h1>
            <input type="text" name="full_name" placeholder="Full Name" required=""> <br> <br>
            <input type="text" name="contactNo" placeholder="Mobile Number: 09XXXXXXXXX" required=""> <br> <br>
            <input type="text" name="username" placeholder="Username" required=""> <br> <br>  
            <input type="password" name="password" placeholder="Password" required=""> <br> <br>
            <input class="submit-form-btn" name="register" type="submit" value="REGISTER" required=""> <br> <br>

            <h4>Already have an account?</h4>
                <a href="../resident/resident_login_page.php">Login</a>
        </form>
    </center>
</body>
</html>

<!-- Register User into database -->
<?php
if(isset($_POST["register"])) {
    // Prepare variable parameters
    $full_name = trim(($_POST['full_name']));
    $contactNo = trim(($_POST['contactNo']));
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Error variables
    /** These two are used for validating contact number and usernames 
     * @note Contact number WILL BE USED TO VALIDATE A RESIDENT. 
     *      THIS IS TO AVOID HAVING MANY RESIDENTS USING THE SAME PHONE NUMBER
     *      THEREFORE, ENSURE TO NOTIFY THE USER IF A PHONE NUMBER IS TAKEN.
    */
    $full_name_err = $contactNo_err = $username_err = "";
    $isTaken_contactNum = false; 
    $isTaken_username = false; 

    // Validate full name 
    if (!filter_var($full_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        Print '<script>alert("Please, enter a valid name");</script>'; 
        $full_name_err = 1;
    }

    // Validate contact number
    elseif (!is_numeric($contactNo)) {
        Print '<script>alert("Please, enter a valid number!");</script>'; 
        $contactNo_err = 1;
    }

    elseif ($contactNo >= 99999999999) {
        Print '<script>alert("Please, enter a valid number!");</script>'; 
        $contactNo_err = 2;
    }

    elseif ($contactNo == 0 || $contactNo < 0) {
        Print '<script>alert("Please, enter a valid number!");</script>'; 
        $contactNo_err = 3;
    }

    // Validate if the contact number is taken
    elseif (isset($contactNo) || !empty($contactNo)) {
        // Validate if contact number is taken
        /**@todo Create a query and select contact_num */
        $query = "SELECT * FROM USERS"; 
        $results = mysqli_query($conn, $query); 

        // Fetch the results as rows
        while ($rows = mysqli_fetch_array($results)) {
            // A cursor points to each row 
            $cursor = $rows;         
            // fetch all existing contact_num
            $temp_contactNo = $cursor['contact_num'];   

            if (strcmp($temp_contactNo, $contactNo) == 0) {
                Print '<script>alert("Contact Number is already taken!");</script>';
                $contactNo_err = 4;
            }
        }
        $isTaken_contactNum = true;
    }

    // If there are no errors detected. Then, 
    if (empty($full_name_err) && empty($contactNo_err) && empty($username_err)) {
        // Load up the Resident Model template
        include("../../model/Resident.php");
    
        // If all credentials are valid. Create a resident object
        $resident = new Resident($username, $password, $full_name, $contactNo); 
        // Create parameters for SQL 
        $param_userName = $resident->getUserName();
        $param_password = $resident->getPassword();
        $param_full_name = $resident->getFullName();
        $param_contactNum = $resident->getContactNum();

        // INSERT THE NEWLY CREATED ACCOUNT INTO THE DATABASE
        $sql = "INSERT INTO USERS (username, password, full_name, contact_num)
                VALUES ('$param_userName', '$param_password', '$param_full_name', '$param_contactNum')";

        // Insert the newly created acount to the database
        mysqli_query($conn, $sql);
        // Redirect to Resident Login page
        header("location: resident_login_page.php");
        // Close connection 
        $conn->close();
    }
}
?>