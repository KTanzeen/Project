<?php
    session_start();
    $db = mysqli_connect("localhost","root","","freetimetutoring");
    $a=$_GET['date'];
    $b=$_GET['id'];
    $id=$_SESSION['userid'];
    
    
    $sql_interested = "INSERT INTO Post_Interested_ID(Date_And_Time, Person_ID, Interested_ID) values('$a', '$b', '$id')";
    mysqli_query($db,$sql_interested);
    header("Location: index.php");
    

    
?>