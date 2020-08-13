<?php

session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: logIn.html");
} else {
    $id = $_SESSION["member_id"];
    $book_id = $_SESSION["bookID"];
}

$duedate = $_POST['duedate'];
$message="Book Issued";

$database =  "hariscorp_zfhlibrary";
$conn = mysqli_connect(
    // Hostname
    "68.183.162.131",
    // Username
    "hariscorp_hariscorp",
    // Password
    "kdw{koz4]c[%",
    // Database
    $database,
    // Port
    3306

);

$select_query= "Select * from `Issue` where mem_id={$id} and book_id={$book_id}";
$res=mysqli_query($conn, $select_query);
if($res){
    echo "Book is Already Issued!";
}
else{
$insert_query="INSERT INTO `Issue`(`mem_id`, `book_id`, `due_date`) VALUES ('$id','$book_id','$duedate')";

$result1 = mysqli_query($conn, $insert_query);

$insert2_query="INSERT INTO `activity`(`user_id`, `activity`) VALUES ('$id','$message')";

$result2 = mysqli_query($conn, $insert2_query);

if ($result1) {
    echo "Book Issued";
} else {
    echo "<br><br>Failed";
}
}
$conn -> close();


?>