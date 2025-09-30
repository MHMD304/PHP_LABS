<?php
if(isset($_GET['correct'])&&isset($_GET['wrong']))
{
	$correct=$_GET['correct'];
	$wrong=$_GET['wrong'];
	$mark=$correct*2-$wrong;
	echo $correct."correct";
	echo $wrong."wrong";
	echo "res = ".$mark;
}

?>