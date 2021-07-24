<?php
	session_start();
    //DB Connection
    $db = mysqli_connect("localhost","root","","freetimetutoring");

    $id=$_SESSION['userid'];
    $sql="SELECT * FROM person WHERE Person_ID='$id'";
	$result = mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Free Time Tutoring</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" />
 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper" class="">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="pull-left hidden-xs">Free Time Tutoring</p>
        <p class="pull-right"><i class="fa fa-phone"></i>Tel No. ()</p>
      </div>
    </div>
  </div>
</div>
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="homepage.php"><img src="img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="homepage.php">Home</a></li> 
						 <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tuition<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="tuitionpost.php">Find Tutor</a></li>
                            <li><a href="findtuition.php">Find Tuition</a></li>
                        </ul>
                    </li>
                        
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Group Study<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="findgroup.php">Find group study</a></li>
                            <li><a href="creategroup.php">Create new</a></li>
                        </ul>
                    </li>
                        
<!--						<li><a href="#">Courses</a></li>-->
                        <li><a href="sessionend.php">log out</a></li>
                        
                        <?php
                        //echo($id);
                        if($id != "empty"){
                            echo '<a href="profile.php"><img style = "vertical-align: middle;
                                  width: 50px;
                                  height: 50px;
                                  border-radius: 50%; margin-top: 7px;" src="data:image;base64,'.$row[4].'"/></a>';
                        }
                        ?>
                        
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header --> 
	<section id="call-to-action-21">
	</section>
	
	<section id="inner-headline">
	<div class="container" >
		<div class="row" style="height: 10px">
			<div class="col-lg-12">
				<h2 class="pageTitle" style = "font-size:40px;">Your Profile</h2>
			</div>
		</div>
	</div>
	</section>
    
    
    

    
    
    
    
    
    
    
	<section id="content">
		<div class="container content">

        <!-- End Info Blcoks -->
            
        <?php 
            
            
        ?>
        
        <div class="row service-v1 margin-bottom-40">
            <div class="col-md-4 md-margin-bottom-40">
