<?php


//  session_start();
// if (!isset($_SESSION["member_id"])) {
//     header("Location: login.html");
// } else {
//     $id = $_SESSION["member_id"];
//     $fname = $_SESSION["first_name"];
//     $lname  = $_SESSION["last_name"]; 
//     $img= $_SESSION["member_img"] ;
// } 


$id=7;

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
$select_query="select activity, date from `activity` where id={$id}";

$result = mysqli_query($conn, $select_query);

$data = array();

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
$conn -> close();

?>