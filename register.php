
<?php 

session_start();


$con = mysqli_connect("localhost","root","","quiz") or die(mysqli_error($con));
        
        $error=" ";
        $error2=" ";


if (isset($_POST['submit'])){

            $name = $_POST['name'];
            $enroll_no = $_POST['enroll_no'];
            $email_id = $_POST['email_id'];
            $phone_no = $_POST['phone_no'];
            $password_1 = $_POST['password_1'];
            $password_2= $_POST['password_2'];


            $enroll_query = "select * from register where enroll_no= '$enroll_no'";

            $duplicate_query_check = mysqli_query($con, $enroll_query) or die(mysqli_error($con));
           
            $row = mysqli_fetch_array($duplicate_query_check);


            if($row['enroll_no']==$enroll_no){

               $error2= "Sorry! You are already registered with entered Enrollment No.!";
            }

            else{

               if($password_1 == $password_2){

                session_start();

                $_SESSION['enroll_no']= $enroll_no;

                $register = "insert into register(name, enroll_no, email_id, phone_no, password) values('$name', '$enroll_no', '$email_id', '$phone_no','$password_1')";

                 $reg = mysqli_query($con, $register) or die(mysqli_error($con));

                 $error="";
                 header("location: register_validate.php");
               }

            else{
              $error= "Passwords not matched! Try again!";

            }   

            }


           

        }

?>



<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Registration</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" type="text/css">
</head>

<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
         <div class="navbar-header">
          <a href="index.php" class="pull-left visible-lg visible-md">
            <div id="logo-img"></div>
          </a>

          <div class="navbar-brand">
            <a href="index.php"><h1>JAYPEE UNIVERSITY OF ENGINEERING &amp; TECHNOLOGY </h1></a>
            <p>
              <span>A-B ROAD RAGHOGARH, GUNA</span>
            </p>
          </div>
         </div>
</div>
    </nav>
</header>


<div id="main-content" class="container">
    <div id="portalname"><h1 style="padding-bottom: 10px;">Register for Assignment Portal</h1> </div>
	<div class="jumbotron" style="height:670px">
  <form  method="post" >

      


          <div id="row1" class="row">
          <div class="col-45">
            <label >Name</label>
          </div>
          <div class="col-55">
            <input type="text" id="name" name="name" required="true">
          </div>
          </div>

          <div class="row">
            <div class="col-45">
              <label >Enrollment No.</label>
            </div>
            <div class="col-55">
              <input type="text" id="enroll_no" name="enroll_no" required="true" pattern=".{7}">
            </div>

            <div class="error_show">
              <h5>*only 7 characters</h5>
            </div>

          </div>


          <div class="row">
            <div class="col-45">
              <label >Email Id</label>
            </div>
            <div class="col-55">
              <input style="width: 40%"  type="email" id="email_id" name="email_id" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9-.-]+\.[a-z]{2,3}$">
            </div>


            <div class="error_show">
              <h5>* enter correct email id</h5>
            </div>

          </div>

          <div class="row">
            <div class="col-45">
              <label >Phone no.</label>
            </div>
            <div class="col-55">
              <input style="width: 40%" type="tel" id="phone_no" name="phone_no" required="true" pattern="[0-9]{10}">
            </div>

            <div class="error_show">
              <h5>*only 10 digits</h5>
            </div>

          </div>

          <div class="row">
            <div class="col-45">
              <label >Password</label>
            </div>
            <div class="col-55" class="password">
              <input style="width: 40%" type="password" id="password_1" name="password_1" required="true" pattern=".{5,}">
            </div>


            <div class="error_show">
              <h5>*minimum 5 characters</h5>
            </div>

          </div>

          <div class="row">
            <div class="col-45" class="password">
              <label >Confirm Password</label>
            </div>
            <div class="col-55">
              <input style="width: 40%" type="password" id="password_2" name="password_2"required="true" pattern=".{,5}">
            </div>
          </div>

               <!-- error show if password fields not matched--> 
          <center>
           <b><h3 class="error_login"><?php echo $error; ?></h3></b>
           <b><h3 class="error_login"><?php echo $error2; ?></h3></b>
         </center>

          <div class="row">
              <input type="submit" value="SUBMIT" name="submit">
            </div>
    
        	<div id="adminpage" class="row">
        		<a href="./admin_login.php">
        		  <span><b>Admin Login</b></span>	
        		</a>
        	  </div>

              <div id="adminpage" class="row">
            <a href="./index.php">
              <span><b>Student Login</b></span>  
            </a>
            </div>

  </form>
 </div> 
</div>

<footer class="panel-footer">
    <div class="container-fluid">
      <div class="text-center"><b>Developer: Sumit Yadav, Pankaj Bansal &amp; Nameh Dhiman</b> </div>
      <div class="text-center">&copy; Copyright Jaypee University of Engineering &amp; Technology </div>
    </div>
</footer>
 
 
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>