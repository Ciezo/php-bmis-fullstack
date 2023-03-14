<?php
require("../../database_instance.php");
// Check if admin is logged in.
if (!isset($_SESSION["admin-username"])) {
    // If not logged in, then redirect to log-in page.
    header("location: ../views/error/error.php");
}

// Try to retrieve the form values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Stop redirecting on an a
    /**
     * Form values in creating news
     * - News header   name="news-header"
     * - News category name="news-category"
     * - News body     "news-body"
     */
    
    $news_header = $_POST["news-header"];
    $news_category = $_POST["news-category"];
    $news_body = $_POST["news-body"];

    /** 
     * @todo set the default time zone first 
     */
    date_default_timezone_set('Asia/Manila');
    $news_date = date("d/m/Y");
    
    // Create a query to save a news record
    $query = "INSERT INTO NEWS (title, description, date_posted, category_name)
        VALUES('$news_header', '$news_body', '$news_date', '$news_category')";

    if (mysqli_query($conn, $query)) {
        // Upon making a query redirect to admin_home
        header("location: ../../views/admin/admin_home.php");
    }
    $conn->close();
}

?>