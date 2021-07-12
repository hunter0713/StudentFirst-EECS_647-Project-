<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StudentFirst | Assignment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <?php

    $assignmentId = filter_input(INPUT_GET, "id");
    $studentId = filter_input(INPUT_GET,"stuid");
    session_start();
    $servername = "mysql.eecs.ku.edu";
    $username = "hacobb";
    $password = "hunterphpserver";
    $dbName = "hacobb";
    $assignmentId = (int)$assignmentId;
    $connect = new mysqli($servername, $username, $password, $dbName);
    if($connect->connect_error)
      {
        die("Connection failed: " . $connect->connect_error);
      }
    $getAssignmentQuery = $connect->query("SELECT * FROM ASSIGNMENTS WHERE ASSIGNMENTID='$assignmentId'");
    $assignment = mysqli_fetch_array($getAssignmentQuery);
    $connect->close();

  ?>
<nav class="navbar navbar-light" style="background-color: #276FBF;">

  <div class="container-fluid">
    <a class="navbar-brand" href="index.html" style="color: white;">StudentFirst</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="color: white;">

      </div>
    </div>
  </div>
</nav>

<body class="text-center" style="background-color: #CDEDF6;">
  <div class="container-sm">
  <div class="col align-items-start">
    <div class="col-sm-3">

    </div>

    <div class="col-lg-6">
      <div>
      <h1>
        <?php
          echo $assignment['ASSIGNMENTNAME'];
        ?>
    </h1>
    <h5>
      <?php
        echo $assignment['DESCRIPTION'];
      ?>
    </h5>
    <script>
    var arr = "<?php echo $assignment['ASSIGNMENTQUESTIONS']?>";
    var k = 0;
    var arrArray = ["","","","","","","","","",""];
    for(var i=0; i<arr.length; i++){
      if(arr[i] !== '|'){
        arrArray[k] = arrArray[k] + arr[i];

      }
      else{
        k = k + 1;
      }
    }


    </script>

	</div>
  <div id="assignment">

  </div>
</div>
<script>
function submit(){
  var submit = "";
for(var i=0; i<arrArray.length; i++){
  if(arrArray[i] !== "" && arrArray[i] != undefined && arrArray[i].length > 0){
    var k = document.getElementById(arrArray[i]).value;
var fixedAns = "";
    for(var m=0; m<k.length; m++){

      if(k[m] === '\"'){
        fixedAns= fixedAns + "\\\\" + k[m];
      }
      else{
        fixedAns = fixedAns + k[m];
      }
    }
    submit = submit + fixedAns + "|~|";
  }

}
location.href = "submitAssignment.php?submission=" +  submit + '&stuid=' + "<?php echo $studentId;?>" + "&assignId=" + "<?php echo $assignmentId;?>";
console.log(submit);
}
	var assignment = document.getElementById('assignment');
  var next = -1;
assignment.innerHTML = '<div style="margin-top:80px;">' + arrArray.map(function (clas) {
  if(clas !== ""){
  return('<p style="margin-top: 30px;">' + clas + '</p>' + '<textarea id="' + clas + '" class="form-control" rows="5" placeholder="type answer here...">' + '</textarea></div>');
}
}).join('') + '</div>' + '<button class="btn btn-lg btn-primary" onClick="submit();" style="margin-top: 16px; width: 600px;">Submit Assignment</button>';
</script>
	    <div class="col-sm-3">
    </div>
  </div>
</div>


</body></html>
