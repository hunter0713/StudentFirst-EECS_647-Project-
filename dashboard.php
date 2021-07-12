<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StudentFirst | Student Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
	<?php
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

	$stuID = filter_input(INPUT_GET, "id");

  $userClasses = "";
	$userClassesQuery = $connect->query("SELECT CLASSES.CLASSID,CLASSES.CLASSNAME FROM STUDENTS,CLASSES,MEMBERSHIPS WHERE STUDENTS.STUDENTID = '$stuID' AND STUDENTS.STUDENTID = MEMBERSHIPS.STUDENTID AND MEMBERSHIPS.CLASSID = CLASSES.CLASSID");
	while($entry = mysqli_fetch_array($userClassesQuery)){
    $userClasses = $userClasses . $entry['CLASSNAME'] . '|' . $entry['CLASSID'] . '|';
  }
$userAssignments = "";
$userAssignmentsQuery = $connect->query("SELECT ASSIGNMENTNAME, ASSIGNMENTID FROM STUDENTS,ASSIGNMENTS,MEMBERSHIPS,CLASSES WHERE STUDENTS.STUDENTID = '$stuID' AND STUDENTS.STUDENTID = MEMBERSHIPS.STUDENTID AND MEMBERSHIPS.CLASSID = CLASSES.CLASSID AND ASSIGNMENTS.CLASSID = CLASSES.CLASSID");
while($entry = mysqli_fetch_array($userAssignmentsQuery)){
  $userAssignments = $userAssignments . $entry['ASSIGNMENTNAME'] . '|' . $entry['ASSIGNMENTID'] . '|';
}

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
  <div class="container-sm">
  <div class="col align-items-start">
    <div class="col-sm-2">
      <div class="accordion" id="myAccordion2">
        <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#collapsible-2" data-parent="#myAccordion2">My Assignments</button>
        <div id="collapsible-2" class="collapse" style="background-color: white;">
      <script>
      var app = document.getElementById('collapsible-2');
      var arr = ["","","","","","","","","","",""]
      var arrId = []
      var assignmentString = "<?php echo $userAssignments; ?>";
      var i;
      var k =0;
      for(i=0; i<assignmentString.length; i++){
        if(assignmentString[i] != '|'){
          arr[k] = arr[k] + assignmentString[i];
        }
        else{
          arrId[k] = assignmentString[i+1];
          i = i + 2;
          k = k + 1;
        }
      }

      console.log(arrId);
      var next = -1;
      app.innerHTML = '<ul>' + arr.map(function (clas) {
      next = next + 1;
      if(clas !== ""){
      return '<a href="assignment.php?id=' + arrId[next] + '&stuid=' + '<?php echo $stuID; ?>' +'">' + clas + '</a><br>';
      }
      }).join('') + '</ul>';
      </script>
        </div>
      </div>
    </div>

    <div class="col-sm-5">

	</div>
	    <div class="col-sm-5">
	<div class="accordion" id="myAccordion">
    <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion">My Classes</button>
    <div id="collapsible-1" class="collapse" style="background-color: white;">
	<script>
	var app = document.getElementById('collapsible-1');
	var arr = ["","","","","","","","","","",""]
  var arrId = []
  var classesString = "<?php echo $userClasses; ?>";
  var i;
  var k =0;
  for(i=0; i<classesString.length; i++){
    if(classesString[i] != '|'){
      arr[k] = arr[k] + classesString[i];
    }
    else{
      arrId[k] = classesString[i+1];
      i = i + 2;
      k = k + 1;
    }
  }

  console.log(arrId);
  var next = -1;
app.innerHTML = '<ul>' + arr.map(function (clas) {
  next = next + 1;
  if(clas !== ""){
	return '<a href="class.php?id=' + arrId[next] + '&stuid=' + "<?php echo $stuID?>" +'">' + clas + '</a><br>';
}
}).join('') + '</ul>';
	</script>
    </div>
</div>
    </div>
      </div>


</body></html>
