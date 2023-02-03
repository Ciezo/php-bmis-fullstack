<!-- 
    Filename: home_resident.php
    Description: The home page of a Resident user upon sucessfully logging in. 
                It is where News or Announcements will be displayed 
 -->


<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
session_start();
require("../../database_instance.php");

// Check the cookies for resident
if(!isset($_COOKIE["resident_cookie_username"])) {
    if(!isset($_COOKIE["resident_cookie_password"])) {
        header("location ../error/error.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View News and Announcements</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to resident navbar only -->
        <link href="../../css/resident_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
            .wrapper{
                width: 1000px;
                margin: 0 auto;
                padding-top: 100px;
            }
			table tr td {
            width: fit-content;
            padding: 20px;
            text-align: left;
			}

			.table-primary h1{
				color: black; 
			}

			.table-secondary p{
				color: #333;
				font-size: 16px;
				text-align: justify;
			}

			.table-light h6{
				font-style: italic;
				color: #333;
			}

			.table-light td{
				color: #333;
				font-size: 14px;
			}
		</style>
    </head>
    <body>
        <!-- Top navbar at resident navbar ONLY -->
        <div class="resident_navbar">
            <center>
                <a class="active" href="">News and Announcements</a>
                <a href="complaints_page.php">Complaints/Reports</a>
                <a href="barangay_details.php">Barangay Details</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>
        
        <!-- Retrieve all news content from the database -->
        <div class="wrapper">
        <?php
            // Create a query to fetch all news contents
            $query = "SELECT * FROM NEWS"; 
            $results = mysqli_query($conn, $query); 
            // If there are results retrieved from the database, then
            if ($results->num_rows >0) {
                // Begin fetching results as rows
                while ($row = mysqli_fetch_array($results)) {
                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo    '<tr class="table-primary"><th><h1>'. $row['title'] .'</h1></th></tr>'; 
                    echo '</thead>';
                    echo '<tbody>';
                    echo    '<td class="table-secondary">';
                    echo        '<p>'. $row['description'] .'</p>';
                    echo    '</td>';
                    echo    '<tr class="table-light"><td>News Category:<i><h6> '. $row['category_name'] .'</h6></i></td></tr>'; 
                    echo    '<tr class="table-light"><td>Date Posted: '. $row['date_posted'] .'</td></tr>'; 
                    echo '</tbody>';
                    echo '</table>';
                    echo '<br> <br>';
                }
            }

            else {
                echo '<div class="alert alert-warning"><em>Please, wait for news and announcements from the barangay administration.</em></div>';
            }
            ?>
        </div>
    </body>
</html>