<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap4.3.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
  <script src="main.js"> </script>
  <script>
      function validate(){
      var username = document.getElementById('uname').value.trim();
      var password = document.getElementById('pass').value.trim();

      if (username == "" ){
        alert ('Please enter your username');
        return false;
      }
      else if (password == ""){
        alert ('Please enter your password');
        return false;
      }
      else {
        true;
      }
    }
  </script>
  <!-- <style>

  </style> -->
</head>
<body>
<div class="container-fluid bg">
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <form action="server.php" onsubmit= "return validate()" id="login" method="post">
      <h1> Login Form </h1>
      <img src="img/login2.gif" alt="" class="img img-responsive img-circle">
        <div class="form-group">
          <label for="">Username</label>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
            <input type="text" class="form-control" id="uname" name="Username" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span> </span>
            <input type="password" class="form-control" id="pass" name= "Password"placeholder="Password" required>
          </div>
        </div>
        <div class="checkbox">
          <label for=""><input type="checkbox"> Remember me </label>
          <span class="text-right"><a id="forget" href="#" style="float: right"> Forget Password?</a> </span>
        </div>
        <button type="submit" class="btn btn-success btn-block">Login</button>
        <p class="text-center">Not a member yet? &nbsp &nbsp<a id="signup" href="signup.php">Sign Up</a></p>
      </form>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
  </div>
</div>
  
</body>
</html>