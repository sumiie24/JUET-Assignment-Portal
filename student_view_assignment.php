
<?php 

	session_start();
	
	$con= mysqli_connect("localhost", "root", "", "assignment") or die(mysqli_error($con));


	$select_files= "select * from assignment_details";

	$select_files_result= mysqli_query($con, $select_files) or die(mysqli_error($con));


?>




<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Student View Assignment</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
<center>
        <b><h3 style="font-weight: bold;"> Enrollment No: <?php echo $_SESSION['enroll_no'] ?>   </h3></b>
    </center>

	
<div id="main-content" class="container">


    <div id="portalname"><h1 style="padding-bottom: 10px;"><u>All Assignments</u></h1> </div>
     <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>
  <div class="jumbotron" style="height:auto;">


<div class="row">
	
			<h4 class="col-md-3"><u><b>Assignment Name</b></u></h4>
			<h4 class="col-md-3" > <u><b>Float Date </b></u></h4>
			 <h4  class="col-md-3"> <u><b>Dead Date</b> </u></h4>
			<h4  class="col-md-3"> <u><b>File </b></u></h4>

	</div>


	 <?php while($row = mysqli_fetch_array($select_files_result)) {

	 	$files_field= $row['file'];

	 	$files_show= "upload_ques/$files_field";

	 	?>

<div class="row">

		 		<h5 class="col-md-3">  <?php echo $row['assignment_name'] ?></h5>

		 		<span class="col-md-3"> <?php echo $row['float_date']   ?> </span>
				<span class="col-md-3">  <?php echo $row['dead_date']   ?> </span>

	 			 <span class="col-md-3"> <?php echo "<a href='$files_show' 	target='_blanck'>$files_field</a>" ?> </span>
		 <hr>
	</div>

<?php } ?>
	


 </div> 
</div>


<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
