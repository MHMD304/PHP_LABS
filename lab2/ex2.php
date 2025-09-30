<form action="ex2.php" method="post">
<label for="usr_input">Username</label>
<input name="usr_input" placeholder="enter you name" type="text" >
<br>
<br>
<label for="pass_input">Password</label>
<input name="pass_input" placeholder="enter you pass" type="password" >
<br><br>
<input type="submit" value="send" name="submit_name">
&nbsp;
<input type="submit" value="delete" name="submit_name">

</form>

<?php
if(isset($_POST['submit_name'])){
$username=$_POST['usr_input'];
$pass=$_POST['pass_input'];
trim($username);
if($_POST['submit_name']=="send")
{
if(!verify_pass($username,$pass))
{
  echo "the password is invalid";
}
else
{
    if(!empty($username))
       echo "hello $username";
    else 
        echo "enter your name";
}
}
else if($_POST['submit_name']=="delete")
{
    echo "the data is removed";
}
}

function verify_pass($username,$pass)
{
    if((strlen($pass)<6) || strpos($username,$pass)!==false || strpos($pass," ")!==false  )
        return false;
    return true;
}

?>