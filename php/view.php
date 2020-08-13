<?php

session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: logIn.html");
} else {
    $i = $_SESSION["member_id"];
    $fname = $_SESSION["first_name"];
    $lname  = $_SESSION["last_name"]; 
    $img= $_SESSION["member_img"] ;
}

 if(isset($_POST['id'])){
     $id=$_POST['id'];
     $_SESSION["BookId"] = $id;
     $_SESSION["bookID"] = $id;
 }
 else{
    //  echo "isset failed";
 }

  $BOOK_ID = $_SESSION["BookId"];

 $conn = mysqli_connect(
    "68.183.162.131",
    "hariscorp_hariscorp",
    "kdw{koz4]c[%",
    "hariscorp_zfhlibrary",
    3306
);

    $query = "SELECT firstname,review_text,rating,date FROM hariscorp_zfhlibrary.Review  INNER JOIN Member on (mem_id = id) where book_id = '$BOOK_ID';";
    $res = mysqli_query($conn, $query);
    $data = array();
    while ($row2 = mysqli_fetch_assoc($res)) {
        $data[] = $row2;
    }
    echo json_encode($data);


?>