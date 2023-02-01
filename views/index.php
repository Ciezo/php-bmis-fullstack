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
		<!-- Styling to index home only -->
        <link href="../css/index_home.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body class="bg-custom">
	<header id="header" class="container mx-auto">
		<figure id="img-div">
			<br>
			<figcaption id="img-caption" class="font-weight-bold display-4"> Information Management System </figcaption>
		</figure>
    </header>
        <!-- Top navbar at index ONLY -->
        <div class="index_navbar">
            <center>
                <a class="active" href="">Home</a>
                <a href="resident/resident_login_page.php">Resident</a>
                <a href="admin/admin_login_page.php">Admin</a>
            </center>
        </div>

    <section id="mantra" class="container bg-white text-center pt-4 pb-2">
        <h2 class="font-weight-bold display-5 mx-auto">Mantra</h2>
        <div class="content text-left p-4">
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
        </div>
        <div class="text-right right">
            <p>"Barangay Loma De Gato, Marilao Bulacan"</p>
        </div>
    </section>

    <section id="my-media" class="container bg-white text-center pt-4 pb-2 mx-auto">
        <h2 class="font-weight-bold display-5 mx-auto">My Media</h2>
        <div class="my-4 embed-responsive embed-responsive-16by9"><iframe height="100" width="250" class="embed-responsive-item" frameborder="0"></iframe></div>
    </section>
	
    <section id="contact" class="container bg-white text-center pt-4 pb-2 mx-auto">
        <h2 class="font-weight-bold display-5 mx-auto">Emergency Hotlines</h2>
        <div class="col-11 col-sm-9 col-md-9 col-lg-9 col-xl-6 mx-auto">
			<p> 
			<b>Barangay Police:</b> 09399494372
			<br>
			<b>Barangay Rescue:</b> 09333932121
			<br>
			<b>Barangay Ambulance:</b> 09178192302
			<br>
			<b>Barangay Health:</b> 09499926563
			<br>
			<b>Barangay Office:</b> 09422029414
			</p>
        </div>
    </section>
    
    <footer id="foot" class="mt-0">
        <p class="text-right">&copy; 2023 BIMS. All rights reserved.</p>
    </footer>
        
    </body>
</html>