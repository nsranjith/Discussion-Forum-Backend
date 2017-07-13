<?php
require_once 'config.php';
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
echo "<center>";
echo '<a href="home.php">Home</a>';
echo '<br>';
echo '<br>';
echo "</center>";

$pid = $_GET['id'];
$query="SELECT  pdata FROM postdata where pid='$pid'";
$result=mysqli_query($conn,$query)or die("Error" .mysqli_error($conn));
$row=$result->fetch_assoc();
echo '<textarea rows="4" cols="50" name="postarea" disabled=true style=background:#F0FFFF	>'.$row["pdata"].'</textarea>';
echo "<br><br>";

 $query="SELECT  comm FROM comments where pid='$pid'";
$result=mysqli_query($conn,$query)or die("Error" .mysqli_error($conn));
while($row=$result->fetch_assoc())
{
echo '<textarea rows="4" cols="50" name="commentarea" disabled=true style=background:#FAEBD7	>'.$row["comm"].'</textarea>';
echo "<br><br>";
}

if(isset($_POST["comment"])) {
         
          $comm=$_POST["postareas"];
          $query="INSERT INTO comments(pid,comm) VALUES ('$pid','$comm')";
          mysqli_query($conn,$query)or die("Error" .mysqli_error($conn));
    // echo '<textarea rows="4" cols="50" name="commentarea" disabled=true style=background:#FAEBD7	>'.$comm.'</textarea>';
header('location:view.php?id='.$pid.'');
                    
    //       echo"<form method=post>";
		  // echo '<textarea rows="4" cols="50" name="postareas"></textarea>';
		  // echo  "<br>";
		  // echo '<button type="submit" name="comment" class="btn">Submit</button>';
		  // echo "</form>" 	;  

        }
echo"<form method=post action=view.php?id=".$pid.">";
echo '<textarea rows="4" cols="50" name="postareas"></textarea>';
echo  "<br>";
echo '<button type="submit" name="comment" class="btn" >Submit</button>';
echo "</form>" 	;  
/*if(isset($_POST["comment"])) {
         
          $comm=$_POST["postareas"];
          $query="INSERT INTO comments(pid,comm) VALUES ('$pid','$comm')";
          mysqli_query($conn,$query)or die("Error" .mysqli_error($conn));
          echo"<form method=post>";
		  echo '<textarea rows="4" cols="50" name="postareas"></textarea>';
		  echo  "<br>";
		  echo '<button type="submit" name="comment" class="btn">Submit</button>';
		  echo "</form>" 	;  

        }
echo"<form method=post>";
echo '<textarea rows="4" cols="50" name="postareas" ></textarea>';
echo  "<br>";
echo '<button type="submit" name="comment" class="btn" >Submit</button>';
echo "</form>" 	;  */

?>
