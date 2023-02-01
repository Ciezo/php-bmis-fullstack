<?php
session_start();
require("../../database_instance.php");


// Try to retrieve the form values
if ($_SESSION["submit_report"] == "submit_report") {
    /**
     * Form values from Resident making a report
     * - Report Title       name="report-title"
     * - Report Category    name="report-category"
     * - Report Body        name="report-body"
     * - Report Person      name="report-contact-person"
     * - Report Contact     name="report-contact-num"
     */

    // Fetch all the SESSION VARIABLES ASSIGNED FROM THE FORM

    $report_title = $_SESSION["report_title"]; 
    $report_category = $_SESSION["report_category"];
    $report_body = $_SESSION["report_body"];
    $report_contactName = $_SESSION["report_person"]; 
    $report_contactNum = $_SESSION["report_contact"];
    // Get current date based on timezone
    date_default_timezone_set('Asia/Manila');
    $date_reported = date("d/m/Y");

    // Set the status report into "In Progress" 
    $report_status = "In Progress";

    // Create a query to save a report
    $sql = "INSERT INTO REPORTS (title, report_category, description, date_posted, status, reported_by, rep_byContact) 
            VALUES 
                (
                    '$report_title', 
                    '$report_category',
                    '$report_body',
                    '$date_reported',
                    '$report_status',
                    '$report_contactName',
                    '$report_contactNum'
                )";

    if (mysqli_query($conn, $sql)) {
        // Upon making a query redirect to admin_home
        echo '<script>
                alert("Your report has been submitted!")
                window.location.href = "../../views/resident/complaints_page.php"
            </script>';
        // header("location: ../../views/resident/complaints_page.php");
    }
    $conn->close();
}
?>