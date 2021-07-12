<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student First | Assignment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <?php

    $assignmentId = filter_input(INPUT_GET, "assignId");
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
    $all = "";
    $allStuNames = "";
    $questions = $assignment["ASSIGNMENTQUESTIONS"];
    $getAllSubmissions = $connect->query("SELECT * FROM STUDENTS,SUBMISSIONS WHERE ASSIGNMENTID='$assignmentId' AND STUDENTS.STUDENTID = SUBMISSIONS.STUDENTID");
    while($submission = mysqli_fetch_array($getAllSubmissions)){
      $all = $all  . $submission["STUDENTANSWERS"] .'^';
      $allStuNames = $allStuNames .  $submission["STUDENTNAME"] . '^' ;
    }


    $connect->close();

  ?>
  <script>
  var allSubmissions = "<?php echo $all?>";

  var allStuNames = "<?php echo $allStuNames?>";

  var arr = ['','','','','',''];
  var stuArr = ['','','','','',''];
  var index = 0;
  for(var i =0; i<allSubmissions.length; i++){
    if(allSubmissions[i] !== '^'){
      arr[index] = arr[index] + allSubmissions[i];
    }
    else{
      index = index + 1;

    }
  }
  index = 0;
  for(var i =0; i<allStuNames.length; i++){
    if(allStuNames[i] !== '^'){
      stuArr[index] = stuArr[index] + allStuNames[i];
    }
    else{
      index = index + 1;
    }
  }

  </script>

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
    <br>
    <div id="submissions">

    </div>
    <script>
    var questions = "<?php echo $questions?>";
    var questionsArr=['','','','','']
    var idx = 0;
    for(var i=0; i<questions.length; i++){
      if(questions[i] !== '|'){
        questionsArr[idx] = questionsArr[idx] + questions[i];
      }
      else{
        idx = idx + 1;
      }

    }

    var app = document.getElementById('submissions');
    var next = -1;
    app.innerHTML = '<ul>' + arr.map(function (clas) {
      var assignment = "";
      console.log(clas);
      next = next + 1;
      assignment = assignment + "<p style=\"margin-top: 50px;\">" + stuArr[next] + "</p>";
      var helper = true;
      if(clas !== ""){
        nextQ = 0;
        for(var i=0; i<clas.length; i++){
            if(helper){
              assignment = assignment + '<div style=\"background-color: white;\"><p>' + questionsArr[nextQ] + '</p>';
              nextQ = nextQ + 1;
              assignment = assignment + "<p>";
              helper = !helper;
            }
            if(clas[i] !== '|'){
              assignment = assignment + clas[i];
            }
            else{
              helper = !helper;
              assignment = assignment + "</p></div>";
              i = i + 2;
            }
        }

        console.log(assignment);
      return assignment;
    }
  }).join('') + '</ul>';
    </script>

	</div>

</div>

	    <div class="col-sm-3">
    </div>
  </div>
</div>


</body></html>
