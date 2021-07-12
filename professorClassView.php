<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StudentFirst | Class</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <?php
    $classId = filter_input(INPUT_GET, "id");
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
      $classInfo = $connect->query("SELECT * FROM CLASSES WHERE CLASSID='$classId'");
      $classInfo = mysqli_fetch_array($classInfo);
    $getAssignments = $connect->query("SELECT * FROM ASSIGNMENTS WHERE CLASSID='$classId'");
    $allAssignments = "";
    while($assignment = mysqli_fetch_array($getAssignments)){
      $allAssignments = $allAssignments . '|'. $assignment["ASSIGNMENTID"] .'|' . $assignment["ASSIGNMENTNAME"];
    }
    $getAllStudents = $connect->query("SELECT * FROM STUDENTS,MEMBERSHIPS WHERE MEMBERSHIPS.CLASSID='$classId' AND STUDENTS.STUDENTID = MEMBERSHIPS.STUDENTID");
    $stuString = "";
    while($student = mysqli_fetch_array($getAllStudents)){
      $stuString = $stuString . $student["STUDENTNAME"] . '|';
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
function redirectToAssignmentCreate(){
  location.href = "createAssignment.php?classid=" + "<?php echo $classId?>";
}
</script>
<body class="text-center" style="background-color: #CDEDF6;">
  <div class="container-sm">
  <div class="col align-items-start">
    <div class="col-sm-3">
      <div class="accordion" id="myAccordion2">
        <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#collapsible-2" data-parent="#myAccordion2">Students</button>
        <div id="collapsible-2" class="collapse" style="background-color: white;">
          <script>
          var array = ['','','','','','','','','','','','','','','','','','','',''];
          var index = 0;
          var stunames = "<?php echo $stuString?>";
          for(var i=0; i<stunames.length; i++){
            if(stunames[i] !== '|' ){
              array[index] = array[index] + stunames[i];
            }
            else{
              index = index + 1;
            }
          }
          console.log(array);
          var app = document.getElementById('collapsible-2');
          var next = -1;
          app.innerHTML = '<ul>' + array.map(function (clas) {
            if(clas !== ""){
              next = next + 1;
            return '<p>' + clas + '</p>';
          }
        }).join('') + '</ul>';
          </script>
        </div>
    </div>
    </div>

    <div class="col-sm-6">
      <h1><?php echo $classInfo['CLASSNAME'];?></h1>
      <h5><?php echo $classInfo['DESCRIPTION'];?></h5>

	</div>
	    <div class="col-sm-3">
        <div class="accordion" id="myAccordion">
          <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#collapsible-1" data-parent="#myAccordion">All Assignments</button>
          <div id="collapsible-1" class="collapse" style="background-color: white;">
            <script>
            var arr = ['','','','',''];
            var arrId = ['','','','',''];
            var assignmentString = "<?php echo $allAssignments;?>";
            var index = 0;
            for(var i = 0; i<assignmentString.length; i++){
              if(assignmentString[i] !== '|'){
                arr[index] = arr[index] + assignmentString[i];
              }
              else{
                arrId[index] = assignmentString[i+1];
                i = i + 2;
                index=index+1;
              }
            }
            console.log(arrId);
            var app = document.getElementById('collapsible-1');
            var next = -1;
            app.innerHTML = '<ul>' + arr.map(function (clas) {


              if(clas !== ""){
                next = next + 1;
                console.log(arrId[next])
            	return '<a href="professorAssignmentView.php?assignId=' + arrId[next] + '">' + clas + '</a><br>';
            }
          }).join('') + '</ul>';
            </script>
          </div>
      </div>
      <button type="button" class="btn btn-primary btn-block" style="margin-top: 30px;" onClick="redirectToAssignmentCreate();">Create Assignment</button>
    </div>
  </div>
</div>


</body></html>
