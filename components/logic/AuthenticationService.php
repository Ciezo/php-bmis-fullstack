<!-- 
    Filename: AuthenticationService .php
    Description: This is used for verifying logins
 -->


<?php
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    function checkUserValidity($username, $password, $option) {
        require("../../database_instance.php");

        if ($option == "admin") {
            // Create a query to select the ADMIN table
            $query = "SELECT * FROM ADMIN WHERE username='$username' AND password=$password"; 
            $results = mysqli_query($conn, $query);

            if (($rows['username'] == $username) && $rows['password'] == $password) {
                return "true";
            }
            else {
                return "false";
            }
        }

        
        else if ($option == "resident") {
            // Create a query to select a single entry from the USERS table
            $query = "SELECT * FROM USERS WHERE username='$username' AND password=$password";  
            $results = mysqli_query($conn, $query);
            $rows = mysqli_fetch_array($results); 

            if (($rows['username'] == $username) && $rows['password'] == $password) {
                return "true";
            }
            else {
                return "false";
            }
        }
    }

?>