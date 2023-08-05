<?php include 'config/database.php'; ?>

<?php

if (!isset($_GET["id"])) {
    header("Location : /crud/post.php");
    exit;
}

// post ke database se post nikle gai us ser ke id ke againt aur agr aye tou delete kre tou phr user delete else waise he user delete.

if (isset($_GET["id"])) 
{
    $userId = $_GET["id"]; 
    $sqlDeleteUser = "DELETE FROM posts WHERE id = $userId";

    $resultDeleteUser = mysqli_query($conn, $sqlDeleteUser);

    if (!$resultDeleteUser) {
        throw new Exception("Error deleting user: " . mysqli_error($conn));
    }
    $successMessage = "User and associated posts deleted successfully.";
    header("Location: /crud/post.php");
    exit;
}


?>