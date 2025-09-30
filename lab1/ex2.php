<?php
$i=1;$j=1;
echo "<table border = 1 style='border-collapse:collapse';>";
for($i=1;$i<=10;$i++){
	echo "<tr>";
	for($j=1;$j<=10;$j++)
	{
		if($i>1&&$j>1)
		echo "<td>"."<strong>".$i*$j."</strong>"."</td>";
		else
		echo "<td>".$i*$j."</td>";

	}
	echo"</tr>";
}
echo "</table>"


?>