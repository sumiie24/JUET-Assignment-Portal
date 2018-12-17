<?php 

session_start();
$success="";
$error=" ";

$con= mysqli_connect("localhost","root","","assignment") or die(mysqli_error($con));



	if(isset($_POST['submit'])){

		$enroll_no= $_SESSION['enroll_no'];

		$enroll_query = "select enroll_no from solution where enroll_no= '$enroll_no'";
          $enroll_query_check = mysqli_query($con, $enroll_query) or die(mysqli_error($con));
          $row2 = mysqli_fetch_array($enroll_query_check);

		if($row2['enroll_no']==$enroll_no){
              $error= "You can't submit the Assignment again!";
          }
          else
          {
				$enroll_no= $_SESSION['enroll_no'];
				$tmp_name=$_FILES['file']['tmp_name'];
				$name=$_FILES['file']['name'];
				$position=strpos($name,".");
				$fileextension= substr($name, $position+1);
				$fileextension= strtolower($fileextension);
				$path= 'upload_ans/';

				move_uploaded_file($tmp_name, $path.$name);

				 $success= "Assignment successfully get submitted! CLICK on Logout!";    
				$insert_save_query= "insert into solution(enroll_no, filename) values('$enroll_no', '$name')";
				$insert= mysqli_query($con, $insert_save_query) or die(mysqli_error($con));

			}	
	}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Student Submit Assignment</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>

<center>
        <b><h3 style="font-weight: bold;"> Enrollment No: <?php echo $_SESSION['enroll_no'] ;

 ?>   </h3></b>
    </center>
<div id="main-content" class="container">

    <div id="portalname"><h1 style="padding-bottom: 10px;">Submit Assignment</h1> </div>
     <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>
  <div class="jumbotron" style="height:450px">
	

  	
  <form action="?success_error" method="post" enctype="multipart/form-data">
  
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
           <b><h3 style="color: red; font-weight: bold;" class="error_login"><?php echo $error; ?></h3></b>
         </center>
    
    <div class="row" >
      <input class="logout" value="SUBMIT" type="submit" name="submit">
    </div>

    
  </form>

		<div class="middle_time">
			<p id="demo" style="font-size: 30px" align="center"></p>
		
			<h3 align="center" style="font-weight: normal;">left for submission of assignment</h3>
		</div>	


</div>
</div>




<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script>
		var countDownDate= new Date("December 16, 2018 17:00:00").getTime();

		var countDownfunction = setInterval(function(){
			var now= new Date().getTime();
			var distance= countDownDate - now;

			var days= Math.floor(distance/(1000*60*60*24));
			var hours= Math.floor((distance %(1000*60*60*24))/(1000*60*60));
			var minutes= Math.floor((distance %(1000*60*60))/(1000*60));
			var seconds= Math.floor((distance %(1000*60))/1000);

			document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

			if(distance<=0){
				 window.location= 'not_submit.php';
			}
		},1000);
		
	</script>
</body>

</html>