<!--               <img class="img-responsive" src="img/service1.jpg" alt="">       -->
                <?php  echo '<img style = "
                                width: 400px;
                                height: 300px;
                                margin-top: 7px;" src="data:image;base64,'.$row[4].'"/>';
                ?>
            </div>
        </div>
        <!-- End Service Blcoks -->
        
            <h3 style="text-transform: uppercase;color: #333; font-size:27px;"><strong><?php  echo ($row[2]); echo str_repeat("&nbsp;", 1); echo ($row[3]);?></strong></h3>
            
            <h6 style="color: #ef801a; margin-top: 10px; margin-bottom: 5px; font-size:20px;"><p><strong>ID : </strong><span style="color: #333;"><?php  echo ($row[0]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>EMAIL : </strong><span style="color: #333;"><?php  echo ($row[1]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>PHONE NUMBER : </strong><span style="color: #333;"><?php  echo ($row[8]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>DEPARTMENT : </strong><span style="color: #333;"><?php  echo ($row[9]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>START DATE : </strong><span style="color: #333;"><?php  echo date('jS F, Y', strtotime($row[7])); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>BALANCE : </strong><span style="color: #333;"><?php  echo ($row[6]);  ?> TK</span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>TUTOR RATING : </strong><span style="color: #333;"><?php  echo ($row[13]); ?></span></p></h6>
            
            <?php 
            $string = "completed";
            $sqlcount="SELECT COUNT(*) FROM post WHERE Person_ID = '$id' AND result = '$string'";
            $resultcount = mysqli_query($db,$sqlcount);
            $rowcount=mysqli_fetch_array($resultcount);
            ?>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>TAKEN TUITION COUNT : </strong><span style="color: #333;"><?php  echo ($rowcount[0]); ?></span></p></h6>
            
            <?php 
            $string1 = "completed";
            $sqlcount1="SELECT COUNT(*) FROM post WHERE Selected_Person_ID = '$id' AND result = '$string1'";
            $resultcount1 = mysqli_query($db,$sqlcount1);
            $rowcount1=mysqli_fetch_array($resultcount1);
            ?>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>GIVEN TUITION COUNT : </strong><span style="color: #333;"><?php  echo ($rowcount1[0]); ?></span></p></h6>
            
            
        
            <?php 
            
            
        ?>
            
    </div>
    </section>
    
    
    
    
    
    
    
    <section id="call-to-action-21", style="background-color: #e6e6e6;">
    <div class="container">
		
        <div class="row">
            
            
            
<!--            taking tuition-->
            <div class="col-md-6">
                    <h3 style="color: #333; font-size:24px;text-align:center;"><strong>Requested posts asking for tutor</strong></h3>
                
                
                <?php
                    
                    $sqlpost="SELECT * FROM post WHERE Person_ID = '$id' AND result = 'uncompleted'";
                    $resultpost = mysqli_query($db,$sqlpost);
                
                    while($rowpost=mysqli_fetch_array($resultpost)){
                        // je post kortese tar info
                        
                        $sql1="SELECT * FROM person where Person_ID = '$rowpost[1]'";
                        $result1 = mysqli_query($db,$sql1);
                        $row1=mysqli_fetch_array($result1);
                        
                        
                ?>
                
                <div class="row">
                    <div style = "background-color: #ffffff;
                                  width: 570px;
                                  padding: 45px;">
                        
                        
                    <h4 style="color: #000; margin-bottom: 1px;font-size:20px;"><strong>Find Tutor</strong></h4>
                        
                    <h6 style="margin-top: 0px; margin-bottom: 5px; font-size:12px; text-align: right"><p>Posted on <?php echo date('jS F, Y', strtotime($rowpost[0]));  ?></p></h6>
                        
                        
                     <div class="row" style = "margin-top: 5px; margin-bottom: 1px;">
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Department :</strong><span style="color: #333;"> <?php  echo ($row1[9]); ?></span></h6>
                         </div>
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Student Gender : </strong><span style="color: #333;"><?php  echo ($row1[5]); ?></span></h6>
                         </div>
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px; font-size:13px;"><strong>Tuion Type : </strong><span style="color: #333;"><?php  echo ($rowpost[2]); ?></span></h6>
                         </div>
                     </div>
                    
                        <h6 style="color: #ef801a; margin-top: 25px; margin-bottom: 0px; font-size:13px;"><p><strong>Topic Description : </strong><span style="color: #333;"><?php  echo ($rowpost[8]); ?></span></p></h6>
                        
                        <h6 style="color: #ef801a;margin-top: 0px; margin-bottom: 3px; font-size:13px;"><strong>Salary : </strong><span style="color: #333;"><?php  echo ($rowpost[6]); ?> TK</span></h6>
                        
                        <h6 style="color: #ef801a;margin-top: 0px; margin-bottom: 3px; font-size:13px;"><strong>Gender preference : </strong><span style="color: #333;"><?php  echo ($rowpost[7]); ?></span></h6>
                        
                        
                        
                        <div class="row" style = "margin-top: 0px; margin-bottom: 1px;">
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Start Time :</strong><span style="color: #333;"><?php echo date("h:i A -  d M,Y", strtotime($rowpost[3])); ?></span></h6>
                             </div>
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>End Time : </strong><span style="color: #333;"><?php echo date("h:i A - d M,Y", strtotime($rowpost[4])); ?></span></h6>
                             </div>
                         </div>
                        
<!--                    interested code-->
                        
                        <h4 style="color: #ef801a; margin-bottom: 0px;margin-top: 20px; font-size:15px;"><strong>Interested Tutor : </strong></h4>
                        
                        <?php
                        
                            $sqlinterested="SELECT Interested_ID from post_interested_id WHERE Date_And_Time = '$rowpost[0]' AND Person_ID ='$rowpost[1]' ";
                            $resultinterested = mysqli_query($db,$sqlinterested);
                        while($rowinterested=mysqli_fetch_array($resultinterested)){
                            // je post kortese tar info
                            $sql2="SELECT * FROM person where Person_ID = '$rowinterested[0]'";
                            $result2 = mysqli_query($db,$sql2);
                            $row2=mysqli_fetch_array($result2);
                        ?>
                        
                        
                        <h4 style="color: #333; margin-bottom: 1px;font-size:15px; text-align: right"><strong><?php echo($row2[2]); echo str_repeat("&nbsp;", 1); echo($row2[3]); echo str_repeat("&nbsp;", 15);?></strong><strong>
                            
                            <a href="profileteacher.php?sid=<?php echo $rowinterested[0];?>&date=<?php echo $rowpost[0];?>" style ="font-size:16px; color: #4CAF50;" ><?php echo($rowinterested[0]);?></a>
                            
                        </strong></h4>
                        
                        <?php 
                            }
                        ?>
                        
                    </div>
                </div>
                
                <?php
                    } //while
                ?> 
                
		    </div>
            
<!--            prending tuition-->
            
            <div class="col-md-6">
                    <h3 style="color: #333; font-size:24px;text-align:center;"><strong>Confirmed Tuitions</strong></h3>
                
                
                <?php
                    
                    $sqlpost1="SELECT * FROM post WHERE Person_ID = '$id' AND result = 'prending'";
                    $resultpost1 = mysqli_query($db,$sqlpost1);
                
                    while($rowpost1=mysqli_fetch_array($resultpost1)){
                        // je post kortese tar info
                        
                        $sql11="SELECT * FROM person where Person_ID = '$rowpost1[1]'";
                        $result11 = mysqli_query($db,$sql11);
                        $row11=mysqli_fetch_array($result11);
                        
                        
                ?>
                
                <div class="row">
                    <div style = "background-color: #ffffff;
                                  width: 570px;
                                  padding: 45px;">
                        
                        
<!--                    <h4 style="color: #000; margin-bottom: 1px;font-size:20px;"><strong>Find Tutor</strong></h4>-->
                        
                    <h6 style="margin-top: 0px; margin-bottom: 5px; font-size:12px; text-align: right"><p>Posted on <?php echo date('jS F, Y', strtotime($rowpost1[0]));  ?></p></h6>
                        
                        
                     <div class="row" style = "margin-top: 5px; margin-bottom: 1px;">
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Department :</strong><span style="color: #333;"> <?php  echo ($row11[9]); ?></span></h6>
                         </div>
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Student Gender : </strong><span style="color: #333;"><?php  echo ($row11[5]); ?></span></h6>
                         </div>
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px; font-size:13px;"><strong>Tuion Type : </strong><span style="color: #333;"><?php  echo ($rowpost1[2]); ?></span></h6>
                         </div>
                     </div>
                    
                        <h6 style="color: #ef801a; margin-top: 25px; margin-bottom: 0px; font-size:13px;"><p><strong>Topic Description : </strong><span style="color: #333;"><?php  echo ($rowpost1[8]); ?></span></p></h6>
                        
                        <h6 style="color: #ef801a;margin-top: 0px; margin-bottom: 3px; font-size:13px;"><strong>Salary : </strong><span style="color: #333;"><?php  echo ($rowpost1[6]); ?> TK</span></h6>
                        
                        <h6 style="color: #ef801a;margin-top: 0px; margin-bottom: 3px; font-size:13px;"><strong>Gender preference : </strong><span style="color: #333;"><?php  echo ($rowpost1[7]); ?></span></h6>
                        
                        
                        
                        <div class="row" style = "margin-top: 0px; margin-bottom: 1px;">
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Start Time :</strong><span style="color: #333;"><?php echo date("h:i A -  d M,Y", strtotime($rowpost1[3])); ?></span></h6>
                             </div>
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>End Time : </strong><span style="color: #333;"><?php echo date("h:i A - d M,Y", strtotime($rowpost1[4])); ?></span></h6>
                             </div>
                         </div>
                        
<!--                    interested code-->
                        
                        <h4 style="color: #ef801a; margin-bottom: 0px;margin-top: 20px; font-size:15px;"><strong>Selected Tutor : </strong></h4>
                        
                        <?php
                            $sql22="SELECT * FROM person where Person_ID = '$rowpost1[5]'";
                            $result22 = mysqli_query($db,$sql22);
                            $row22=mysqli_fetch_array($result22);
                        ?>
                        
                        
                        <h4 style="color: #333; margin-bottom: 1px;font-size:15px; text-align: right"><strong><?php echo($row22[2]); echo str_repeat("&nbsp;", 1); echo($row22[3]); echo str_repeat("&nbsp;", 15);?></strong><strong style ="font-size:16px; color: #4CAF50;">
                            
                            <?php echo($row22[0]);?>
                            
                        </strong></h4>
                        
                        
                        <form action="profile.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputdetails" style="color: #ef801a; font-size:15px;">Review</label>
                                <input type="text" class="form-control" id="exampleInputdetails" aria-describedby="emailHelp" placeholder="Review details ... " name="review" style="height: 130px;">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" style="color: #ef801a; font-size:15px;">Overall Rating</label>
                                <select class="form-control" id="exampleFormControlSelect1" name = "rating">
                                <option value = "" style="color: #ef801a; font-size:15px;">-- Select One --</option>
                                <option value = "0">0/10</option>
                                <option value = "1">1/10</option>
                                <option value = "2">2/10</option>
                                <option value = "3">3/10</option>
                                <option value = "4">4/10</option>
                                <option value = "5">5/10</option>
                                <option value = "6">6/10</option>
                                <option value = "7">7/10</option>
                                <option value = "8">8/10</option>
                                <option value = "9">9/10</option>
                                <option value = "10">10/10</option>
                              </select>
                            </div>
                            
                            <button type="submit" class="btn btn-success pull-right" name = "cpost", style = "background-color: #4CAF50; border: none; font-size: 13px;padding: 5px 7px;">Submit</button>
                            
                        </form>
                        
                    </div>
                    <?php
                        
                        if(isset($_POST['cpost'])){
    
                            $review = mysqli_real_escape_string($db,$_POST['review']);
                            $rating = mysqli_real_escape_string($db,$_POST['rating']);



                            if(empty($rating)){
                                array_push($errors,"Rating required");
                            }
                            if(empty($review)){
                                $review = "";
                            }
                            
                            $sql_postnew0 = "UPDATE post SET rating = '$rating', review = '$review', result = 'completed' WHERE Date_Time = '$rowpost1[0]' AND Person_ID = '$rowpost1[1]'";
                            mysqli_query($db,$sql_postnew0);
                            
                            
                            
                            //calculating rating
                            $s0="SELECT SUM(rating), COUNT(*) FROM post
                            WHERE Person_ID = '$rowpost1[1]' AND result = 'completed'";
                            $res0 = mysqli_query($db,$s0);
                            $r0=mysqli_fetch_array($res0);
                            
                            $avg = ($r0[0]+$rating)/($r0[1]+1);
                            
                            
                            $bal1 = $row11[6] - $rowpost1[6];
                            $bal2 = $row22[6] + $rowpost1[6];
                            
                            
                            $sql_postnew1 = "UPDATE person SET Balance = '$bal1' WHERE Person_ID = '$row11[0]'";
                            mysqli_query($db,$sql_postnew1);
                            
                            
                            $sql_postnew2 = "UPDATE person SET Balance = '$bal2', T_R = '$avg' WHERE Person_ID = '$row22[0]'";
                            mysqli_query($db,$sql_postnew2);
                            
                        }    
                        
                    ?>
                </div>
                
                <?php
                    } //while
                ?> 
                
		    </div>
            
            
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        <!--        second section-->
        <section id="call-to-action-21">
	   </section>
        
        <div class="row">
            <div class="col-md-6">
                    <h3 style="color: #333; font-size:24px;text-align:center;"><strong>As a Tutor</strong></h3>
                
                
                <?php
                    
                    $sqlpost2="SELECT * FROM post WHERE Selected_Person_ID = '$id' AND result = 'prending'";
                    $resultpost2 = mysqli_query($db,$sqlpost2);
                
                    while($rowpost2=mysqli_fetch_array($resultpost2)){
                        // je post kortese tar info
                        
                        $sql12="SELECT * FROM person where Person_ID = '$rowpost2[1]'";
                        $result12 = mysqli_query($db,$sql12);
                        $row12=mysqli_fetch_array($result12);
                        
                        
                ?>
                
                <div class="row" >
                    <div style = "background-color: #ffffff;
                                  width: 570px;
                                  padding: 45px;">
                        
                        
                    <h6 style="margin-top: 0px; margin-bottom: 5px; font-size:12px; text-align: center"><p>Posted on <?php echo date('jS F, Y', strtotime($rowpost2[0]));  ?></p></h6>
                        
                        
                     <div class="row" style = "margin-top: 5px; margin-bottom: 1px;">
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Department :</strong><span style="color: #333;"> <?php  echo ($row12[9]); ?></span></h6>
                         </div>
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Student Gender : </strong><span style="color: #333;"><?php  echo ($row12[5]); ?></span></h6>
                         </div>
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px; font-size:13px;"><strong>Tuion Type : </strong><span style="color: #333;"><?php  echo ($rowpost2[2]); ?></span></h6>
                         </div>
                     </div>
                    
                        <h6 style="color: #ef801a; margin-top: 25px; margin-bottom: 0px; font-size:13px;"><p><strong>Topic Description : </strong><span style="color: #333;"><?php  echo ($rowpost2[8]); ?></span></p></h6>
                        
                        <h6 style="color: #ef801a;margin-top: 0px; margin-bottom: 3px; font-size:13px;"><strong>Salary : </strong><span style="color: #333;"><?php  echo ($rowpost2[6]); ?> TK</span></h6>
                        
                        
                        
                        <div class="row" style = "margin-top: 0px; margin-bottom: 1px;">
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Start Time :</strong><span style="color: #333;"><?php echo date("h:i A -  d M,Y", strtotime($rowpost2[3])); ?></span></h6>
                             </div>
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>End Time : </strong><span style="color: #333;"><?php echo date("h:i A - d M,Y", strtotime($rowpost2[4])); ?></span></h6>
                             </div>
                         </div>
                        
<!--                    interested code-->
                        
                        <h4 style="color: #ef801a; margin-bottom: 0px;margin-top: 20px; font-size:15px;"><strong>Student : </strong></h4>
                        
                        <?php
                            $sql23="SELECT * FROM person where Person_ID = '$rowpost2[1]'";
                            $result23 = mysqli_query($db,$sql23);
                            $row23=mysqli_fetch_array($result23);
                        ?>
                        
                        
                        <h4 style="color: #333; margin-bottom: 1px;font-size:15px; text-align: right"><strong><?php echo '<a href="profile.php"><img style = "vertical-align: middle;
                                  width: 50px;
                                  height: 50px;
                                  border-radius: 50%; margin-top: 7px;" src="data:image;base64,'.$row23[4].'"/></a>'; echo str_repeat("&nbsp;", 7);?><?php echo($row23[2]); echo str_repeat("&nbsp;", 1); echo($row23[3]); echo str_repeat("&nbsp;", 15);?></strong><strong style ="font-size:16px; color: #4CAF50;">
                            
                            <?php echo($row23[0]);?>
                            
                        </strong></h4>
                        
                    </div>
                </div>
                </div>
                
                <?php
                    } //while
                ?> 
        </div>
        
        
        
        
        
        
        
        
        
        
        
            
	</div>
		
    </section>
    
    
    
    
    
    
    
    
					
					
<!--akhane footer add korte hobe-->
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Free Time Tutoring</h5>
                    <address>
                  <strong>United International University</strong><br>
                  100 feet road , Madani evenue<br>
                   Vatara thana , Dhaka 1212</address>
                  <p>
                    <i class="icon-phone"></i> Phone : +8801683-101010<br>
                    <i class="icon-envelope-alt"></i> email: fttutor@gmail.com
                  </p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Quick Links</h5>
                    <ul class="link-list">
                        <li><a href="http://www.uiu.ac.bd/?post_type=event">Latest Events</a></li>
                        <li><a href="http://www.uiu.ac.bd/contact-us/">Terms and conditions</a></li>
                        <li><a href="http://www.uiu.ac.bd/contact-us/">Privacy policy</a></li>
                        <li><a href="http://www.uiu.ac.bd/offices/career-counseling-center/">Career</a></li>
                        <li><a href="http://www.uiu.ac.bd/">Contact us</a></li> 
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">About UIU</h5>
                    <ul class="link-list">
                        <li><a href="http://www.uiu.ac.bd/about-uiu/">Know about United International University</a></li>
                        <li><a href="http://www.uiu.ac.bd/authorities/">Authoritires</a></li>
                        <li><a href="http://www.uiu.ac.bd/academic/">Academics</a></li>
                        <li><a href="http://www.uiu.ac.bd/research/">Research</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                    <div class="widget">
                    <h5 class="widgetheading">Recent News</h5>
                    <ul class="link-list">
                        <li><a href="http://www.uiu.ac.bd/notices/">Latest Notice of UIU</a></li>
                        <li><a href="http://www.uiu.ac.bd/why-uiu/">Why UIU</a></li>
                        <li><a href="https://www.facebook.com/groups/www.UNB/">UIU News Box</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; United International University Copyright © 2003-2019 All right reserverd <br/></span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        <li><a href="https://www.facebook.com/uiuinfo" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/uiuedu" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/school/united-international-university/" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="https://plus.google.com/u/0/+unitedinternationaluniversityuiudhaka" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>  
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>