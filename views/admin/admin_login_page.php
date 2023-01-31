<!-- 
    Filename: admin_login_page.php
    Description: This is the page where admin will login
 -->

<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
require("../../database_instance.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Loma De Gato Barangay Management Information System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to index navbar only -->
        <link href="../../css/index_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!-- Top navbar at index ONLY -->
        <div class="index_navbar">
            <center>
                <a href="../index.php">Home</a>
                <a href="../resident/resident_login_page.php">Resident</a>
                <a class="active" href="">Admin</a>
            </center>
        </div>

        <center>
            <form class="admin-login-form" action="admin_login_page.php" method="POST">
                <h1>Admin, Login</h1>
                <input class="input-fields" type="text" name="username" placeholder="Username" required=""> <br><br>
                <input class="input-fields"type="text" name="password" placeholder="Password" required=""> <br> <br>
                <input class="submit-form-btn" name="login" type="submit" value="LOGIN"><br>
            </form>
        </center>
    </body>
</html>

<?php
error_reporting(0);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    require("../../database_instance.php");
    require("../../components/logic/AuthenticationService.php");

    $username = ($_POST["username"]);
    $password = ($_POST["password"]);

    // Create a query to select a single entry from the USERS table
    $query = "SELECT * FROM ADMIN WHERE username='$username' AND password='$password'"; 
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);
   
    if (($row['username'] == $username) && $row['password'] == $password) {
        header("location: admin_home.php");
    }

    else {
        Print '<script>alert("Incorrect Username or Password!");</script>';
    }
}