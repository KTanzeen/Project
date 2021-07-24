<?php
    session_start();
    //DB Connection
    if(isset($_SESSION['post_type_s'])){
    $student=$_SESSION['post_type_s'];
    }
    $db = mysqli_connect("localhost","root","","freetimetutoring");
    //veriable dicler
    $courseErr = $topicErr = $desErr = "";
    $course = $description = $payment = $stime = $etime = "";
	$curdate = date("Y-m-d H:i:s");
	$userid = $_SESSION['userid'];

    if(isset($_POST['post'])) {
         if (empty($_POST["course"])) {
            $courseErr = "Course is required";
        } else {
            $course = mysqli_real_escape_string($db,$_POST['course']);
        }
        if (empty($_POST["payment"])) {
            $topicErr = "payment is required";
        } else {
            $payment = mysqli_real_escape_string($db,$_POST['payment']);
        }
        
		if (empty($_POST["des"])) {
            $desErr = "Des is required";
        } else {
            $description = mysqli_real_escape_string($db,$_POST['des']);
        }
		
		
		
		if (empty($_POST["stime"])) {
            $desErr = "Start Time is required";
        } else {
            $stime = $_POST['stime'];
        }
		
		if (empty($_POST["etime"])) {
            $desErr = "Start Time is required";
        } else {
            $etime = $_POST['etime'];
        }
		
            $sql = "INSERT INTO post(Person_ID, Date_Time, Course_ID, Post_Description, Selected_Start_Date_Time, Selected_End_Date_Time, Selected_Payment,Post_Type) values('$userid', '$curdate', '$course', '$description', '$stime', '$etime', '$payment','$student')";
            mysqli_query($db,$sql);
        
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
		
        <link rel="stylesheet" type="text/css" href="css/studentstyle.css">
	</head>

	<body>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Activity</a>
                    <ul>
                        <li><a href="student.php">Student</a></li>
                        <li><a href="#">Teacher</a></li>
                    </ul>
                </li>
                <li><a href="#">GroupStudy</a>
                    <ul>
                        <li><a href="creategroup.php">GroupStudy</a></li>
                        <li><a href="findgroup.php">FindGroup</a></li>
                    </ul>
				</li>
                <li><a href="post_student.php">Post</a></li>
            </ul>
        </nav>
		
        <div>
            <form method="post" action="post_student.php">
                Enter Course ID:
                  <input type="text" name="course" placeholder="Enter Course" required>
                  <br><br>
                Enter Payment:
                  <input type="text" name="payment" placeholder="Enter Payment" required>
                  <br>
                    <br>
                Enter Start Time:
                  <input type="datetime-local" name="stime" placeholder="Enter End Date and time" required>
                <br><br>
				Enter End Time:
                  <input type="datetime-local" name="etime" placeholder="Enter End Date and time" required>
                <br><br>
                Enter Post Description:
                  <textarea name="des"></textarea>
				<br><br>
				<input type="submit" value="post" name="post">
            </form>
        </div>
	</body>
</html>