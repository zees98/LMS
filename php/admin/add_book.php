<?php

// $bookname = "test book";
// $bookAuthor = "test author";
// $date = "2000-01-01";
// $category = "Thriller";
// $summary = "A Great Test Book";

// $pub_name = "test_pub";
// $pub_address = "test_pub_address";

if (
    isset($_POST["bookname"]) &&
    isset($_POST["bookAuthor"]) &&
    isset($_POST["date"]) &&
    isset($_POST["category"]) &&
    isset($_POST["summary"]) &&
    isset($_POST["pub_name"]) &&
    isset($_POST["pub_address"])
) {
    $bookname = $_POST["bookname"];
    $bookAuthor = $_POST["bookAuthor"];
    $date = $_POST["date"];
    $category = $_POST["category"];
    $summary = $_POST["summary"];
    $pub_name = $_POST["pub_name"];
    $pub_address = $_POST["pub_address"];

    echo $bookname;


    $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );
    if ($conn) {
        // Gettting the select category ID
        $query = "SELECT cat_id FROM Category WHERE cat_name = '{$category}'";
        $cat_id_query = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $cat_id = "";
        while ($row = mysqli_fetch_array($cat_id_query)) {
            $cat_id = $row["cat_id"];
        }
        echo "<br>" . $cat_id;

        //Check if exists 
        $selectQuery =   "SELECT pub_id FROM Publisher WHERE `name` = '{$pub_name}'";
        $exec_select_query = mysqli_query($conn, $selectQuery);
        $pub_id =  "";
        if (mysqli_num_rows($exec_select_query) != 1) {
            $insertQuery = "INSERT INTO Publisher(name,address) VALUE ('{$pub_name}','{$pub_address}');";
            $exec_insert_query = mysqli_query($conn, $insertQuery) or die(mysqli_error($conn));
            $exec_select_query = mysqli_query($conn, $selectQuery);
        }

        while ($row = mysqli_fetch_array($exec_select_query)) {
            $pub_id =  $row["pub_id"];
        }


        $insert_book = "INSERT INTO `Book`(`title`, `summary`, `pub_year`, `author`, `pub_id`, `cat_id`) VALUES ('$bookname','$summary','$date','$bookAuthor','$pub_id', '$cat_id')";
        $exec_insert_book = mysqli_query($conn, $insert_book);
        $get_book_id = "Select book_id from Book order by book_id DESC LIMIT 1";
        $exec_book_id = mysqli_query($conn, $get_book_id);
        $book_id = "";
        while ($row = mysqli_fetch_array($exec_book_id)) {
            $book_id = $row["book_id"];
        }

        $conn->close();
        echo "success";
    } else
        echo "failed";
} else
    echo "ISSET FAILED";
