
<?php include 'config/database.php'; ?>

<?php
// php code to read submitted data
$name = $email = $phone = $address = '';
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    echo "vgjv";
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO user (name, email, phone, address)" .
            "VALUES ('$name','$email','$phone','$address')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query : " . $conn->error;
            break;
        }


        $name = $email = $phone = $address = '';
        $successMessage = "Client added successfully";
        echo "<script>$('#successmodal').modal('show');</script>";
        header("location: /crud/index.php");
        exit;
    } while (false);
}
?>


<!-- <div class="container" style="margin-top: 70px;">
    <h2>Adding Client</h2>

    
    
</div> -->

