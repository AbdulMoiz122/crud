<?php include 'inc/header.php'; ?>
<?php include 'config/database.php'; ?>



    <div class="container" style="margin-top: 70px;">
        
        <a class="btn btn-secondary mb-3 mt-1" href="/crud/createPost.php" role="button">New Post</a>

        <table class="table">
            <thead> 
                <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>USER ID</th>
                <th>ACTION</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    // fetching data from database
                    $sql = 'SELECT * FROM posts';
                    

                    $result = $conn->query($sql);
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
                            <td>$row[title]</td>
                            <td>$row[userid]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/crud/editpost.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/crud/deletepost.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>";
                    }
                ?>
                
            </tbody>

        </table>
        <a class="btn btn-secondary mb-3 mt-1" href="/crud/index.php" role="button">Back</a>

    </div>
</body>
</html>
