<?php

session_start();

$success="";

$con= mysqli_connect("localhost","root","","assignment") or die(mysqli_error($con));

    if(isset($_POST['submit'])){

        $assignment_name= $_POST['assignment_name'];
        $float_date= $_POST['float_date'];
        $dead_date= $_POST['dead_date'];

        $tmp_name=$_FILES['file']['tmp_name'];
        $name=$_FILES['file']['name'];
        $position=strpos($name,".");
        $fileextension= substr($name, $position+1);
        $fileextension= strtolower($fileextension);

        $path= 'upload_ques/';

        move_uploaded_file($tmp_name, $path.$name);

    

        $insert_save_query= "insert into assignment_details(assignment_name, float_date, dead_date, file) values('$assignment_name', '$float_date', '$dead_date', '$name')";

            $insert= mysqli_query($con, $insert_save_query) or die(mysqli_error($con));


        $success= "Assignment successfully get uploaded!";    

  }


?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Admin Upload Assignment</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">Upload Assignment</h1> </div>
    <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>

	<div class="jumbotron" style="height:auto;">
	

<center>
        <b><h3 style="font-weight: bold;"> Admin ID:- <?php echo $_SESSION['admin_id'] ?>   </h3></b>
    </center>
  <form action="?success_uploaded" method="post" enctype="multipart/form-data">
  
        <div id="row1" class="row" style="margin-bottom:12px">
          <div class="col-45" style="margin-top:-5px">
            <label for="starttime">Assignment Name</label>
          </div>
          <div class="col-55">
            <input type="text" id="assignname" name="assignment_name" required="true">
          </div>
        </div>

    
          <div class="row">
            <div class="col-45">
              <label for="fdate">Floating Date</label>
            </div>
            <div class="col-55">
              <input style="width: 40%;" type="date" id="fdate" name="float_date" required="true">
            </div>
          </div>


    
          <div class="row">
            <div class="col-45">
              <label for="deadline">Deadline</label>
            </div>
            <div class="col-55">
              <input style="width: 40%;" type="Date" id="deadline" name="dead_date" required="true">
            </div>
          </div>
    

    
            <div id="row1" class="row">
                
                <div class="col-45">
                  <label >Upload Assignment File</label>
                </div>
               
                <div class="col-55" style="margin-top:20px; ">
                  <input type="file" name="file" required="true">
                </div>

              </div>
  

              <!-- error show upload--> 
           <center>
           <b><h3 style="color: green; font-weight: bold;" class="error_login"><?php echo $success; ?></h3></b>
         </center>
    
    <div class="row" style="margin:50px 0 0 -260px;">
      <input class="generate" value="Float Assignment" type="submit" name="submit">
    </div>

    
  </form>

 </div> 
</div>

 
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>