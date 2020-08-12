<?php

session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: login.html");
} else {
    $id = $_SESSION["member_id"];
    $fname = $_SESSION["first_name"];
    $lname  = $_SESSION["last_name"]; 
    $img= $_SESSION["member_img"] ;
}

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




$totalIssuedBooks = "select totalIssued, totalPastDue, totalReturn from (select COUNT(Book.book_id) as totalIssued FROM `Issue` natural join Book natural join Category natural join Publisher where mem_id = $id and return_date is Null) Issued join (SELECT COUNT(book_id) as totalPastDue FROM `Issue` WHERE mem_id = $id and return_date > due_date) as PastDue join (select count(Book.book_id) as totalReturn FROM `Issue` natural join Book natural join Category natural join Publisher WHERE mem_id = $id and return_date is not NULL) as returnBooks";
$result = mysqli_query($conn, $totalIssuedBooks);
$data = array();


while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
echo json_encode($data);
$conn -> close();


?>