<?php include 'inc/header.php'; ?>


<?php
define('DB_HOST','localhost');
define('DB_USER','Moiz');
define('DB_PASS','123456789');
define('DB_NAME','crud');
// Connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// Checking for connection
if($conn->connect_error)
{
    die('Connection Failed' . $conn->connect_error);
}



// php code to read submitted data
$name = $email = $phone = $address ='';
$errorMessage = '';
$successMessage = '';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do
    {
        if(empty($name) || empty($email) || empty($phone) || empty($address))
        {
            $errorMessage = "All the fields are required";
            break;
        }
        
        $sql = "INSERT INTO user (name, email, phone, address)".
                "VALUES ('$name','$email','$phone','$address')";
        $result = $conn->query($sql);

        if(!$result)
        {
            $errorMessage = "Invalid Query : " . $connection->error;
            break;
        }
        

        $name = $email = $phone = $address ='';
        $successMessage = "Client added successfully";

        header("Location: /crud/index.php");
        exit;
        

    }while(false);
}
?>


<div class="container" style="margin-top: 70px;">
    <h2>New Client</h2>

    <?php if(!empty($errorMessage))
    {
        echo "
        <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'>
            <strong>$errorMessage</strong>
            <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
        </div>
        ";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value= "<?php echo $name; ?>" placeholder="Enter your name">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="Enter your Phone">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Enter Your Address">
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/crud/index.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>