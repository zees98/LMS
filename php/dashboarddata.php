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




$totalIssuedBooks = "select totalIssued, totalPastDue from (select COUNT(Book.book_id) as totalIssued FROM `Issue` natural join Book natural join Category natural join Publisher where mem_id = 5) Issued join (SELECT COUNT(book_id) as totalPastDue FROM `Issue` WHERE return_date > CURRENT_DATE) as PastDue";
$result = mysqli_query($conn, $totalIssuedBooks);
$data = array();


while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
echo json_encode($data);
$conn -> close();


?>