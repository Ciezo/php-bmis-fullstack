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
            <input type="text" name="contactNo" placeholder="Contact Number" required=""> <br> <br>
            <input type="text" name="username" placeholder="Username" required=""> <br> <br>  
            <input type="text" name="password" placeholder="Password" required=""> <br> <br>
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
    $full_name = ($_POST['full_name']);
    $contactNo = ($_POST['contactNo']);
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    // Include our Resident model
    include("../../model/Resident.php");

    // Input validation 
    $contactNo = (int) $contactNo/100;          // remove prefix 0
    if (empty($full_name) || empty($contactNo) || empty($username) || empty($password)) {
        Print '<script>alert("Fill out the following forms");</script>'; 
    }
    
    // Validate whether the credentials are already taken
    $query = "SELECT * FROM USERS"; 
    $results = mysqli_query($conn, $query); 

    // Scan the fetch results as rows
    while ($row = mysqli_fetch_array($results)) {
        // A cursor points to each row 
        $cursor = $row; 
        // fetch all existing usernames
        $temp_username = $cursor['username'];           
        // fetch all existing contact_num
        $temp_contactNo = $cursor['contact_num'];       
 
        if (strcmp($temp_username, $username) == 0) {
            Print '<script>alert("Username is already taken!");</script>';
        }

        else if (strcmp($temp_contactNo, $contactNo) == 0) {
            Print '<script>alert("Contact Number is already taken!");</script>';
        }

        else {
            // If all credentials are valid, therefore, create a Resident object
            $resident = new Resident($username, $password, $full_name, $contactNo); 
            // Create parameters for SQL 
            $param_userName = $resident->getUserName();
            $param_password = $resident->getPassword();
            $param_full_name = $resident->getFullName();
            $param_contactNum = $resident->getContactNum();

            echo($param_userName);
            echo($param_password);
            echo($param_full_name);
            echo($param_contactNum);

            // Now, execute the sql insert statement
            $sql = "INSERT INTO USERS (username, password, full_name, contact_num)
                VALUES ('$param_userName', '$param_password', '$param_full_name', '$param_contactNum')";
            mysqli_query($conn, $sql);
            // Redirect back to login
            header("location: resident_login_page.php");
            exit();
            break;          // break out of the while loop to stop making queries to the latest entry
        }
    }

    // Close connection
    $conn->close();
}
?>