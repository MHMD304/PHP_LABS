<html>
	<?php
		$correct=0;$wrong=0;$mark=0;
		$correctAnswers=file('Answers.txt');
		$questions=file('questions.txt');
		for($i=0;$i<count($questions);$i+=5)
		{
			$questionKey = "radio-btn-".($i);
			if(isset($_GET[$questionKey]))
			{
			 $studentAnswer=trim($_GET[$questionKey]);
			 $format=explode('.',$studentAnswer);
			 $studentAnswer=$format[0];;
			}
			$question = $questions[$i];
			$op=array();
			for($z=0;$z<4;$z++)
				$op[$z]=$questions[$i+$z+1];
			$correctAnswer=$correctAnswers[$i / 5];
			for($j=0;$j<4;$j++){
				$option=$op[$j];
				$format=explode('.',$option);
				if(trim($format[0])==trim($correctAnswer))
				{
					$op[$j]=$op[$j]."-->Answer";
				}
				if(trim($format[0])==trim($studentAnswer)&&trim($format[0])==trim($correctAnswer)){
					$op[$j]="*".$op[$j]."-->correct";
					$correct++;
				}
				if(trim($format[0])== trim($studentAnswer)&&trim($format[0])!=trim($correctAnswer)){
					$op[$j]="*".$op[$j]."-->wrong";
					$wrong++;
				}
			} 
	?>
	<div>
		<h2><?php echo $question; ?></h2>
		<?php
			for($t=0;$t<4;$t++)
				echo "<p>".$op[$t]."</p>"
		?>
	</div>
		<?php 
		}
		?>
		<a href="res.php?correct=<?php echo $correct;?>&wrong=<?php echo $wrong; ?>"> Total</a>
</html>