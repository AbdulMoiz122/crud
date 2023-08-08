<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="btn btn-secondary ml-5 <?php if ($_SERVER['REQUEST_URI'] == '/crud/index.php') echo 'active'; ?>" href="/crud/index.php" role="button">Users</a>
                <a class="btn btn-secondary ml-2 <?php if ($_SERVER['REQUEST_URI'] == '/crud/post.php') echo 'active'; ?>" href="/crud/post.php" role="button">Posts</a>
            </div>
        </div>
    </nav>

    <!-- <nav class="navbar fixed-top bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand pl-5" style="color: white;" href="#">CRUD</a>
        </div>
    </nav> -->