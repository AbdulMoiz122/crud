<?php include 'inc/header.php'; ?>
<?php include 'config/database.php'; ?>



<div class="container" style="margin-top: 70px;">
    <h2 class="navigator">List of Headings</h2>
    <button type="button" class="btn btn-secondary mb-3 mt-1 new_client" data-bs-toggle="modal" data-bs-target="#useraddmodal">
        New Client
    </button>
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
            // fetching data from database
            $sql = 'SELECT * FROM user';
            $result = $conn->query($sql);
            // checking from fetching correctly or not
            if (!$result) {
                die('Invalid query: ' . $conn->error);
            }
            // For each loop for accessing data
            while ($row = $result->fetch_assoc()) {
                echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[date]</td>
                            <td>
                            <!-- Replace the anchor tag with a button -->
                                <button class='btn btn-primary btn-sm edit_btn' data-bs-toggle='modal' data-bs-target='#editModal' data-id='<?php echo $row[id]; ?>'>Edit</button>
                                <button class='btn btn-danger btn-sm delete_btn' data-bs-toggle='modal' data-bs-target='#deleteModal' data-id='<?php echo $row[id]; ?>'>Delete</button>
                            </td>
                        </tr>";
            }

            ?>

        </tbody>

    </table>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="useraddmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Adding Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./create.php" method="POST">

                <div class="modal-body">


                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : ''; ?>" placeholder="Enter your name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <!-- Replace this line in your HTML code -->
                            <input type="text" class="form-control" name="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Enter your email">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" placeholder="Enter your Phone">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="address" value="<?php echo isset($address) ? $address : ''; ?>" placeholder="Enter Your Address">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

-------------------------------------------------

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editing Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="edit.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($name) ? $name : ''; ?>" placeholder="Enter your name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" placeholder="Enter your Phone">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo isset($address) ? $address : ''; ?>" placeholder="Enter Your Address">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="deletepost.php" method="GET">
                <div class="modal-body">
                    <input type="hidden" name="id" id="delete_id">
                    
                    <h4>Do you want to delete ?</h4>
                </div>  
                <div class="modal-footer">
                    <button type="submit" name="deletedata" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">NO</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    $('.delete_btn').on('click', function() {
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);
    });
</script>



<script>
    $('.edit_btn').on('click', function() {
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#email').val(data[2]);
        $('#phone').val(data[3]);
        $('#address').val(data[4]);
    });
</script>

</body>

</html>