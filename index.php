<?php include 'inc/header.php'; ?>

    <div class="container" style="margin-top: 70px;">
        <h2 class="navigator">List of Headings</h2>
        <a class="btn btn-secondary mb-3 mt-1" href="/crud/create.php" role="button">New Client</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>CREATED AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    // Defining
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
                    // fetching data from database
                    $sql = 'SELECT * FROM user';
                    $result = mysqli_query($conn,$sql);
                    // checking from fetching correctly or not
                    if(!$result)
                    {
                        die('Invalid query: '. $conn->error);
                    }
                    // For each loop for accessing data
                    while($row = $result->fetch_assoc())
                    {
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[date]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/crud/edit.php'?id = $row[id]>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/crud/delete.php'?id = $row[id]>Delete</a>
                            </td>
                        </tr>";
                    }

                ?>
                
            </tbody>

        </table>
    </div>
</body>
</html>