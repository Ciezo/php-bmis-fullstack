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
                width: 1000px;
                margin: 0 auto;
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
                <a href="barangayDetails.php">Barangay</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        // Create a query to fetch all news contents
                        $query = "SELECT * FROM NEWS"; 
                        $results = mysqli_query($conn, $query); 
                        include("../../api/news/update.php");
                        // Begin fetching results as rows
                        while ($row = mysqli_fetch_array($results)) {
                            echo '<table class="table table-striped>"';
                                echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>'.'<h2>'.$row['title']  .'</h2>'. '</th>';
                                        echo '</tr>'; 
                                        echo '<tr>';
                                            echo '<td><h4>Category: '. $row['category_name'] . '</h4></td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                            echo '<td>';
                                                echo '<a href="../../api/news/update.php?id='. $row['news_id'] .'" class="px-2" title="Update News" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                echo '<a href="../../api/news/delete.php?id='. $row['news_id'] .'" class="px-2" title="Delete News" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            echo '</td>';
                                            echo '<td>';
                                            echo '</td>';
                                        echo '</tr>'; 
                                echo '</thead>';

                                echo '<tbody>';
                                    echo '<tr>';
                                        echo '<td><p>Date Posted: '. $row['date_posted'] . '</p></td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                        echo '<td><p>'. $row['description'] . '</p></td>';
                                    echo '</tr>';                        
                                echo '</tbody>';
                            echo '</table>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>