<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student First | Professor Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

	<!-- Latest compiled and minified CSS -->
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

	$profID = filter_input(INPUT_GET, "id");

  $userClasses = "";
	$userClassesQuery = $connect->query("SELECT CLASSID,CLASSNAME FROM CLASSES WHERE PROFESSORID = '$profID'");
	while($entry = mysqli_fetch_array($userClassesQuery)){
    $userClasses = $userClasses . $entry['CLASSNAME'] . '|' . $entry['CLASSID'] . '|';
  }
$userAssignments = "";
$userAssignmentsQuery = $connect->query("SELECT ASSIGNMENTNAME, ASSIGNMENTID FROM STUDENTS,ASSIGNMENTS,MEMBERSHIPS,CLASSES WHERE STUDENTS.STUDENTID = '$profID' AND STUDENTS.STUDENTID = MEMBERSHIPS.STUDENTID AND MEMBERSHIPS.CLASSID = CLASSES.CLASSID AND ASSIGNMENTS.CLASSID = CLASSES.CLASSID");
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
<script>
function redirectToClassCreate(){
  location.href = "createClass.php?profid=" + "<?php echo $profID?>";
}
</script>
<body class="text-center" style="background-color: #CDEDF6;">
  <div class="container-sm">
  <div class="col align-items-start">
    <div class="col-sm-2">
      <button type="button" class="btn btn-primary btn-block" onClick="redirectToClassCreate();">Create Class</button>
    </div>

    <div class="col-sm-6">

	</div>
	    <div class="col-sm-4">
	<div class="accordion" id="myAccordion">
    <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion">My Classes</button>
    <div id="collapsible-1" class="collapse" style="background-color: white;">
	<script>
	var app = document.getElementById('collapsible-1');
	var arr = ["","","","","","","","","","","","","",""]
  var arrId = ["","","","","","","","","","","","",""]
  var classesString = "<?php echo $userClasses; ?>";
  var i;
  var k =0;
  for(i=0; i<classesString.length; i++){
    if(classesString[i] != '|'){
      arr[k] = arr[k] + classesString[i];
    }
    else{
      i = i +1;
      while(classesString[i] === '1' || classesString[i] === '2' || classesString[i] === '3' || classesString[i] === '4' || classesString[i] === '5' || classesString[i] === '6' || classesString[i] === '7' || classesString[i] === '8' || classesString[i] === '9' || classesString[i] === '0'){
        arrId[k] = arrId[k] + classesString[i];
        i = i +1;
      }
      k = k + 1;
    }
  }

  console.log(arrId);
  console.log(arr);
  var next = -1;
app.innerHTML = '<ul>' + arr.map(function (clas) {

  if(clas !== ""){
      next = next + 1;
	return '<a href="professorClassView.php?id=' + arrId[next] + '">' + clas + '</a><br>';
}
}).join('') + '</ul>';
	</script>
    </div>
</div>
    </div>
      </div>


</body></html>
