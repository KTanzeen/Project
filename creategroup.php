<?php
	session_start();
    //DB Connection
    $db = mysqli_connect("localhost","root","","freetimetutoring");

    $id=$_SESSION['userid'];
    $sql="SELECT * FROM person WHERE Person_ID='$id'";
	$result = mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result);


    // variable
    $courseErr = $topicErr = $desErr = "";
    $courseID = $details = $payment = "";
	$curdate = date("Y-m-d H:i:s");


    if(isset($_POST['tuitionpost'])){
    
    $courseID = mysqli_real_escape_string($db,$_POST['courseID']);
    $details = mysqli_real_escape_string($db,$_POST['details']);
    $stime = mysqli_real_escape_string($db,$_POST['stime']);
    $etime = mysqli_real_escape_string($db,$_POST['etime']);
        
        
    
    if(empty($courseID)){
        array_push($errors,"Course Selection required");
    }
    if(empty($details)){
        array_push($errors,"Topic detail required");
    }
    if(empty($stime)){
        array_push($errors,"Start Time required");
    }
    if(empty($etime)){
        array_push($errors,"End Time required");
    }
        
    $sql_post = "INSERT INTO group_study(Person_ID, Scheduled_Start_Time, Course_ID, details, stime, etime, status) values('$id', '$curdate', '$courseID', '$details', '$stime', '$etime', 'uncompleted')";
        
    mysqli_query($db,$sql_post);
}


    

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
				<h2 class="pageTitle">Create Group Study</h2>
			</div>
		</div>
	</div>
	</section>

    
    <div class="container">
		<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
									<h3>Find suitable group to study accordingly to your need.</h3>
									<p>If you are looking for a tutor to help you in your studies then “Free time tutoring” is the perfect platform for you. Free time tutoring is giving you the opportunity to find quality tutors in budget on your own. To arrange a group study you simply have to do a registration first and click on the ‘find group study’ option or ‘create group study’ to create. Here you can post by filling necessary fields.</p>
                                    
								</div>  
							</div>
        </div>
	<div class="row">
        <div class="col-md-6">
								  	
		   <!-- Form itself -->
              <form action="creategroup.php" method="post">
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Course</label>
                      <select class="form-control" id="exampleFormControlSelect1" name = "courseID">
                          <option>--Select One--</option>
                          <?php
                            $sql1="SELECT * FROM course
                                WHERE Department_ID = '$row[9]'";
                            $result1 = mysqli_query($db,$sql1);
                            while($row1=mysqli_fetch_array($result1)){
                                    ?>
                                <option value = "<?php echo "$row1[0]";?>"><?php echo "$row1[0]"; echo str_repeat("&nbsp;", 7);  echo "$row1[1]"; ?></option>
                          
                          <?php
                            }
                          ?>
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputdetails">Topic and Details</label>
                    <input type="text" class="form-control" id="exampleInputdetails" aria-describedby="emailHelp" placeholder="Details about topic area and others ..." name="details" style="height: 130px;">
                  </div>
        
                  
                  <div class="form-group">
                        <label for="exampleFormControlSelect1">Enter Start Time:</label>
                        <input type="datetime-local" name="stime" placeholder="Enter End Date and time" required>
                            <br>

                        <label for="exampleFormControlSelect1">Enter Start Time:</label>
                        <input type="datetime-local" name="etime" placeholder="Enter End Date and time" required>
                        <button type="addtime" class="btn btn-primary" name = "TimeAdd" style="background-color: #0c4270; padding: 5px 5px;">+</button>
                  </div>
                  
                  <br>
                  <button type="submit" class="btn btn-primary" name = "tuitionpost">Create Post</button>
                  <br>
                  
                  
                  
              </form>
        </div>
        
        <div class="col-md-4">
                <div class="block-heading-two">
                                    <h3><span>Help Desk</span></h3>
                </div>      
                                <!-- Accordion starts -->
                <div class="panel-group" id="accordion-alt3">
                                 <!-- Panel. Use "panel-XXX" class for different colors. Replace "XXX" with color. -->
                <div class="panel"> 
                                <!-- Panel heading -->
                <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3">
                                            <i class="fa fa-angle-right"></i>How much people can join group study?
                                          </a>
                                        </h4>
                                     </div>
                                     <div id="collapseOne-alt3" class="panel-collapse collapse">
                                        <!-- Panel body -->
                                        <div class="panel-body">
                                          Many as you can. 
                                        </div>
                                     </div>
                                  </div>
                                  <div class="panel">
                                     <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseTwo-alt3">
                                            <i class="fa fa-angle-right"></i>2. What you need to add on the description ?
                                          </a>
                                        </h4>
                                     </div>
                                     <div id="collapseTwo-alt3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          The place and the required things your groupmates  need to know. 
                                        </div>
                                     </div>
                                  </div>
                                  <div class="panel">
                                     <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseThree-alt3">
                                            <i class="fa fa-angle-right"></i>3.  Can I schedule ask for a tutor in group study ?
                                          </a>
                                        </h4>
                                     </div>
                                     <div id="collapseThree-alt3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          Yes you can. Its optional and its your wish.sss
                                        </div>
                                     </div>
                                  </div>
                                  <div class="panel">
                                     <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseFour-alt3">
                                            <i class="fa fa-angle-right"></i>4.  Can i select the place of group study?
                                          </a>
                                        </h4>
                                     </div>
                                     <div id="collapseFour-alt3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          It is not must . But you can mention the place in the description.
                                        </div>
                                     </div>
                                  </div>
                                </div>
                                <!-- Accordion ends -->
                                
                            </div>





        
								
        </div>
	</div>
	
    
					
					
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