<?php

session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: logIn.html");
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

$queryInsertUser = "select Book.book_id,title, cat_name, name, issue_date,due_date, return_date FROM `Issue` natural join Book natural join Category natural join Publisher where mem_id = $id and return_date is not Null";

$result = mysqli_query($conn, $queryInsertUser);

$data = array();

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
$conn -> close();

?>
