
<?php
	session_start();
    //DB Connection
    $db = mysqli_connect("localhost","root","","freetimetutoring");

    $id=$_SESSION['userid'];
    $sql="SELECT * FROM post";
	$result = mysqli_query($db,$sql);

  
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		
        <link rel="stylesheet" type="text/css" href="css/indexstyle.css">
	</head>
	<body>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Activity</a>
                    <ul>
                        <li><a href="student.php">Student</a></li>
                        <li><a href="teacher.php">Teacher</a></li>
                    </ul>
                </li>
                <li><a href="#">GroupStudy</a>
                    <ul>
                        <li><a href="creategroup.php">GroupStudy</a></li>
                        <li><a href="findgroup.php">FindGroup</a></li>
                    </ul>
				</li>
                <li><a href="mypost.php">My Post</a></li>
		<li><a href="profile.php"><?php  echo 
                $_SESSION['userid'];?></a></li>
		<li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
        <div>
		<?php
		while($row=mysqli_fetch_array($result)){
			if($row[1] == $id && $row[9] != "done"){
                    $sql1="SELECT * FROM person WHERE Person_ID='$row[1]'";
                    $result1 = mysqli_query($db,$sql1);
                    $row1=mysqli_fetch_array($result1);

                    if($row[2] == "teacher") $str = "STUDENT ";
                    else $str = "TEACHER ";

                    $a = $row[0];
                    $b = $row[1];
                    $_SESSION['a_datetime']=$a;
                    $_SESSION['b_personid']=$b;
                     echo "$str  NEEDED<br>";
                     echo "Name  :$row1[2] $row1[3] <br>";
                     echo "         ID : $row[1]<br>";
                     echo "Course : $row[8]<br>";
                     echo "Payment Offering : $row[6]<br>";
                     echo "Description : $row[7]<br>";
                     echo "Start Time : $row[3]<br>";
                     echo "End Time : $row[4]<br>";
                     echo "<br>";
                
                if($row[5] == ""){
                    echo "Interested Persons<br>";
                        
                    $sql_post_interested="SELECT * FROM post_interested_id WHERE Date_And_Time = '$row[0]' and 	Person_ID = '$row[1]'";
                    $result_post_interested = mysqli_query($db,$sql_post_interested);
                    $count = 0;
                    
                    while($row_post_interested=mysqli_fetch_array($result_post_interested)){
                        $count++;
                        ?>
                        <a href="sprofile.php?id=<?php echo $row_post_interested[2];?>"><?php echo $row_post_interested[2];?></a>
                        <?php
                        
            
                      ?>
                      <a href="accpeted.php?id=<?php echo $row_post_interested[2];?>&date=<?php echo $row[0];?>" style="text-decoration: none;font-size: 20px;">Accpet</a>
                      <?php
                        
                        echo "<br>";
                    }
                    if($count == 0) echo "No One Interested Yet!";
                    
                     echo "<br>";
                     echo "<br>";
                }
                else {
                    echo "Selected Person : ";
                    echo "$row[5]<br>";
                    echo "<br>";
                     echo "<br>";
                }
                
                
                     
                }
        
			}
		?>
            
		</div>
	</body>
</html>