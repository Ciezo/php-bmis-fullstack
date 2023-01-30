<!-- 
    Filename: config.php
    Description: The default landing page for neither resident or admin. 
 -->

<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
require("../database_instance.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Loma De Gato Barangay Management Information System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../css/globals.css" rel="stylesheet">
        <!-- Styling to index navbar only -->
        <link href="../css/index_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!-- Top navbar at index ONLY -->
        <div class="index_navbar">
            <center>
                <a class="active" href="">Home</a>
                <a href="resident/resident_login_page.php">Resident</a>
                <a href="admin/admin_login_page.php">Admin</a>
            </center>
        </div>
        <center>
            <div class="welcome-prompt">
                <h1>Barangay Loma De Gato</h1>
                <h4>Management Information System</h4>
                <div class="logo">
                    <img src="../assets/logo/ldg_logo.jpg" alt="Brngy. Loma De Gato logo">
                </div>
            </div>

            <p>
            Masdan mo ang bayan ko <br>
            Marilao, mahal kong bayan <br>
            Sagana sa biyaya <br>
            Ng Poong Maykapal <br>
            <br><br>
            Ang bawat mamamayan <br>
            Ay pag-asa ng kanyang Inang Bayan <br>
            Kahit na mapasaan man <br>
            Ay iyong ikarangal <br>
            <br><br>
            Bayan ko ay may dangal <br>
            Ligaya kong siya`y mapaglingkuran <br>
            Sa puso`t diwa ko`y nakakintal <br>
            Ang iyong kagitingan <br>
            <br><br>
            Ito ang bayan ko <br>
            Marilao, Marilao, Marilao <br>
            Tuwina ay may pagpapala <br>
            Bayan ng Bulacan <br>
            <br><br>
            Ito ang bayan ko <br>
            Marilao, Marilao, Marilao <br>
            Tuwina ay may pagpapala <br>
            Bayan ng Bulacan <br>
            </p>
        </center>
    </body>
</html>