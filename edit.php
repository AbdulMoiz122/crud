<?php
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
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check for form submission
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    var_dump($_POST); // Check the received form data

    if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = "All the fields are required";
    }

    $sql = "UPDATE user Set name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    

    if (!$result) {
        $errorMessage = "Invalid Query : " . $conn->error;
    }

    $successMessage = "CLient updated successfulyy";
    header("location: /crud/index.php");
}



?>
