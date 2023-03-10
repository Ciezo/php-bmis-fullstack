<!-- 
    Filename: resident_login_page.php
    Description: This is the page where resident will login
 -->

 <?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
session_start();
require("../../database_instance.php");
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
    
	<style>
  .resident-login-form {
    margin: 100px auto;
    padding: 50px;
    width: 400px;
    background-color: #f2f2f2;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .input-fields {
    width: 100%;
    padding: 12px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }

  .submit-form-btn {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    border: none;
    margin-top: 10px;
  }

  .submit-form-btn:hover {
    background-color: #45a049;
    color: black;
  }

  h4 a {
    color: #4CAF50;
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
            <form action="resident_login_page.php" class="resident-login-form" method="POST">
                <h1>Resident, Login</h1>
                <input class="input-fields" type="text" name="username" placeholder="Username" required=""> <br><br>
                <input class="input-fields"type="password" name="password" placeholder="Password" required=""> <br><br>
                <input class="submit-form-btn" name="login" type="submit" value="LOGIN"><br><br>
                <h4>No Account? 
                    <a href="register_resident.php">Register</a>
                </h4>
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
    $query = "SELECT * FROM USERS WHERE username='$username' AND password='$password'"; 
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);
   
    if (($row['username'] == $username) && $row['password'] == $password) {
        // SESSION VARIABLES 
        $_SESSION["resident-username"] = $username; 
        $_SESSION["resident-password"] = $password; 
        header("location: ../sessions/resident_session_check.php");
    }

    else {
        Print '<script>alert("Incorrect Username or Password!");</script>';
    }
}
?>