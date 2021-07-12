<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Create Class</title>

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
$profID = filter_input(INPUT_GET, "profid");
if($_GET){
  $professorId = filter_input(INPUT_GET, "professorid");
  $className = filter_input(INPUT_GET, "className");
  $classDesc = filter_input(INPUT_GET, "classDesc");
}
else{
  echo "error submitting class";
}
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

$getAssignments = $connect->query("INSERT INTO CLASSES(CLASSNAME,PROFESSORID,DESCRIPTION) VALUES ('$className','$professorId','$classDesc') ");
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


<body class="text-center" style="background-color: #CDEDF6;">
  <div class="container-sm">
  <div class="col align-items-start">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
      <h1> Submission Recieved </h1>
      <script>
      function goBackToDash(){
        location.href = "professorDashboard.php?id=" + "<?php echo $professorId?>"
      }
      </script>
      <button class="btn btn-lg btn-outline-primary" onClick="goBackToDash();" style="margin-top: 16px;">Back to Dashboard</button>

	</div>
	    <div class="col-sm-4">

    </div>
      </div>


</body></html>
