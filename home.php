<?php 
    session_start() ;
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
    }

    if (isset($_POST['logout'])) {
        session_destroy() ;
        header('location:login.php') ;
    }
?>  

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Home</title>
  </head>
  <body>
    <h1 class = "text-center mt-5">Hello, <?=$_SESSION['username']?> </h1>
    <form method="POST">
    <button name ="logout" class="btn btn-primary text-center mt-5 ml-5">Log out</button>
    </form>
  </body>
</html>