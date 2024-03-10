<?php
    $added = false ;
    $already_exist =  false ;

    if (isset($_POST['submit'])) {

        include_once("./connect.php") ;
        $name = $_POST['username'];
        $password = sha1($_POST['password']) ;

        $querySelect = "SELECT * FROM `regestration` WHERE username = '$name'";
        
        $go = mysqli_query($connect, $querySelect) ;
        
        if ($go) {
            
            $num = mysqli_num_rows($go) ;

            if ($num > 0) {
                $already_exist = !$already_exist ;

            } else {
                $queryInsert = "INSERT INTO `regestration` VALUES(NULL , '$name' , '$password') " ;
                $result = mysqli_query($connect, $queryInsert) ;
                if ($result) {
                    $added = !$added ;
                }
            }

        }
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>    

    <?php 
        if ($added) {
            echo
            '<div class="alert alert-success" role="alert">
            User added Successfully
            </div>' ; 
        }
    ?>

    <?php 
        if ($already_exist) {
            echo
            '<div class="alert alert-danger" role="alert">
            Error "Added Already"
            </div>' ; 
        }
    ?>

    <h1 class = "text-center">Sign Up</h1>
   
    <div class = "container" style = "margin-top:70px" enctype="multipart/form-data" >
        <form action = "sign.php"  method = "POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name = "username" placeholder="username">
               
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name = "password" placeholder = "password">
            </div>
           
            <button type="submit" class = "btn btn-primary w-50 " style = "margin-left:280px" name = "submit">Sign Up</button>
        </form>
    </div>
   
  </body>
</html>