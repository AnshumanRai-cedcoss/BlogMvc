<?php

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>    

    <!-- Bootstrap core CSS -->
    
   <link rel="stylesheet" href="../../../public/node_modules/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="../../../public/assets/css/signin.css">

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
    
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="" method="POST">
    <h1 class="h3 mb-3 fw-normal">Sign In</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="emailId" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="signIn" type="submit">Sign in</button> 
  </form>
  
   <a href="<?php echo URLROOT?>signUp" target="_blank" class="btn btn-success">Create New Account</a>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
  
</main>   
  </body>
</html>