<?php include 'inc/header.php'; ?>
<?php include 'config/database.php'; ?>

<?php

// php code to read submitted data
$title ='';
$userid = '';
$errorMessage = '';
$successMessage = '';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = $_POST["title"];
    $userid = $_POST["userid"];

    do
    {
        if(empty($title) || empty($userid))
        {
            $errorMessage = "All the fields are required";
            break;
        }
        
        $sql = "INSERT INTO posts (title,userid) VALUES ('$title','$userid')";
        $result = $conn->query($sql);

        if(!$result) 
        { //modals bootstrap, sweet alert
            $errorMessage = "Invalid Query : " . $conn->error;
            break;
        }
        

        $title ='';
        $successMessage = "Client added successfully";

        header("location: /crud/post.php");
        exit;
        

    }while(false);
}
?>

<div class="container" style="margin-top: 70px;">
    <h2>Adding Post</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" value= "<?php echo $title; ?>" placeholder="Enter title">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">User ID</label>
            <div class="col-sm-6">
                <select class="form-control" name="userid">
                    <?php
                        $categories = mysqli_query($conn,"Select * from user");
                        while($c = mysqli_fetch_array($categories))
                        {?>
                    
                    <option value ="<?php echo $c['id'] ?>"><?php echo $c['id'] ?></option>
                    <?php } ?>
                    
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/crud/post.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>