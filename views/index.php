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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c36559a51c.js" crossorigin="anonymous"></script>
        <style>
            .wrapper {
                padding-top: 50px;
            }
            .navbar .navbar-brand {
                padding-left: 30px;
            }
			 /* Margin between sections */
			.section {
				margin: 50px 0;
			}
			.welcome-prompt {
				padding: 40px 0;
			}
			.logo {
				margin-top: 40px;
				width: 480px;
				height: 480px;
			}
			.logo img {
				width: 100%;
				height: 100%;
				object-fit: cover;
				border-radius: 50%;
				border: 5px solid #333;
			}
			#mantra {
				padding: 50px 0;
				border-top: 2px solid #333;
				border-bottom: 2px solid #333;
				margin: 20px auto;
			}
			.content p {
				font-size: 18px;
				line-height: 1.5;
				margin-top: 20px;
			}
			
			#my-media {
			  border-top: 5px solid #ddd;
			  border-bottom: 5px solid #ddd;
			  padding: 10px 0;
			  margin-bottom: 20px;
			}

			#contact {
			  border-top: 5px solid red;
			  border-bottom: 5px solid red;
			  padding: 10px 0;
			  margin-top: 20px;
			}
			
			a.facebook-button {
			  display: inline-block;
			  padding: 10px 20px;
			  background-color: #4267B2;
			  color: #fff;
			  border-radius: 5px;
			  text-decoration: none;
			  margin: 10px;
			}


        </style>
    </head>
    <body>
        <!-- Bootstrap navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">      
                <i class="fa-solid fa-building-user"></i>
                Barangay Loma De Gato 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="resident/resident_login_page.php">Resident</a>
                <a class="nav-item nav-link" href="admin/admin_login_page.php">Admin</a>
                </div>
            </div>
        </nav>

        <div class="wrapper">
            <center>
                <div class="welcome-prompt">
                    <h1>Barangay Loma De Gato</h1>
                    <h5>News, Announcements, and Reporting Management System</h5>
                    <div class="logo">
                        <img src="../assets/logo/ldg_logo.jpg" alt="Brngy. Loma De Gato logo">
                    </div>
                </div>
            </center>

            <section id="mantra" class="container bg-white text-center pt-4 pb-2">
                <h2 class="font-weight-bold display-5 mx-auto">Marilao, Hymn</h2>
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

            <section id="my-media" class="container text-center pt-4 pb-2 mx-auto">
                <h2 class="font-weight-bold display-5 mx-auto">Social Media</h2>
                <div class="mx-auto">
				<button class="facebook-button">
                    <a href="https://web.facebook.com/MarileNews" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span>
                            MarileNews
                    </a>
                    <br>
				</button>
				<br>
				<br>
				<button class="facebook-button">
                    <a href="https://web.facebook.com/MarileNews" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span>
                            (Buy & Sell) Heritage Homes, Loma De Gato, Perez, Sto. Niño, Bahay pare
                    </a>
				</button>
                </div>
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
            
            <center>
                <footer id="foot" class="mt-0">
                    <p class="text-right">&copy; 2023 Loma De Gato, Marilao, Bulacan. All rights reserved.</p>
                </footer>
            </center>    
        </div>
    </body>
</html>