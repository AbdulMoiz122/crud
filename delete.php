<?php include 'config/database.php'; ?>

<?php

echo'HEllo';
if(!isset($_GET["id"]))
{
   header("Location : /crud/index.php");
    exit;
}
if (isset($_GET["id"])) 
{
    $id = $_GET["id"];

    

    // Prepared statement to delete data
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful, proceed to redirection
        header("Location: /crud/index.php");
        exit;
    } else {
        // Error occurred while executing the query
        echo "Error deleting record: " . $stmt->error;
    }
}



/*
if(isset($_GET["id"]))
{
    $id = $_GET["id"];

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

    $sql = "DELETE FROM user WHERE id=$id";
    $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        header("Location: /crud/index.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
}*/


?>