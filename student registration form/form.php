<?php
session_start();
$dsn = "mysql:host=localhost;dbname=student";
$user = "root";
$pass = "";
$db=new PDO($dsn,$user,$pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	  try{
		 

if (isset($_POST['login']))
 {
			$password=$_POST['password1'];
			
			$username=$_POST['username1'];
            $_SESSION['flag']="2";
			$select=$db->prepare("SELECT * FROM user WHERE username='$username' and password='$password'");
			$select->setFetchMode(PDO::FETCH_ASSOC);
			$select->execute();
			$data=$select->fetch();
			if($data['username']!=$username and $data['password']!=$password)
				{
					echo "Not found ";
				}
		elseif ($data['username']==$username and $data['password']==$password)
		 {
			$_SESSION ['username1']=$data['username'];
			$_SESSION ['password1']=$data['password'];

			$select2=$db->prepare("SELECT department_id FROM user WHERE username='$username' and password='$password'");
			$select2->setFetchMode(PDO::FETCH_ASSOC);
			$select2->execute();
			$data2=$select2->fetch();
			$_SESSION['department_id']=$data2['department_id'];
			if($data2['department_id']==null)
				{
					
				header("location:chooseDepartment.php");
				
				}
		else
				{
				header("location:course.php");	
				$db->null;
				}
			}
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
		function val()
		{
		alert("no balank values allowed");
		}
	function validate()
		{
			var username=document.getElementById("uN1");
			var password=document.getElementById("pW1");
		
			if(username.value==""||password.value=="")
			{   alert("no balank values allowed");
			 return false;
			else
			{
               true;
			}
			}
		}

	</script>
</head>


	

 <div class="login" style="height: 420px;">
 	<img src="images.png" class="avatar">
 	<h1>Login Here</h1>
 	<form  onsubmit="return validate()" name="Register" action="" method="post" >
	<label> Username </label>
	<input id="uN1"type="text" name="username1" placeholder="Enter Username">
	<label> Password </label>
	<input id="pW1" type="password" name="password1" placeholder="Enter password">
	<input  onclick="return validate()" type="submit" value="Register" name="login">
	<a href="Signin.php"> Don't have an account </a>
	
	</form>
</div>
</body>
</html>