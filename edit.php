<?php
include 'inc/header.php';
include 'config/database.php';


$id = $name = $email = $phone = $address = '';
$errorMessage = $successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("Location: /crud/index.php");
        exit;
    }

    $id = $_GET["id"];
    // Make sure to escape the user input to prevent SQL injection (optional but recommended)
    $id = mysqli_real_escape_string($conn, $id);

    // Prepare the query
    $sql = "SELECT * FROM user WHERE id = '$id'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result row as an associative array
        $row = mysqli_fetch_assoc($result);

        // Check if the row was found
        if ($row) {
            // Now you can access the values using the column names
            $name = $row["name"];
            $email = $row["email"];
            $phone = $row["phone"];
            $address = $row["address"];
        }
    } else {
        // Query failed, handle the error as needed
        echo "Error: " . mysqli_error($conn);
    }

    // read the data where id is matched in the database
    // $sql = "SELECT * FROM user WHERE id = '$id'";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i", $id);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $row = $result->fetch_assoc();

} 
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check for form submission
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

        $sql = "UPDATE user Set name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);

        if(!$result)
        {
            $errorMessage = "Invalid Query : ".$conn->error;
            break;
        }

        $successMessage = "CLient updated successfulyy";
        header("location: /crud/index.php");
        exit;

    }while(false);
}



?>

<!-- Rest of the code remains unchanged -->


<!-- Rest of the code remains unchanged -->

<div class="container" style="margin-top: 70px;">
    <h2>New Client</h2>

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
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Enter your name">
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
                <button type="submit" class="btn btn-primary" href='/crud/index.php'>Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/crud/index.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>