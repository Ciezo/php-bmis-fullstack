<!-- 
    Filename: complaints_page.php
    Description: Where a Resident User submits their complaints or issuing reports
 -->


 <?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
session_start();
require("../../database_instance.php");

// Form values 
$report_title = $report_category = $report_body = $report_contact = $report_name = "";
$report_title_err = $report_category_err = $report_body_err = $report_contact_err = $report_name_err = "";

/**
 * Input validation
 */
// Process the input validation when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate report title
    $input_report_title = trim($_POST["report-title"]); 
    if (empty($input_report_title)) {
        $report_title_err = "Please enter a title of your report!";
    }

    else {
        $report_title =  $input_report_title;
    }
    
    // Validate report category 
    $input_report_category = trim($_POST["report-category"]);
    if (empty($input_report_category)) {
        $input_report_category = trim($_POST["report-category"]);
    }

    else {
        $report_category = $input_report_category;
    }

    // Validate report body
    $input_report_body = trim($_POST["report-body"]);
    if (empty($input_report_body)) {
        $report_body_err = "Please write a discussion for your report!";
    }

    else {
        $report_body = $input_report_body; 
    }

    // Validate report contact (name of the person who reported it) 
    $input_report_person = $_POST["report-contact-person"];
    if (empty($input_report_person)) {
        $report_name_err = "Please enter your full name!";
    }

    else {
        $report_name = $input_report_person;
    }
 
    // Validate report contact number (number of the person who reported it)
    $input_report_contactNum = trim($_POST["report-contact-num"]);
    if (empty($input_report_contactNum)) {
        $report_contact_err = "Please enter your contact number!"; 
    }
    else if (ctype_digit($report_contact_err)) {
        $report_contact_err = "Please enter a valid contact number!"; 
    }

    else {
        $report_contact = $input_report_contactNum;
    }
        
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Submit and file a report or issue</title>
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
        </style>
    </head>
    <body>
        <!-- Top navbar at resident navbar ONLY -->
        <div class="resident_navbar">
            <center>
                <a href="home_resident.php">News and Announcements</a>
                <a class="active" href="complaints_page.php">Complaints/Reports</a>
                <a href="barangay_details.php">Barangay Details</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>

        <div class="wrapper">
            <h1>Issue a complaint or report to the barangay administration</h1>
            <form action="complaints_page.php" method="POST">
                <label>Report Title</label>
                <input type="text" name="report-title" placeholder="Write a title for brief context" class="form-control <?php echo (!empty($report_title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $report_title ; ?>">
                <br>
                <label>Choose a report category</label>
                <select class="form-control" name="report-category" id="" required="">
                    <option value="Crime">Crime</option>
                    <option value="Traffic">Traffic</option>
                    <option value="Emergency">Emergency</option>
                    <option value="Others">Others</option>
                </select>
                <br>
                <label>Write your complaint</label>
                <textarea name="report-body" placeholder="Write a detailed report on your complaints" class="form-control <?php echo (!empty($report_body_err)) ? 'is-invalid' : ''; ?>"><?php echo $report_body ; ?></textarea>
                <br><br>
                <h4>Your personal contact</h4>
                <label>Provide your contact information so the administration may reach you</label>
                <input type="text" placeholder="My full name" name="report-contact-person" class="form-control <?php echo (!empty($report_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $report_name ; ?>">
                <span class="invalid-feedback"><?php echo $report_name_err ;?></span>
                <input type="text" placeholder="My contact number" name="report-contact-num" class="form-control <?php echo (!empty($report_contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $report_contact ; ?>">
                <span class="invalid-feedback"><?php echo $report_contact_err ;?></span>
                
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <br>
                <!-- First, validate the report by Resident -->
                <input type="submit" class="btn btn-success" value="Validate report">
                <?php
                    /**
                     * @note the form validation happens inside 'complaints_page.php'
                     * @note upon a successful submission means the error variables are empty
                     */
                    // Therefore, add a button to submit the report to "../../api/reports/create.php"
                
                    // Create a condition to check if error variables are empty
                    // $report_title_err = $report_category_err = $report_body_err = $report_contact_err = $report_name_err = "";

                    // Check, if the current form is submitted
                    // $report_title = $report_category = $report_body = $report_contact = $report_name = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($report_title_err) && empty($report_category_err) && empty($report_body_err) &&
                                empty($report_contact_err) && empty($report_name_err)) {
                                    
                                    // Set session variables
                                    $_SESSION["submit_report"] = "submit_report";
                                    $_SESSION["report_title"] = $report_title; 
                                    $_SESSION["report_category"] = $report_category; 
                                    $_SESSION["report_body"] = $report_body; 
                                    $_SESSION["report_person"] = $report_name; 
                                    $_SESSION["report_contact"] = $report_contact;
                                    
                                    // Begin processing the form on the ./../api/reports/create.php
                                    echo '<button type="submit" class="btn btn-primary">'; 
                                    echo    '<a href="../../api/reports/create.php" class="link-light">Submit my report</a>';
                                    echo '</button>'; 
                             }
                    }
                ?>
            </form>
        </div>
    </body>
</html>