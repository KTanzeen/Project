<?php
    session_start();
    $post_type_s="student";
    $_SESSION['post_type_s']=$post_type_s;
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
                <li><a href="t_counselling.php">T_Counselling</a>
                </li>
                <li><a href="post_student.php">Post</a></li>
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
	</body>
</html>