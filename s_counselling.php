<?php
    session_start();

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
		
        <link rel="stylesheet" type="text/css" href="css/studentstyle.css">
	</head>

	<body>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="s_counselling.php">G_Counselling</a>
                </li>
                <li><a href="#">GroupStudy</a>
                    <ul>
                        <li><a href="creategroup.php">GroupStudy</a></li>
                        <li><a href="findgroup.php">FindGroup</a></li>
                    </ul>
				</li>
                <li><a href="mypost.php">My Post</a></li>
		
		<li><a href="#"><?php echo 
                $_SESSION['userid'];?></a></li>
		<li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
        
        <div>
		<?php
		while($row=mysqli_fetch_array($result)){
            if($row[5] != ""  && $row[2] == "teacher"  && $row[9] == "uncompleted" && $row[1] == $id){

             echo "Student's ID : $row[5]<br>";
             echo "Course : $row[8]<br>";
			 echo "Payment Offering : $row[6]<br>";
			 echo "Description : $row[7]<br>";
			 
             echo "Start Time : $row[3]<br>";
			 echo "End Time : $row[4]<br>";
			 echo "<br>";
             echo "<br>";
        
			}
            
            if($row[5] != ""  && $row[2] == "student"  && $row[9] == "uncompleted" && $row[5] == $id){

             echo "Student's ID : $row[1]<br>";
             echo "Course : $row[8]<br>";
			 echo "Payment Offering : $row[6]<br>";
			 echo "Description : $row[7]<br>";
			 
             echo "Start Time : $row[3]<br>";
			 echo "End Time : $row[4]<br>";
			 echo "<br>";
             echo "<br>";
        
			}
        }
		?>
            
		</div>
        
	</body>
</html>