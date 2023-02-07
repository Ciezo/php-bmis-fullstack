<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
session_start();
require("../../database_instance.php");
// Check if admin is logged in.
if (!isset($_SESSION["admin-username"])) {
    // If not logged in, then redirect to log-in page.
    header("location: admin_login_page.php");
}
?>


<!DOCTYPE html>
<html lang="en">
    <head> 
        <title>News Feed and Activities</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to resident navbar only -->
        <link href="../../css/admin_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .wrapper{
                width: 750px;
                margin: 0 auto;
                padding-top: 100px;
            }

            table tr td {
                width: fit-content;
            }
        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </head>
    <body>
        <!-- Top navbar at admin navbar ONLY -->
        <div class="admin_navbar">
            <center>
                <a href="admin_home.php">Create News</a>
                <a class="active" href="">News Feed</a>
                <a href="reviewReports.php">Review Reports</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>

        <div class="wrapper">
            <?php
            // Create a query to fetch all news contents
            $query = "SELECT * FROM NEWS"; 
            $results = mysqli_query($conn, $query); 
            // If there there are contents in the results, then, 
            if ($results->num_rows > 0) {
                // Begin fetching results as rows
                while ($row = mysqli_fetch_array($results)) {
                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo    '<tr><th><h1>'. $row['title'] .'</h1></th></tr>'; 
                    echo    '<tr><th>News Category: '. $row['category_name'] .'</th></tr>'; 
                    echo    '<tr class="table-light"><td>Date Posted: '. $row['date_posted'] .'</td></tr>'; 
                    echo    '<tr>';
                    echo        '<th>';
                    echo            '<a class="btn btn-primary pr-2" href="../../api/news/update.php?id='.$row['news_id'].'">Update</a>';
                    echo            '<a class="btn btn-danger pr-2" href="../../api/news/delete.php?id='. $row['news_id'].'">Delete</a>';
                    echo        '</th>';
                    echo    '</tr>'; 
                    echo '</thead>';
                    echo '<tbody>';
                    echo    '<td class="table-primary">';
                    echo        '<p>'. $row['description'] .'</p>';
                    echo    '</td>';
                    echo '</tbody>';
                    echo '</table>';
                    echo '<br> <br>';
                }
            }

            else {
                echo '<div class="alert alert-danger"><em>No news has been posted yet!</em></div>';
            }
            ?>
        </div>
    </body>
</html>