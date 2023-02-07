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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewing Submitted Reports</title>
     <!-- Global styling and theming -->
     <link href="../../css/globals.css" rel="stylesheet">
    <!-- Styling to resident navbar only -->
    <link href="../../css/admin_navbar.css" rel="stylesheet">
    <!-- Bootstrap from https://getbootstrap.com/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper {
            width: 750px;
            margin: 0 auto;
            padding-top: 100px;
        }
        .wrapper .container .review-box-repeating {
            margin: 0 20px 20px 0;
            padding: 10px 30px 10px 30px;
            background-color: #e6e4e1;
            border-radius: 24px;
        }

        .review-box-repeating .report-body {
            background-color: white;
            padding: 10px 30px 20px 10px;
        }
        .review-box-repeating .report-footer {
            padding: 10px 30px 10px 10px;
        }
        .review-box-repeating .report-admin-actions {
            padding-bottom: 10px;
        }

    </style>
</head>
<body>
    <!-- Top navbar at admin navbar ONLY -->
    <div class="admin_navbar">
        <center>
            <a href="../../views/admin/admin_home.php">Create News</a>
            <a href="../../views/admin/view_newsFeed.php">News Feed</a>
            <a class="active" href="">Review Reports</a>
            <a href="../../components/custom/logout.php">Logout</a>
        </center>
    </div>
    
    <div class="wrapper">
        <div class="container">
            <?php
                // Create a query to fetch all reports contents
                $query = "SELECT * FROM REPORTS"; 
                $results = mysqli_query($conn, $query); 
                // If there there are contents in the results, then, 
                if ($results->num_rows > 0) {
                    // Now, begin fetching the results of reports in rows
                    while($rows = mysqli_fetch_array($results)) {
                        echo '<div class="review-box-repeating">';
                        echo    '<h1>' . $rows["title"] . '</h1>';             // Report header
                        echo    '<h5>' . $rows["report_category"] .'</h5>';             // Report category
                        echo    '<h6>Status: ' . $rows["status"] .'</h6>';             // Report status
                        echo    '<div class="report-body">';    // Report body
                        echo        '<p>' . $rows["description"] . '</p>';
                        echo    '</div>';
                        echo    '<div class="report-footer">';
                        echo        '<h6>Reported by: '. $rows["reported_by"] . '</h6>';
                        echo        '<h6>Contact No.: '. $rows["rep_byContact"] . '</h6>';
                        echo        '<p>Date Posted: '. $rows["date_posted"] . '</p>';
                        echo     '</div>';
                        echo    '<div class="report-admin-actions">';
                        echo       '<a class="btn btn-primary" href="../../api/reports/edit_status__inProgress.php?id='.$rows['report_id'].'">Mark as <i>In Progress</i></a>';
                        echo       '<a class="btn btn-success" href="../../api/reports/edit_status__Resolved.php?id='.$rows['report_id'].'">Mark as <i>Resolved</i></a>';
                        echo       '<a class="btn btn-danger" href="../../api/reports/admin_delete_report.php?id='.$rows['report_id'].'">Delete this report?</a>';
                        echo    '</div>';
                        echo '</div>';
                        echo '<br><br><br>';
                    }
                }

                else {
                    echo '<div class="alert alert-danger"><em>There are no submitted reports by the residents!</em></div>';
                }
            ?>
            <!-- <div class="review-box-repeating">
                <h1>Report header</h1>
                <h5>Report category</h5>
                <div class="report-body">
                    <p>
                        sdflasdjfjsadlfsdjf;ladsjfjsflasjdl;fkjadslkfjdsjfsald
                        klasdjfklsadjflsadfjdsjfsdkjfksdfjasdklfjasdlk;fjlaksjfklsadjfklsadfjsjd
                        kjdf;lksajfsdafdsjfldjfjasf;lstat
                        kasdf;lajsd;klfj;lasdjf

                    </p>
                </div>
                <div class="report-footer">
                    <h6>Reported by: Name</h6>
                    <h6>Contact No.:</h6>
                    <p>Date Posted: </p>
                </div>
                <div class="report-admin-actions">
                    <button>Mark as <i>In Progress</i></button>
                    <button>Mark as <i>Resolved</i></button>
                    <button>Delete this report?</button>
                </div>
            </div> -->
        </div>
    </div>

</body>
</html>
