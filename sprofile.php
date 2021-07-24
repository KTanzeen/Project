<?php
	session_start();
    //DB Connection
    $db = mysqli_connect("localhost","root","","freetimetutoring");

    $id=$_GET['id'];
    $sql="SELECT * FROM person WHERE Person_ID='$id'";
	$result = mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result);

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
				</li><a href="mypost.php">My Post</a></li>	
				</li>
		<li><a href="#"><?php  echo 
                $_SESSION['userid'];?></a></li>
		<li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
	<div>
		<?php
		 
		 echo "Email : $row[1]<br>";
		 echo "Name : $row[2] $row[3]<br>";
		 echo "Phone Number : $row[6]<br>";
		 echo "Balance : $row[4]<br>";
		 echo "Join Date : $row[5]<br>";
		?>
	</div>
	</body>
</html>