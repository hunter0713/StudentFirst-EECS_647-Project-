<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>StudentFirst | Student Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">


	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<?php
if($_POST){
  $inputEmail = filter_input(INPUT_POST, "inputEmail");
  $inputPassword = filter_input(INPUT_POST, "inputPassword");
  session_start();
  $servername = "mysql.eecs.ku.edu";
  $username = "hacobb";
  $password = "hunterphpserver";
  $dbName = "hacobb";

  $connect = new mysqli($servername, $username, $password, $dbName);
  if($connect->connect_error)
    {
      die("Connection failed: " . $connect->connect_error);
    }
  $userCheck = $connect->query("SELECT * FROM STUDENTS WHERE EMAIL='$inputEmail' AND PASSWORD='$inputPassword'");
  if((mysqli_num_rows($userCheck) > 0)){
    $userCheckArr = mysqli_fetch_array($userCheck);
    echo $userCheckArr['STUDENTID'];
    echo '<script>window.location.href = "dashboard.php?id=' . $userCheckArr['STUDENTID'] . '";</script>';
  }
  else{
    echo '<p style="color: red;"> Error: Wrong Username/Password </p>';
  }
  $connect->close();
}
?>
<nav class="navbar navbar-light" style="background-color: #276FBF;">

  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: white;">StudentFirst</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="color: white;">


      </div>
    </div>
  </div>
</nav>
<script>
function redirectToRegister(){
location.href = "register.php";
}
function redirectToTeacher(){
  location.href = "teacherLogin.php";
}
</script>

<body class="text-center" style="background-color: #CDEDF6;">
  <div class="container-sm">
  <div class="col align-items-start">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
    <div style="background-color: #276FBF; padding-top: 8px; padding-bottom: 8px; padding-right: 8px; padding-left: 8px; border-radius: 25px; margin-top: 50px;">
    <form class="form-signin" action="index.php" method="post">

      <h1 class="h3 mb-3 font-weight-normal" style="color:white;">Student Sign In</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="inputEmail" type="text" class="form-control" placeholder="Email" aria-label="Email" style="margin-bottom: 8px;">
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="inputPassword" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">

      </div>
      <button class="btn btn-lg btn-outline-primary" type="submit" style="margin-top: 16px;">Sign in</button>
    </form>
  </div>
  <button class="btn btn-lg btn-primary" style="margin-top: 16px; width: 200px;"  onClick="redirectToRegister();">Need to register?</button>
  <button class="btn btn-lg btn-primary" style="margin-top: 16px; width: 200px;" onClick="redirectToTeacher();"}>Professor Login</button>
	</div>
	    <div class="col-sm-4">

    </div>
      </div>


</body></html>
