<?php
require_once 'config.php';
 // session_start();
 echo "<br>";
 echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
 echo "<center>";
       
$query="SELECT  * FROM postdata";
$result=mysqli_query($conn,$query)or die("Error" .mysqli_error($conn));
if(mysqli_num_rows($result)!=0)
{
while($row=$result->fetch_assoc())
{
    $id=$row["pid"];
   // echo "<a href='' name=".$id."</a>";
	echo "<a href='view.php?id=".$id."'>".$id."</a>";
    echo "<br>";
    echo "<br>";
}


}
else{
echo "";

} 

echo "</center>";

?>