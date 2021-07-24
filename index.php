<?php
	session_start();
    //DB Connection
    $db = mysqli_connect("localhost","root","","freetimetutoring");


    $id=$_SESSION['userid'];
    $sql="SELECT * FROM post";
	$result = mysqli_query($db,$sql);
    
    $souter="SELECT * FROM person";
    $resouter = mysqli_query($db,$souter);
    while($router=mysqli_fetch_array($resouter)){
            
            $count=0;
            $bal_sumb = 0;
            $bal_sumt = 0;
        
            $s1="SELECT * FROM counselling where T_ID = '$router[0]'";
            $res1 = mysqli_query($db,$s1);
            while($ro1=mysqli_fetch_array($res1)){
                if($router[0] == $ro1[0]){
                    $count++;
                    $bal_sumb+=$ro1[4];
                    $bal_sumt+=$ro1[5];

                }
            }
        
            if($count != 0){
            $ratingb = $bal_sumb/$count;
            $ratingt = $bal_sumt/$count;

            $s3 = "update person set B_R = '$ratingb', T_R = '$ratingt' where Person_ID = '$router[0]'";
            mysqli_query($db,$s3);
        }
    }
  
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
        //$i = 0;
		while($row=mysqli_fetch_array($result)){
            if($row[5] == ""){
			$sql1="SELECT * FROM person WHERE Person_ID='$row[1]'";
			$result1 = mysqli_query($db,$sql1);
		    $row1=mysqli_fetch_array($result1);
            
            if($row[2] == "teacher") $str = "STUDENT ";
            else $str = "TEACHER ";
        ?>
               
            <?php
             echo "$str  NEEDED<br>";
			 echo "Name  :$row1[2] $row1[3] <br>";
             echo "         ID : $row[1]<br>";
            
			 echo "Course : $row[8]<br>";
			 echo "Payment Offering : $row[6]<br>";
			 echo "Description : $row[7]<br>";
			 echo "Start Time : $row[3]<br>";
			 echo "End Time : $row[4]<br>";
			 echo "<br>";
			 echo "<br>";
            
            $s2="SELECT * FROM post_interested_id WHERE Person_ID='$row[1]' and Date_And_Time = '$row[0]'";
			$res2 = mysqli_query($db,$s2);
		    $r2=mysqli_fetch_array($res2);
                
            if($r2[2] == $id){
                echo "<br>";
                echo "Already Interested!";
            }
            else{
                    ?>

                 <a href="interested.php?date=<?php echo $row[0];?>&id=<?php echo $row[1];?>" style="text-decoration: none;font-size: 20px;">Interested</a>

                 <?php
            } 
             echo "<br>";
			 echo "<br>";
             echo "<br>";
        
			}
        }
            
        $stop="SELECT * FROM person ORDER BY T_R DESC LIMIT 0, 5";
        $rtop = mysqli_query($db,$stop);
        echo "<br>";
        echo "Top Teaching Rating Profile: ";
        echo "<br>";
        while($rowtop=mysqli_fetch_array($rtop)){
             echo "<br>";
             echo "Name : $rowtop[2] $row[3]<br>";
             echo "Email : $rowtop[1]<br>";
             echo "Join Date : $rowtop[5]<br>";
             echo "Teaching Rating(Out of 10): $rowtop[12]<br>";
             echo "Other's Rating(Out of 10): $rowtop[11]<br>";
             echo "<br>";
             echo "<br>";
        }
        
		?>
            
		</div>
	</body>
</html>