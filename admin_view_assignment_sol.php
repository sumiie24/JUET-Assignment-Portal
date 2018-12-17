
<?php 

	session_start();


	
	$con= mysqli_connect("localhost", "root", "", "assignment") or die(mysqli_error($con));


	$select_files= "select enroll_no, filename from solution";

	$select_files_result= mysqli_query($con, $select_files) or die(mysqli_error($con));


?>




<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Admin View Assignment</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>

<center>
        <b><h3 style="font-weight: bold;">Admin ID: <?php echo $_SESSION['admin_id'] ?>   </h3></b>
    </center>
<div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">All Submitted Assignments</h1> </div>
    <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>

  <div class="jumbotron" style="height:auto;">

	
	<h3><b><u>Enrollment No.</u>
	&nbsp; &nbsp; &nbsp; &nbsp; 	&nbsp; &nbsp; <span><u> Submitted File </u></span>
</b>	
<button style="color: white; background-color: black  ; float: right ;" type="submit" >
	<a style="text-decoration: none; color: white;" href="check_plag.php" target="_blanck"> Check Plagiarism </a>
</button>
	 </h3>


	 <?php while($row = mysqli_fetch_array($select_files_result)) {

	 	$files_field= $row['filename'];

	 	$files_show= "upload_ans/$files_field";

	 	?>

	 	<h4> <?php echo $row['enroll_no'] ?>
	<span style="padding-left: 185px;"> <?php echo "<a href='$files_show' target='_blanck'>$files_field</a>" ?> </span>
<span style="padding-left: 190px;"> 
		</span>


	 </h4>


	 
	 <hr>

<?php } ?>
	



</body>
</html>