<?php


if (isset($_REQUEST["string"])) {
    $text =  $_REQUEST["string"];

    $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );
    // echo $text;

    // echo $results;
    if (strlen($text) > 0) {
        $query = "SELECT book_id, title FROM hariscorp_zfhlibrary.Book WHERE title LIKE '%$text%'";
        // echo $query;
        $results = mysqli_query($conn, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($results)) {
            $data[] = $row;
            // echo $row["title"];
        }
        $json = json_encode($data);


        echo $json;
    } 
    else {
        echo json_encode(array());
    }
} else {
    echo "failed";
}
