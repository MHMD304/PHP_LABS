<?php
$number=0;
if(!isset($_POST['randnumber']))
{
	$number=rand(1,100);
}
else {
    $number = $_POST['randnumber'];
}
?>


<html>

<head> <title>Guess Number</title></head>

<body>
<h1> Guess the number between 1 and 100?</h1>
<form method="POST" action="guess.php">
<input type="number" name="usernum">
<input type="submit" name="guess" value="Guess">
<input type="hidden" name="randnumber" value="<?php echo $number;?>">
<h2><?php
if(isset($_POST['usernum'])){
if($_POST['usernum']<$_POST['randnumber'])
	echo "Choose greater value";
else if($_POST['usernum']>$_POST['randnumber'])
	echo "Choose smaller value";
else if($_POST['usernum']==$_POST['randnumber'])
	echo "You win!";
else
	echo "please enter a valid number";
}
?></h2>
</body>


</html>