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

$queryInsertUser = "select title, cat_name, name, due_date, return_date FROM `Issue` join Book join book_category join Category join Publisher where Book.book_id = Issue.book_id and Book.book_id = book_category.book_id and Book.pub_id = Publisher.pub_id and Category.cat_id = book_category.cat_id and mem_id = 5";

$result = mysqli_query($conn, $queryInsertUser);

$data = array();

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);
$conn -> close();

?>
