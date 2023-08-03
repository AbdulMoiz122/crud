<?php
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
}

header("Location : /crud/index.php");
exit;
?>