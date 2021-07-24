<?php
	session_start();
    //DB Connection
    $db = mysqli_connect("localhost","root","","freetimetutoring");


    $id=$_SESSION['userid'];
    $sqlperson="SELECT * FROM person";
	$resultperson = mysqli_query($db,$sqlperson);
    $rowp=mysqli_fetch_array($resultperson);
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
                                  border-radius: 50%; margin-top: 7px;" src="data:image;base64,'.$rowp[4].'"/></a>';
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
				<h2 class="pageTitle"> Find Group Studies </h2>
			</div>
		</div>
	</div>
	</section>
    
    
    
    
    <section id="call-to-action-21", style="background-color: #f2f2f2;">
    <div class="container">
		<div class="row">
            <div class="col-md-6">
                <h3 style="text-transform: uppercase;"><strong>Posts For Group Study</strong></h3>
                
                
                
                <?php
                    
                    $sqlpost="SELECT * FROM group_study WHERE status = 'uncompleted'";
                    $resultpost = mysqli_query($db,$sqlpost);
                
                    while($row=mysqli_fetch_array($resultpost)){
                        // je post kortese tar info
                        
                        $sql1="SELECT * FROM person where Person_ID = '$row[0]'";
                        $result1 = mysqli_query($db,$sql1);
                        $row1=mysqli_fetch_array($result1);
                        
                        
                ?>
                
                <div class="row">
                    <div style = "background-color: #ffffff;
                                  width: 570px;
                                  padding: 45px;">
                        
                        
                    <h4 style="color: #000; margin-bottom: 1px;font-size:20px;"><strong><?php  echo ($row[0]); ?></strong></h4>
                        
                    <h6 style="margin-top: 0px; margin-bottom: 5px; font-size:12px; text-align: right"><p>Posted on <?php echo date('jS F, Y', strtotime($row[2]));  ?></p></h6>
                        
                        
                     <div class="row" style = "margin-top: 5px; margin-bottom: 1px;">
                         <div class="col-lg-4" style = "margin-bottom: 1px; margin-top: 1px;">
                             <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Department :</strong><span style="color: #333;"> <?php  echo ($row1[9]); ?></span></h6>
                         </div>
                     </div>
                    
                        <h6 style="color: #ef801a; margin-top: 25px; margin-bottom: 0px; font-size:13px;"><p><strong>Topic Description : </strong><span style="color: #333;"><?php  echo ($row[3]); ?></span></p></h6>
                        
                        
                        <div class="row" style = "margin-top: 0px; margin-bottom: 1px;">
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>Start Time :</strong><span style="color: #333;"><?php echo date("h:i A -  d M,Y", strtotime($row[4])); ?></span></h6>
                             </div>
                             <div class="col-lg-6" style = "margin-bottom: 1px; margin-top: 1px;">
                                 <h6 style="color: #ef801a; margin-top: 2px; margin-bottom: 1px;font-size:13px;"><strong>End Time : </strong><span style="color: #333;"><?php echo date("h:i A - d M,Y", strtotime($row[5])); ?></span></h6>
                             </div>
                         </div>
                        
                    
                        <h6 style="margin-top: 15px; margin-bottom: 3px; font-size:12px;"><p>Other Requirements - Interested persons are requested to enroll.</p></h6>
                        
                        
                        <!--                    interested code-->
                        
                        <h4 style="color: #ef801a; margin-bottom: 0px;margin-top: 20px; font-size:15px;"><strong>Interested Members : </strong></h4>
                        
                        <?php
                        
                            $sqlinterested="SELECT Interested_ID from group_study_interested WHERE Scheduled_Start_Time = '$row[2]' AND Person_ID ='$row[0]' ";
                            $resultinterested = mysqli_query($db,$sqlinterested);
                            while($rowinterested=mysqli_fetch_array($resultinterested)){
                                // je post kortese tar info
                                $sql2="SELECT * FROM person where Person_ID = '$rowinterested[0]'";
                                $result2 = mysqli_query($db,$sql2);
                                $row2=mysqli_fetch_array($result2);
                        ?>
                        
                        
                        <h4 style="color: #333; margin-bottom: 1px;font-size:15px; text-align: right"><strong><?php echo($row2[2]); echo str_repeat("&nbsp;", 1); echo($row2[3]); echo str_repeat("&nbsp;", 15);?></strong><strong>
                            
                            <a href="profilestudent.php?sid=<?php echo $rowinterested[0];?>" style ="font-size:16px; color: #4CAF50;" ><?php echo($rowinterested[0]);?></a>
                            
                        </strong></h4>
                        
                        <?php 
                            }
                        ?>
                        
                        <form action="findgroup.php" method="post">
                            <button type="submit" class="btn btn-success pull-right" name = "cpost", style = "background-color: #4CAF50; margin-top: 20px; border: none; font-size: 13px;padding: 5px 7px;">Enroll Now</button>
                        </form>
                        
                        <?php
                            if(isset($_POST['cpost'])){
                                
                                $sql_interested = "INSERT INTO group_study_interested(Person_ID, Scheduled_Start_Time, Interested_ID) values('$row[0]', '$row[2]', '$id')";
                                mysqli_query($db,$sql_interested);
                            }
                        ?>
                        
                    </div>
                </div>
                
                <?php
                    } //while
                ?>  
                
		    </div>
            
            
            
            
            <div class="col-md-6">
                <div class="row">
                    <h3 style="text-transform: uppercase;"><strong>Posts For Groupstudy</strong></h3>
                    <div style = "background-color: #ffffff;
                                  width: 570px;
                                  padding: 45px;">
                        <p>Monirul4</p>

                    </div>
                </div>
                
		    </div>
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
                            <span>&copy; United International University Copyright © 2003-2021 All right reserverd <br/></span>
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