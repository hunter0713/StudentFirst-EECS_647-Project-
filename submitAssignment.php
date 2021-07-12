<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Submit Assignment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <?php

    $submission = filter_input(INPUT_GET, "submission");
    $studentId = filter_input(INPUT_GET, "stuid");
    $assignmentId = filter_input(INPUT_GET, "assignId");
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
    $insertSubmission = $connect->query("INSERT INTO SUBMISSIONS(ASSIGNMENTID,STUDENTID,STUDENTANSWERS) VALUES ($assignmentId,$studentId,'$submission')");
    $connect->close();

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
  <div class="col align-items-start">
    <div class="col-sm-3">

    </div>

    <div class="col-lg-6">
      <h1> Submission Recieved! </h1>
</div>

</div>
</body></html>
