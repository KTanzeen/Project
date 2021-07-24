<?php
    session_start();

    $db = mysqli_connect("localhost","root","","freetimetutoring");

    $id=$_SESSION['userid'];
    $sql="SELECT * FROM post";
	$result = mysqli_query($db,$sql);
    

    $r1 = "";
    
    if(isset($_POST['add']))
    {
        $x=$_POST['fnum'];
        $y=$_POST['snum'];
        $r0=$_POST['r0'];
        $r1=$_POST['r1'];
        $r3=$_POST['r3'];
        $r5=$_POST['r5'];
        $r6=$_POST['r6'];
       
         //akhane data insert er code lekha lakbe
        if($r1 == $id){
            $s1 = "insert into counselling(T_ID, Date_Time, Selected_Start_Date_Time, S_ID, Collected_B_R_T, Collected_TSRS) values('$r5', '$r0', '$r3', '$r1', '$y', '$x')";
            mysqli_query($db,$s1);
            
            $sft = "select * from person where Person_ID = '$r5'";
            $sfs = "select * from person where Person_ID = '$r1'";
            $resultft = mysqli_query($db,$sft);
            $resultfs = mysqli_query($db,$sfs);
            
            $rft = mysqli_fetch_array($resultft);
            $rfs = mysqli_fetch_array($resultfs);
            
            $balancet = $rft[4] + $r6;
            $balances = $rfs[4] - $r6;
            
            echo $balancet;
            
            $supt = "update person set Balance = '$balancet' where Person_ID = '$r5'";
            mysqli_query($db,$supt);
            
            $sups = "update person set Balance = '$balances' where Person_ID = '$r1'";
            mysqli_query($db,$sups);
            
        }
        else if($r5 == $id){
            $s2 = "insert into counselling(T_ID, Date_Time, Selected_Start_Date_Time, S_ID, Collected_B_R_T, Collected_TSRS) values('$r1', '$r0', '$r3', '$r5', '$y', '$x')";
            mysqli_query($db,$s2);
            
            $sft = "select * from person where Person_ID = '$r1'";
            $sfs = "select * from person where Person_ID = '$r5'";
            $resultft = mysqli_query($db,$sft);
            $resultfs = mysqli_query($db,$sfs);
            
            $rft = mysqli_fetch_array($resultft);
            $rfs = mysqli_fetch_array($resultfs);
            
            $balancet = $rft[4];
            $balances = $rfs[4];
            echo $balancet;
            
            $supt = "update person set Balance = '$balancet' where Person_ID = '$r1'";
            mysqli_query($db,$supt);
            
            $sups = "update person set Balance = '$balances' where Person_ID = '$r5'";
            mysqli_query($db,$sups);
        }
        $s3 = "update post set result = 'Completed' where Date_Time = '$r0' and Person_ID = '$r1'";
        mysqli_query($db,$s3);
        
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
                <li><a href="t_counselling.php">T_Counselling</a>
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
             if($row[5] != ""  && $row[2] == "student"  && $row[9] == "uncompleted" && $row[1] == $id){
                
             $r1 = $row[1];

             echo "Teacher's ID : $row[5]<br>";
             echo "Course : $row[8]<br>";
			 echo "Payment Offering : $row[6]<br>";
			 echo "Description : $row[7]<br>";
			 
             echo "Start Time : $row[3]<br>";
			 echo "End Time : $row[4]<br>";
			 echo "<br>";
                
                
                ?>  
                <form method="post">
                Enter Teaching Rating(Out of 10):  <input type="text" name="fnum"/><hr/> 
                Enter Other's Rating(Out of 10): <input type="text" name="snum"/> <hr/>  		   
                <input type="submit"  name="add" value="DONE"/><hr/>
                <input id="prodId" name="r0" type="hidden" value="<?php echo $row[0];?>">
                    <input id="prodId" name="r1" type="hidden" value="<?php echo $row[1];?>">
                    <input id="prodId" name="r3" type="hidden" value="<?php echo $row[3];?>">
                    <input id="prodId" name="r5" type="hidden" value="<?php echo $row[5];?>">
                    <input id="prodId" name="r6" type="hidden" value="<?php echo $row[6];?>">
                </form>
            
                <?php 
                
                
             echo "<br>";
        
			}
            if($row[5] != ""  && $row[2] == "teacher"  && $row[9] == "uncompleted" && $row[5] == $id){

             echo "Teacher's ID : $row[1]<br>";
             echo "Course : $row[8]<br>";
			 echo "Payment Offering : $row[6]<br>";
			 echo "Description : $row[7]<br>";
			 
             echo "Start Time : $row[3]<br>";
			 echo "End Time : $row[4]<br>";
			 echo "<br>";
             echo "<br>";
            
                ?>  
                <form method="post">
                Enter Teaching Rating(Out of 10):  <input type="text" name="fnum"/><hr/> 
                Enter Other's Rating(Out of 10): <input type="text" name="snum"/> <hr/>  		   
                <input type="submit"  name="add" value="DONE"/><hr/>
                <input id="prodId" name="r0" type="hidden" value="<?php echo $row[0];?>">
                    <input id="prodId" name="r1" type="hidden" value="<?php echo $row[1];?>">
                    <input id="prodId" name="r3" type="hidden" value="<?php echo $row[3];?>">
                    <input id="prodId" name="r5" type="hidden" value="<?php echo $row[5];?>">
                    <input id="prodId" name="r6" type="hidden" value="<?php echo $row[6];?>">
                </form>
            
             <?php 
        
            }
        }
		?>
            
		</div>
        
	</body>
</html>