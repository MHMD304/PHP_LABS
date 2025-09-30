<?php
	require_once "Q1.php";
	if(isset($_POST['ok-btn']))
	{
		$authinticated=false;
		$id=$_POST['id'];
		$password=$_POST['password'];
		$usersAssoc=fich2Tab("users.txt");
		$status="";
		foreach($usersAssoc as $i=>$v)
		{
			if($i==$id&&$v['password']==$password)
			{
				$authinticated=true;
				$status=$v['status'];
				break;
			}
		}
		if($authinticated==false){
			header("Location:connect.html");
			exit();
		}
		if(is_dir("pic"))
		{
			$pics=scandir("pics");
			$size=count($pics);
			$profile_pic="";
			for($i=0;$i<$size;$i++)
			{
			$pic_ext=pathinfo("pics".$pics[$i],PATHINFO_EXTENSION);
			$pic_name=str_replace($pic_ext,"",$pics[$i]);
			if($pic_name==$id)
			{
				$profile_pic=$pics[$i];
			}
			}
		}
		
		
	}
	
?>
<html>
	<body>
		<div>
			<h3>
				Profile
			</h3>
			<img src="<?php echo $profile_pic; ?>" alt="you don't have profile picture.">
			<p>
				My status:
			</p>
			<br>
			<p>
				<?php echo $status; ?>
			</p>
			<form action="change.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<input type="submit" name="submit" value="change profile">
			</form>
		</div>
	</body>
</html>