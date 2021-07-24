<?php
$errors = array();
    //connection to database
$db = mysqli_connect('localhost','root','','freetimetutoring');
$curdate = date("Y-m-d H:i:s");

//if button click
if(isset($_POST['register'])){
    
    $fname = mysqli_real_escape_string($db,$_POST['firstname']);
    $lname = mysqli_real_escape_string($db,$_POST['lastname']);
    $id = mysqli_real_escape_string($db,$_POST['id']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $pass = mysqli_real_escape_string($db,$_POST['password']);
    $pass1 = mysqli_real_escape_string($db,$_POST['password1']);
    $gender = mysqli_real_escape_string($db,$_POST['gender']);
    $dept = mysqli_real_escape_string($db,$_POST['dept']);
    
    //check all fields fill
    
    //image start
    if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
    {
        array_push($errors,"Select DP");
    }
    // image end
    
    if(empty($fname)){
        array_push($errors,"First Name required");
    }
    if(empty($lname)){
        array_push($errors,"Last Name required");
    }
    if(empty($id)){
        array_push($errors,"ID required");
    }
    if(empty($email)){
        array_push($errors,"Email required");
    }
    if(empty($phone)){
        array_push($errors,"Phone required");
    }
    if($pass != $pass1){
        array_push($errors,"Password not match");
    }
    if($gender == ""){
        array_push($errors,"Gender required");
    }
    if($dept == ""){
        array_push($errors,"Department required");
    }
    if(!((substr($id,0,3) == "011" && $dept == "CSE") || (substr($id,0,3) == "021" && $dept == "EEE") || (substr($id,0,3) == "111" && $dept == "BBA") || (substr($id,0,3) == "121" && $dept == "ECO"))){
        array_push($errors,"Department and ID not matched");
    }
    
    if(count($errors) == 0){
        
        $image = addslashes($_FILES['image']['tmp_name']);
        $iname = addslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        
        $sql = "INSERT INTO person (Person_ID,Email,First_Name,Last_Name,Phone_NB,password, Start_Date, Balance, gender, image, Department_ID) VALUES ('$id','$email','$fname','$lname','$phone','$pass', '$curdate', '0.0', '$gender', '$image', '$dept')";
        
        mysqli_query($db,$sql);
        header("Location: login.php");
    }
}


?>