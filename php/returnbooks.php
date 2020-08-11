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

     $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );
    if ($conn) {
        $return_query = "UPDATE Issue SET return_date = CURRENT_DATE where book_id = '{$id}'";
        $activity = "INSERT INTO `activity` (`id`, `user_id`, `activity`, `date`) VALUES (NULL, $i, 'Returned Book', CURRENT_DATE)";
        $result = mysqli_query($conn, $return_query);
        $result1 = mysqli_query($conn, $activity);
        if($result)
            echo "Success";
        else 
            echo "Failed";
    }
    else{
        echo "connection failed";
    }
 }
 else{
     echo "isset failed";
 }

?>