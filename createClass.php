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
    <form class="form-signin" action="createClassCheck.php" method="get">
      <h1 class="h3 mb-3 font-weight-normal" style="color:white;">Create Class</h1>
      <label for="className" class="sr-only">Email address</label>
      <input name="className" type="text" class="form-control" placeholder="Class Name" aria-label="name" style="margin-bottom: 8px;">
      <label for="classDesc" class="sr-only">Password</label>
      <input name="classDesc" type="text" id="classDesc" class="form-control" placeholder="Class Description" required="">
      <input type="hidden" name="professorid" value="<?php echo $profID?>">
      <div class="checkbox mb-3">

      </div>
      <button class="btn btn-lg btn-outline-primary" type="submit" style="margin-top: 16px;">Create Class</button>
    </form>
  </div>


	</div>
	    <div class="col-sm-4">

    </div>
      </div>


</body></html>
