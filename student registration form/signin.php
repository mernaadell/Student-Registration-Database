<?php
session_start();
$dsn = "mysql:host=localhost;dbname=student";
$user = "root";
$pass = "";
$db=new PDO($dsn,$user,$pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	  try{
		 
if(isset($_POST['signup']))
		{  
			$email2=$_POST['email'];
			$password2=$_POST['password'];
			$username2=$_POST['username'];
			$_SESSION ['username']=$username2;
			$_SESSION ['password']=$password2;
			
			$_SESSION ['email']=$email2;
			$_SESSION['flag']="1";
			//$use="SELECT username FROM user WHERE username = $username";
			// if($db->query($use))
			// {
			// 	echo "used";
			// }
			
			$sql = "INSERT INTO user (email,username,password) VALUES ('$email2','$username2','$password2')";
				$db->query($sql);
				
				header("location:chooseDepartment.php");
		
	     }

	else
		{
			echo "no";
		}
}
catch(PDOException $e)
		{
			echo "failed". $e->getMessage();
		}
   $db=null;
?>

<!DOCTYPE html>
<html>
<head>
	<title> Regestration Form </title>
	<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet"  href="css/normlization.css">
	<script type="text/javascript">
		function validate()
		{
			var username=document.getElementById("uN");
			var password=document.getElementById("pW");
			var email=document.getElementById("eM");
			var username1=document.getElementById("uN1");
			var password1=document.getElementById("pW1");
			if(username.value==""||password.value==""||email.value=="")
			{   alert("no balank values allowed"); return false;
			else
			{
                
               true;
			}
			}
		}
	</script>
</head>
	

 <div class="login">
 	<img src="avatar.png" class="avatar">
 	<h1>SignUp Here</h1>
 	<form onsubmit="return validate()" name="Register" action="" method="post" >
	<label> Username </label>
	<input id="uN1"type="text" name="username" placeholder="Enter Username">
	<label> Password </label>
	<input id="pW1" type="password" name="password" placeholder="Enter password">
	<label> Email </label>
	<input id="pW1" type="email" name="email" placeholder="Enter your Email">
	<input  type="submit" value="Register" name="signup">
	
	
	</form>
</div>
</body>
</html>