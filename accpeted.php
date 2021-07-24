<?php
    session_start();
    $db = mysqli_connect("localhost","root","","freetimetutoring");
    
    $a=$_GET['id'];
    $b=$_GET['date'];
    $id=$_SESSION['userid'];

    $sql_interested = "UPDATE post
set Selected_Person_ID =  '$a' 
WHERE Date_Time = '$b' and Person_ID='$id';";
    mysqli_query($db,$sql_interested);
    header("Location: mypost.php");
    

    
?>