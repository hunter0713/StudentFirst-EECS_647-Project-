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
$totalQuestions = filter_input(INPUT_GET,"questiontotal");
$name = filter_input(INPUT_GET,"assignName");
$desc = filter_input(INPUT_GET,"assignDesc");
$classid = filter_input(INPUT_GET,"classid");
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
      <div id="assignment" class="text-left" style="margin-bottom: 30px;">

      </div>

<script>
function submit(){
  var submit = "";
for(var i=0; i<questionsarr.length; i++){
  if(questionsarr[i] !== "" && questionsarr[i] != undefined && questionsarr[i].length > 0){
    var k = document.getElementById(questionsarr[i]).value;
    var fixedQues = "";
    for(var m=0; m<k.length; m++){

      if(k[m] === '\"'){
        fixedQues= fixedQues + "\\\\" + k[m];
      }
      else{
        fixedQues = fixedQues + k[m];
      }
    }
    submit =  submit + (i+1) + ".) " +fixedQues + "|";
  }

}
console.log(submit);
location.href = "createAssignmentCheck.php?name=" + "<?php echo $name?>" + "&desc=" + "<?php echo $desc?>" + "&questions=" + submit + "&classid=" + "<?php echo $classid?>" + "&profid=" + "<?php echo $profID?>";
}
var app = document.getElementById("assignment");
var questionsarr = []
var totalQuestions = <?php echo $totalQuestions?>;
for(var i=0; i<totalQuestions; i++){
  questionsarr.push((i+1).toString());
}
console.log(questionsarr);
app.innerHTML = '<div>' + questionsarr.map(function (clas) {
  return('<p>' + clas + '</p>' + '<textarea style="margin-bottom: 30px;" id="' + clas + '" class="form-control" rows="5" placeholder="type question here...">' + '</textarea></div>')
}).join('') + '</div> <button class="btn btn-lg btn-primary" onClick="submit();" style="margin-bottom: 25px; width: 500px;">Submit Assignment</button>';
</script>

	</div>
	    <div class="col-sm-4">

    </div>
      </div>


</body></html>
