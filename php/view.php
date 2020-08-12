<?php

session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: login.html");
} else {
    $i = $_SESSION["member_id"];
    $fname = $_SESSION["first_name"];
    $lname  = $_SESSION["last_name"]; 
    $img= $_SESSION["member_img"] ;
}

 if(isset($_POST['id'])){
     $id=$_POST['id'];
     echo "$id";
     $_SESSION["BookId"] = $id;
     $_SESSION["bookID"] = $id;
 }
 else{
     echo "isset failed";
 }

?>