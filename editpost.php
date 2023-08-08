<?php
include 'inc/header.php';
include 'config/database.php';


$title = '';
$errorMessage = $successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: /crud/post.php");
        exit;
    }

    $id = $_GET["id"];
    $id = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT * FROM posts WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            
            // Now you can access the values using the column names
            $title = $row["title"];
        }
    } else {
        // Query failed, handle the error as needed
        echo "Error: " . mysqli_error($conn);
    }

} 
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check for form submission
    $title = $_POST["title"];
    $id = $_POST["id"];
    do
    {
        if(empty($title))
        {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE posts Set title = '$title' WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            $errorMessage = "Invalid Query : ".$conn->error;
            break;
        }
        
        $successMessage = "Title updated successfulyy";
        header("location: /crud/post.php");
        exit;

    }while(false);
}



?>

<div class="container" style="margin-top: 70px;">
    <h2>Updating Post</h2>

    <?php if (!empty($errorMessage)) {
        echo "
        <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'>
            <strong>$errorMessage</strong>
            <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
        </div>
        ";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">


        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" value= "<?php echo $title; ?>" placeholder="Enter title">
            </div>
        </div>
        


        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/crud/post.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>