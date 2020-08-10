<?php
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

$queryInsertUser = "select title, cat_name, name, due_date, return_date FROM `Issue` natural join Book natural join Category natural join Publisher where mem_id = 5 and return_date = 'Null'";

$result = mysqli_query($conn, $queryInsertUser);

$data = array();

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
$conn -> close();

?>
