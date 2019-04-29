
<?php
      session_start();

      if($_SESSION['flag']=="1"){
      echo " welcome  ".$_SESSION['username']; 
    }
      elseif ($_SESSION['flag']=="2") {
          # code...
         echo "welcome  ".$_SESSION['username1']; 
        }  
$dsn = "mysql:host=localhost;dbname=student";
$user = "root";
$pass = "";
$db=new PDO($dsn,$user,$pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   try{
      $sql="SELECT * from department";
      $result=$db->query($sql);
echo '
<!DOCTYPE html>

<html>

    <head>

        <title> choose department </title>
         <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet"  href="css/normlization.css">
        <meta charset="UTF-8">

    </head>
    <body>
<table <width="70%" border="1" highet="30%">
<tr>
<th > Name of Department</th>
<th> ID of Department </th>

</tr>

 ';
foreach ($result as $row) {

  echo '
  
  <tr> 
  <td>'.$row['name'].'</td>
  <td>'.$row['dept_id'].'</td>

  </tr>
';

      }

echo '</table>

     </body>
</html>';
     
    
}
catch(PDOException $e)
    {
      echo "failed". $e->getMessage();
    }
   $db=null;
   ?>
<?php
// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   $dsn = "mysql:host=localhost;dbname=student";
$user = "root";
$pass = "";
$db=new PDO($dsn,$user,$pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $x=$_SESSION['username1'];
            $y=$_SESSION['username'];
            if($_SESSION['flag']=="1")
            {
              $un=$y;
            }
            elseif ($_SESSION['flag']=="2") {
              # code...
              $un=$x;
            }
            else{
              echo "you made mistake";
            }
      $deptid=$_POST['new'];
      $_SESSION['what']=$deptid; 
      // $sel="SELECT user_id from user where username=$un";
      // $db->query($sel);

     $sql="UPDATE user set department_id = $deptid WHERE username= '$un'";
   $x= $db->query($sql);
       if($x){
            $db=null;
        header("location:course.php");

   }
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> choose department </title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet"  href="css/normlization.css">
        <meta charset="UTF-8">

    </head>

    <body>
      <label> Enter ID of Department</label>
 <div class="hi">
        <form action="" method="post">

          
  <input id="uN" type="number" min="1" max="5" name="new"><br><br>

            <input type="submit" name="update" >

        </form>
</div>
    </body>


</html>