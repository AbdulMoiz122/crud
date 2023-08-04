<?php include 'inc/header.php'; ?>
<?php include 'config/database.php'; ?>

<?php


$id = $name = $email = $phone = $address ='';
$errorMessage = $successMessage = "";

// Is get method se database se data agya ha ab phr else main post method se us pr update krein gay
if($_SERVER['REQUEST_METHOD'] =='GET')
{
    if(!isset($_GET["id"]))
    {
        header("Location : /crud/index.php");
        exit;
    } 
    $id = $_GET["id"];

    // read the data where id is matched in database
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row)
    {
        header("location: /crud/index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];

}
else{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do
    {
        if(empty($id) || empty($name) || empty($email) || empty($phone) || empty($address))
        {
            $errorMessage = "All the fields are required";
            break;
        }
        $sql = "UPDATE user".
                "SET name = '$name', email = '$email', phone = '$phone', address = '$address' ".
                "WHERE  id = $id"; 

        $result = $conn->query($sql); 

        if(!$result)
        {
            $errorMessage= "Invalid Query : ".$conn->error;
            break;
        }
        $successMessage = "Client added successfully";
        header("location: /crud/index.php");
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
        <input type="hidden" name = "id" value="<?php echo $id; ?>" >
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