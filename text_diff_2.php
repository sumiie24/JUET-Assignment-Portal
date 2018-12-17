

<?php

session_start();

$file1=$_SESSION['file1'];
$file2=$_SESSION['file2'];

$sim=0;
$perc=0;

include_once "Text_Diff-1.2.2\Text\Diff.php";
include_once "Text_Diff-1.2.2\Text\Diff\Renderer.php";
include_once "Text_Diff-1.2.2\Text\Diff\Renderer\inline.php";


$f1= "upload_ans/$file1";


$f2= "upload_ans/$file2";



/*/
$f1="tfile1.txt";

$f2="tfile2.txt";
/*/

$diff = &new Text_Diff(file($f1), file($f2));
$renderer = &new Text_Diff_Renderer_inline();



?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE edge">
<meta name="viewport" content="width=device-width" initial-scale="1"> 
<title>Plagiarism</title>
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
    <div id="portalname"><h1 style="padding-bottom: 10px;">Plagiarism Found</h1> </div>
    <form action="index.php" style="padding-left: 570px;">
      <div class="row" >
            <input id="logout" type="submit" value="Logout"> 
        </div>
  </form>


     <div class="jumbotron" style="height:auto;">
     
     	<?php

     	echo $renderer->render($diff);



$sim=similar_text($f1,$f2,$perc);


echo "<h2><b><center><br>Similarity in Percentage : $sim  ($perc%)<br> </center><b></h2> ";


     	?>




     </div>



    </div>
</body>
</html>