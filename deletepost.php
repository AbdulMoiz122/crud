<?php include 'config/database.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") 
{
    $userId = $_GET["id"]; 

    $sqlDeleteUser = "DELETE FROM user WHERE id=$userId";

    $resultDeleteUser = mysqli_query($conn, $sqlDeleteUser);
    

    if (!$resultDeleteUser) {
        throw new Exception("Error deleting user: " . mysqli_error($conn));
    }
    $successMessage = "User and associated posts deleted successfully.";
    header("Location: /crud/index.php");
    exit;

}


?>