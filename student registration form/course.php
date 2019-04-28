<?php
  session_start();
      if($_SESSION['flag']=="1")
      echo "welcome  ".$_SESSION['username']; 
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
   	$iid=$_SESSION['what'];
      $sql="SELECT * from course where department_id=$iid";
      $result=$db->query($sql);
echo '<table <width="70%" border="1" highet="30%">
<tr>
<th> name </th>


</tr>

 ';
foreach ($result as $row) {

	echo '<tr> 
		<td>'.$row['course_name'].'</td>
	     </tr>';

      }

echo '</table>';
		 
    
}
catch(PDOException $e)
		{
			echo "failed". $e->getMessage();
		}
   $db=null;



       ?>