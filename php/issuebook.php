<?php

session_start();
if (!isset($_SESSION["member_id"])) {
    header("Location: logIn.html");
} else {
    $book_id = $_SESSION["bookID"];
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
$select_query="select title, author from `Book` where book_id={$book_id}";

$result = mysqli_query($conn, $select_query);

$data = array();

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
$conn -> close();

?>