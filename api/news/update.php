<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
require("../../database_instance.php");


// Define variables and initialize with empty values
$news_header = $news_category = $news_body = "";
$news_header_err = $news_category_err = $news_body_err = "";


if(isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    /**
     * Input validation
     */
    // Validate news header
    $input_news_header = trim($_POST["news-header"]);
    /** Check if news header is empty */
    if (empty($input_news_header)) {
        $news_header_err = "Please enter a news header or subject!";
    }
    /** Check if news header has special characters for SQL injection attempts */
    // else if (!filter_var($input_news_header, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        // $news_header_err = "Please enter a valid news header using text only!";
    // }
    /** Otherwise, if all above conditions are met, assign the current input */
    else {
        $news_header = $input_news_header;
    }

    // Validate news category
    /** Ensure that a field is selected and its value fetched */
    // Since its select attribute has required="" therefore, we just need to ensure that a value is assigned
    $input_news_category = $_POST["news-category"]; 
    if (empty($input_news_category)) {
        $news_category = $input_news_category;
    }
    else {
        $news_category = $input_news_category;
    }

    // Validate news body
    $input_news_body = $_POST["news-body"];
    if (empty($input_news_body)) {
        $news_header_err = "Please create a news body as your main content!";
    }
    else {
        $news_body = $input_news_body;
    }

    // After validation, create a query to update the news content based on id
    /** If err variables are empty, therefore, we can now create a query  */
    if (empty($news_header_err) && empty($news_category_err) && empty($news_body_err)) {

        // Create an SQL update statement 
        $sql = "UPDATE NEWS SET title='$news_header', category_name='$news_category', description='$news_body'
                WHERE news_id=$id";

        // Once, query executes
        if (mysqli_query($conn, $sql)) {
            // Prompt the admin
            Print '<script>alert("Content updated");</script>';
            header("location: ../../views/admin/view_newsFeed.php");
            exit();
        }

        else {
            echo "Oops! Something went wrong. Please try again later.";
        }

    }

    // Close connection
    $conn->close();
}

else {
    // If the retrieval of input ID hidden value fails, then, forcefully extract the id from URL
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter, but id value only
        $id =  trim($_GET["id"]);

        // Now, create a query to select a news content based on id
        $sql = "SELECT * FROM NEWS WHERE news_id=$id";
        $result = mysqli_query($conn, $sql); 

        // Begin retrieving the selected record based on id
        if (is_array($result)) {
            // Now, assign those to the field value names
            $news_header = $result["title"];
            $news_category = $result["category_name "];
            $news_body = $result["description"];
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
    <title>Update News Content</title>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Edit News Content</h2>
                    <p>Fill in updates and edit news form</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>News Header or Subject</label>
                            <input type="text" name="news-header" class="form-control <?php echo (!empty($news_header_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $news_header ; ?>">
                            <span class="invalid-feedback"><?php echo $news_header_err;?></span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Select News Category</label><br>
                            <select class="form-control" name="news-category" id="" required="">
                                <option value="Jobs">Jobs</option>
                                <option value="Road Blockage">Road Blockage</option>
                                <option value="Flood Updates">Flood Updates</option>
                                <option value="Crime">Crime</option>
                                <option value="Recreation">Recreation</option>
                                <option value="Sports Event">Sports Event</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>News Body</label>
                            <textarea name="news-body" class="form-control <?php echo (!empty($news_body_err)) ? 'is-invalid' : ''; ?>"><?php echo $news_body; ?></textarea>
                            <span class="invalid-feedback"><?php echo $news_body_err ;?></span>
                        </div>
                        <br>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a class="btn btn-secondary ml-2" href="../../views/admin/view_newsFeed.php">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>