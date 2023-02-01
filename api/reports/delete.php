<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
session_start();
require("../../database_instance.php");

// Begin fetching the id of a record 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Create an sQL Delete statement
    $sql = "DELETE FROM REPORTS WHERE report_id = $id";

    // Begin executing the query 
    if (mysqli_query($conn, $sql)) {
        // Once, the record is deleted redirect to news feed
        header("location: ../../views/resident/complaints_page.php");
        exit();
    }

    // Close connection
    $conn->close();
}

// If the id is not fetched or non-existent. Extract it from the URL
else {
    // Try fetching id, and...
    if(empty(trim($_GET["id"]))){
        // And if the ID is empty 
        // Get URL parameter for extraction
        $id =  trim($_GET["id"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Removing news record</title>
    <!-- Global styling and theming -->
    <link href="../../css/globals.css" rel="stylesheet">
    <!-- Styling to resident navbar only -->
    <link href="../../css/admin_navbar.css" rel="stylesheet">
    <!-- Bootstrap from https://getbootstrap.com/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2 class="mt-5">Delete report?</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="alert alert-danger">
                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                <p>Upon deletion. This record cannot be retrieved. Please, proceed with caution</p>
                <p>
                    <input type="submit" value="Yes" class="btn btn-danger">
                    <a class="btn btn-secondary ml-2" href="../../views/admin/view_newsFeed.php">Cancel</a>
                </p>
            </div>
        </form>
    </div>
    
</body>
</html>