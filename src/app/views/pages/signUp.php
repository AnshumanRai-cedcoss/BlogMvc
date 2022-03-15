<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>    

    <!-- Bootstrap core CSS -->
    <link href="../../../public/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../../public/assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signup text-center">
  <form action="" method="post">
    <h1 class="h3 mb-3 fw-normal">New User</h1>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingUname" name="uName" placeholder="User Name" required>
        <label for="floatingPassword">User Name</label>
      </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control m-0" id="floatingPassword" 
      name="password" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingRePassword" 
        name="rePassword" placeholder="RePassword" required>
        <label for="floatingPassword">Re-type New Password</label>
      </div>
    <button class="w-100 btn btn-lg btn-primary" name="addUser" type="submit">Register User</button>
    <p class="m-5 text-primary"> Already registered <a href="pages/login" target="_blank">Sign In</a> </p>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
    <p class="text-danger"> <?php  if ($data != "") {
        echo $data ;
        ?>  
      </p>  <a class="btn btn-success" href="<?php echo URLROOT  ?>pages/home/user">Read Blogs</a>  <?php
} ?> 
  </form>
</main>  
  </body>
</html>