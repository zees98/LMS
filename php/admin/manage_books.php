<?php 

    $conn = $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );

    if($conn) {

<<<<<<< HEAD

        $query = "SELECT book_id, title, pub_year, author, cat_name FROM (`Book` NATURAL join `Publisher`) Natural join Category";
=======
        echo "hello";
        $query = "SELECT book_id, title, pub_year, author, cat_name FROM (`Book` NATURAL join `Publisher`) Natural join (book_category natural join Category)";
>>>>>>> 65f3c11760f51c71a6ed1a766ce7603e90df4e5a

        $res = mysqli_query($conn, $query);

        $data = array();

        while($row = mysqli_fetch_assoc($res)){
            $data[] = $row;
        }

        echo json_encode($data);
    }


?>