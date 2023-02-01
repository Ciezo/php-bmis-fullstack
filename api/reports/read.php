<?php
session_start();
require("../../database_instance.php");

// Values to retrieve
$report_title = $report_category = $report_body = $report_contact = $report_name =  $report_date_posted = $report_status = "";

// Try and fetch the ID of a report
if(isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
    // Get hidden input value
    $id = $_POST["id"];

    // Create a query to retrieve a single report record
    $sql = "SELECT * FROM REPORTS WHERE report_id=$id";
    $result = mysqli_query($conn, $sql); 

    // Fetch the results as rows 
    while($rows = mysqli_fetch_array($result)) {
        $report_title = $rows["title"]; 
        $report_category = $rows["report_category"]; 
        $report_body = $rows["description"]; 
        $report_date_posted = $rows["date_posted"]; 
        $report_status = $rows["status"]; 
        $report_name = $rows["reported_by"]; 
        $report_contact = $rows["rep_byContact"]; 
    }

    // Close connection
    $conn->close();
    
}

// Forcefully, extract the ID from URL
else {
    // Check existence of ID again.
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Extracting ID parameter from URL
        $id =  trim($_GET["id"]);

        // Now, create a query to select a report content based on id
        $sql = "SELECT * FROM REPORTS WHERE report_id=$id";
        $result = mysqli_query($conn, $sql); 

        // Fetch the results as rows 
        while($rows = mysqli_fetch_array($result)) {
            $report_title = $rows["title"]; 
            $report_category = $rows["report_category"]; 
            $report_body = $rows["description"]; 
            $report_date_posted = $rows["date_posted"]; 
            $report_status = $rows["status"]; 
            $report_name = $rows["reported_by"]; 
            $report_contact = $rows["rep_byContact"]; 
        }
    }  
    
    else {
        echo "Oops! Something went wrong. Please try again later.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Viewing report content</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
         <!-- Styling to resident navbar only -->
        <link href="../../css/admin_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
			.wrapper {
				width: 600px;
				margin: 0 auto;
				padding-top: 100px;
			}
			.form-group {
				margin: 0 20px 20px 0;
			}
			.form-group p {
				margin: 0 20px 0 20px;
				padding-left: 30px;
				border-radius: 20px;
				background-color: #edece8;
				display: inline-block;
				padding: 10px;
				font-size: 16px;
			}
			.report-footer {
				padding-left: 10px;
				border-radius: 10px;
				margin: 20px 0;
				background-color: #edece8;
				padding: 10px;
			}
			.report-footer p {
				margin: 0;
				font-size: 16px;
			}
			h2 {
				margin-bottom: 20px;
				font-size: 32px;
				font-weight: bold;
			}
			h6 {
				margin-bottom: 20px;
				color: #777777;
				font-size: 16px;
			}
		</style>

    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <h2><?php echo $report_title ?></h2>
                <h6><?php echo $report_date_posted ?></h6>
                <div class="form-group ">
                    <label>Report Category:</label>
                    <p><b><?php echo $report_category; ?></b></p>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <p><b><?php echo $report_body; ?></b></p>
                </div>
                <div class="form-group">
                    <label>Report Status:</label>
                    <p><b><?php echo $report_status; ?></b></p>
                </div>
                <div class="report-footer">
                    <label><b>Report issued by: <i><?php echo $report_name; ?></i></b></label> <br>
                    <label><b>Contact Number: <i><?php echo $report_contact; ?></i></b></label>
                </div>
                <br>
                <p><a href="../../views/resident/complaints_page.php" class="btn btn-primary">Back</a></p>
            </div>
        </div>
    </body>
</html>