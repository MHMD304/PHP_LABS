<?php

$arr1=array("ali@gmail.com","aline.kh@ul.edu.lb","samarlb@hotmail.com","samir@gmail.com","salim@hotmail.com","yassmine_87@gmail.com");

for($i=0;$i<count($arr1);$i++)
{
	$len=strlen($arr1[$i]);
	$pos=strpos($arr1[$i],'@');
	$ass_arr1[$i]=substr($arr1[$i],$pos+1,$len-$pos-1);
}

$res=array_count_values($ass_arr1);

foreach($res as $key=>$value)
{
	echo $key.":".$value."<br>";
}



?>
