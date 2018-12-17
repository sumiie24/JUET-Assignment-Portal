<?php
	session_start();

  $error=" ";

  if(isset($_POST['submit'])){

      $file1= $_POST['file1'];
      $file2= $_POST['file2'];

      $con= mysqli_connect("localhost", "root", "", "assignment") or die(mysqli_error($con));

      $select_files= "select * from solution where filename='$file1'";
      $select_files_result= mysqli_query($con, $select_files) or die(mysqli_error($con));
      $row = mysqli_fetch_array($select_files_result);

      $select_files_2= "select * from solution where filename='$file2'";
      $select_files_result_2= mysqli_query($con, $select_files_2) or die(mysqli_error($con));
      $row2 = mysqli_fetch_array($select_files_result_2);



      if($row['filename']==$file1 && $row2['filename']==$file2){

          $_SESSION['file1']= $file1;
          $_SESSION['file2']= $file2;

          header("location: text_diff_2.php");

      }

      else{
        $error=" File 1 or File 2 not exist! Try again! ";      }


     
     }

?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Check Plagiarism</title>
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
    <div id="portalname"><h1 style="padding-bottom: 10px;">Check Plagiarism</h1> </div>
    <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>

  <div class="jumbotron" style="height:auto;">


<form method="post">
<label>File 1 name</label>
		<input style="width: 25%;" type="text" name="file1" required="true">
		<br>

<label>File 2 name </label>
		<input style="width: 25%;" type="text" name="file2" required="true">

    <!-- error show if incorrect fields entered--> 
           <center>
           <b><h3 class="error_login"><?php echo $error; ?></h3></b>
         </center>

<center style="padding-right: 550px;">
	<input type="submit" name="submit" value="Check">
</center>

</form>

</div>
</div>

</body>
</html>