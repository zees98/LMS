<?php

$conn = mysqli_connect(
    "68.183.162.131",
    "hariscorp_hariscorp",
    "kdw{koz4]c[%",
    "hariscorp_zfhlibrary",
    3306
);

if (!isset($_POST["bookID"])) {
    getBooks($conn);
} else {
    if (!isset($_SESSION))
        session_start();
    $_SESSION["bookID"] = $_POST["bookID"];
    echo $_SESSION["bookID"];
}

function getBooks($conn)
{
    if ($conn) {


        $query = "SELECT book_id, title, pub_year, author, cat_name FROM (`Book` NATURAL join `Publisher`) Natural join Category";

        $res = mysqli_query($conn, $query);

        $data = array();

        while ($row = mysqli_fetch_array($res)) {
            $data[] = $row;
        }

        echo json_encode($data);
    }
}
