<?php 

session_start();

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Can't Submit</title>
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

    <div id="portalname"><h1 style="padding-bottom: 10px;">Can't submit Assignment Now!</h1> </div>
     <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>
  
</div>




<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

</body>

</html>