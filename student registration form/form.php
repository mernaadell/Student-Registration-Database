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
			$password=md5($password);
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

elseif (isset($_POST['login']))
 {
			$password=$_POST['password1'];
			$password=md5($password);
			$username=$_POST['username1'];
            $_SESSION['flag']="2";
			$select=$db->prepare("SELECT * FROM user WHERE username='$username' and password='$password'");
			$select->setFetchMode(PDO::FETCH_ASSOC);
			$select->execute();
			$data=$select->fetch();
			if($data['username']!=$username and $data['password']!=$password)
				{
					echo "invalid";
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
	<script type="text/javascript">
		function validate()
		{
			var username=document.getElementById("uN");
			var password=document.getElementById("pW");
			var email=document.getElementById("eM");
			var username1=document.getElementById("uN1");
			var password1=document.getElementById("pW1");
			if((username.value!=""||password.value!=""||email.value!="")||(username1.value!=""||password1.value!="")))
			{    return true;

			else
			{
                alert("no balank values allowed");
               false;
			}
			}
		}
	</script>
</head>

	<h1> login</h1>
</div>

<form onsubmit="return validate()" name="Register" action="" method="post" >
	<label> userName </label>
	<input id="uN"type="text" name="username" >
	<label> password </label>
	<input id="pW"type="password" name="password" required="">
	<label> email </label>
	<input id="eM"type="email" name="email" >
	<input  type="submit" value="register" name="signup"> 
</form>
<form onsubmit="return validate()" name="Register" action="" method="post" >
	<label> userName </label>
	<input id="uN1"type="text" name="username1">
	<label> password </label>
	<input id="pW1" type="password" name="password1">
	<input  type="submit" value="register" name="login"> 
	</form>
	
</form>
</body>
</html>