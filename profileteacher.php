<?php
	session_start();
    //DB Connection
    $db = mysqli_connect("localhost","root","","freetimetutoring");

    $id=$_SESSION['userid'];
    $tid=$_GET['sid']; // teacher er id
    $date=$_GET['date'];

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
				<h2 class="pageTitle" style = "font-size:40px;">Teacher's Profile</h2>
			</div>
		</div>
	</div>
	</section>
    
    
    

    
    
    
    
    
    
    
	<section id="content">
		<div class="container content">

        <!-- End Info Blcoks -->
            
        <?php 
           
            $sqlt="SELECT * FROM person WHERE Person_ID='$tid'";
            $resultt = mysqli_query($db,$sqlt);
            $rowt=mysqli_fetch_array($resultt);
            
        ?>
        
        <div class="row service-v1 margin-bottom-40">
            <div class="col-md-4 md-margin-bottom-40">
<!--               <img class="img-responsive" src="img/service1.jpg" alt="">       -->
                <?php  echo '<img style = "
                                width: 400px;
                                height: 300px;
                                margin-top: 7px;" src="data:image;base64,'.$rowt[4].'"/>';
                ?>
            </div>
        </div>
        <!-- End Service Blcoks -->
        
            <h3 style="text-transform: uppercase;color: #333; font-size:27px;"><strong><?php  echo ($rowt[2]); echo str_repeat("&nbsp;", 1); echo ($rowt[3]);?></strong></h3>
            
            <h6 style="color: #ef801a; margin-top: 10px; margin-bottom: 5px; font-size:20px;"><p><strong>ID : </strong><span style="color: #333;"><?php  echo ($rowt[0]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>EMAIL : </strong><span style="color: #333;"><?php  echo ($rowt[1]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>PHONE NUMBER : </strong><span style="color: #333;"><?php  echo ($rowt[8]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>DEPARTMENT : </strong><span style="color: #333;"><?php  echo ($rowt[9]); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>START DATE : </strong><span style="color: #333;"><?php  echo date('jS F, Y', strtotime($rowt[7])); ?></span></p></h6>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>TUTOOR RATING : </strong><span style="color: #333;"><?php  echo ($rowt[13]); ?></span></p></h6>
            
            <?php 
            $string = "completed";
            $sqlcount="SELECT COUNT(*) FROM post WHERE Person_ID = '$tid' AND result = '$string'";
            $resultcount = mysqli_query($db,$sqlcount);
            $rowcount=mysqli_fetch_array($resultcount);
            ?>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>TAKEN TUITION COUNT : </strong><span style="color: #333;"><?php  echo ($rowcount[0]); ?></span></p></h6>
            
            <?php 
            $string1 = "completed";
            $sqlcount1="SELECT COUNT(*) FROM post WHERE Selected_Person_ID = '$tid' AND result = '$string1'";
            $resultcount1 = mysqli_query($db,$sqlcount1);
            $rowcount1=mysqli_fetch_array($resultcount1);
            ?>
            
            <h6 style="color: #ef801a; margin-top: 5px; margin-bottom: 5px; font-size:20px;"><p><strong>GIVEN TUITION COUNT : </strong><span style="color: #333;"><?php  echo ($rowcount1[0]); ?></span></p></h6>
            
            
        
            <?php 
            
            
        ?>
            
        <div class="container" >
		<div class="row">
			<div class="col-lg-4">
                <div class="row">
				<form action="#" method="post">
                    <button type="submit" class="btn btn-success pull-right" name = "cpost", style = "background-color: #4CAF50; border: none; font-size: 20px;padding: 10px 15px;">Appoint</button>
                </form>
			</div>
            </div>
            
            
            <?php
                if(isset($_POST['cpost'])){
                    $sql_interested = "UPDATE post SET Selected_Person_ID = '$tid', result = 'prending' WHERE Date_Time = '$date' AND Person_ID = '$id'";
                    mysqli_query($db,$sql_interested);
                }
            ?>
            
            
            
            
		</div>
        <div class="row" style="height: 10px">
        </div>
	   </div>
            
            
    </div>
    </section>
    
    <section id="call-to-action-21">
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