<?php

$bookID = $_POST['book_id'];


$conn = mysqli_connect(
    "68.183.162.131",
    "hariscorp_hariscorp",
    "kdw{koz4]c[%",
    "hariscorp_zfhlibrary",
    3306
);

if ($conn) {
    $del_query = "Delete from Book where book_id = '{$bookID}'";
    $res = mysqli_query($conn, $del_query);
    if($res)
        echo "Success";
    else 
        echo "Failed";
}
