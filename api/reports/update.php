<?php
session_start();
require("../../database_instance.php");

// Values to retrieve
$report_title = $report_category = $report_body = $report_date_posted = $report_status = "";
$report_title_err = $report_category_err = $report_body_err = $report_date_posted_err = $report_status_err = "";

if(isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
    // Get hidden input value
    $id = $_POST["id"];

    /**
     * Form values from Resident when updating a report
     * - Report Title       name="report-title"
     * - Report Category    name="report-category"
     * - Report Body        name="report-body"
     * 
     * @note when updating a report default values are the following
     * date_posted = should be the latest date
     * status = will be set into in progress again because user changed the report content
     */

     /**
      * @todo Input fields validation
      */
    // Validate title
    $input_report_title = trim($_POST["report-title"]);
    if (empty($input_report_title)) {
        $report_title_err = "Please, enter an updated report title!"; 
    }

    else {
        $report_title = $input_report_title;  
    }

    // Validate category 
    $input_report_category = trim($_POST["report-category"]); 
    if (empty($input_report_category)) {
        // Since the select field is required, then, just simply get the value
        $report_category = $input_report_category;     
    }

    else {
        $report_category = $input_report_category; 
    }

    // Validate body 
    $input_report_body = trim($_POST["report-body"]);
    if (empty($input_report_body)) {
        $report_body_err = "Please, write an updated report or complaint body";
    }

    else {
        $report_body = $input_report_body; 
    }

    // Get latest date 
    date_default_timezone_set('Asia/Manila');
    $report_date_posted = date("d/m/Y");


    /** Check if there are no errors involved */
    if (empty($report_title_err) && empty($report_category_err) && empty($report_body_err)) {

    }

    /**
     * @todo Create an SQL update query to edit the contents of report content
     */
    // set the updated title, category, body, date_posted, status BASED ON ID
    $sql = "UPDATE REPORTS SET title='$report_title', report_category='$report_category', description='$report_body', date_posted='$report_date_posted', status='In Progress'
             WHERE report_id=$id";    
    // Once, the query executes. Prompt the user and redirect to previous page
    if (mysqli_query($conn, $sql)) {
        Print '<script>alert("Report has been updated");</script>';
        header("location: ../../views/resident/complaints_page.php");
        exit();
    }


    else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    $conn->close();
}

else {
    // If the retrieval of input ID hidden value fails, then, forcefully extract the id from URL
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter, but id value only
        $id =  trim($_GET["id"]);

        // Now, create a query to select a news content based on id
        $sql = "SELECT * FROM REPORTS WHERE report_id=$id";
        $result = mysqli_query($conn, $sql); 

        // Begin retrieving the selected record based on id
        if (is_array($result)) {
            // Now, assign those to the field value names
            $report_title = $result["title"];
            $report_category = $result["report_category"];
            $report_body = $result["description"];
            $report_date_posted = $result["date_posted"];
            $report_status = $result["status"];
        }

        // Close connection
        $conn->close(); 
     
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating reports</title>
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
                padding-top: 100px;
            }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h2>Update Report</h2>
            <p>Fill in the form to make changes on your report</p>
            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                <div class="form-group">
                    <label>Update Report title</label>
                    <input type="text" name="report-title" placeholder="Write a title for brief context" class="form-control <?php echo (!empty($report_title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $report_title ; ?>">
                    <span class="invalid-feedback"><?php echo $report_title_err ;?></span>
                </div>
                <br>
                <div class="form-group">
                    <label>Choose a report category</label>
                    <select class="form-control" name="report-category" id="" required="">
                        <option value="Crime">Crime</option>
                        <option value="Traffic">Traffic</option>
                        <option value="Emergency">Emergency</option>
                        <option value="Others">Others</option>
                    </select>
                <br>
                <div class="form-group">
                    <label>Update report complaint</label>
                    <textarea name="report-body" placeholder="Write a detailed report on your complaints" class="form-control <?php echo (!empty($report_body_err)) ? 'is-invalid' : ''; ?>"><?php echo $report_body ; ?></textarea>
                    <span class="invalid-feedback"><?php echo $report_body_err ;?></span>
                </div>
                <br>
                <br>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn btn-primary" value="Update report">
                <a href="../../views/resident/complaints_page.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>