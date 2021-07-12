<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create Assignment</title>

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
$profID = filter_input(INPUT_GET, "classid");

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
    <div style="background-color: #276FBF; padding-top: 8px; padding-bottom: 8px; padding-right: 8px; padding-left: 8px; border-radius: 25px; margin-top: 50px;">
    <form class="form-signin" action="createAssignmentQuestions.php" method="get">
      <h1 class="h3 mb-3 font-weight-normal" style="color:white;">Create Assignment</h1>
      <label for="questiontotal" class="sr-only">Number of Questions</label>
      <input name="assignName" type="text" class="form-control" placeholder="Assignment Name" aria-label="name" style="margin-bottom: 8px;">
      <input name="assignDesc" type="text" class="form-control" placeholder="Assignment Description" aria-label="name" style="margin-bottom: 8px;">
      <input name="questiontotal" type="number" class="form-control" placeholder="Number of Questions" aria-label="name" style="margin-bottom: 8px;" min="1" max="100">
      <input type="hidden" name="classid" value="<?php echo $profID?>">
      <div class="checkbox mb-3">

      </div>
      <button class="btn btn-lg btn-outline-primary" type="submit" style="margin-top: 16px;">Start</button>
    </form>
  </div>


	</div>
	    <div class="col-sm-4">

    </div>
      </div>


</body></html>
