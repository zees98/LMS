

<?php

$conn = $conn = mysqli_connect(
    "68.183.162.131",
    "hariscorp_hariscorp",
    "kdw{koz4]c[%",
    "hariscorp_zfhlibrary",
    3306
);
if ($conn) {

    $query = "
        SELECT 
            year,  count(year) as users
        FROM
            (SELECT 
                YEAR(join_date) AS year
            FROM
                hariscorp_zfhlibrary.Member) S
            Group by year
        ;";
    $exec_query = mysqli_query($conn, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($exec_query)) {
        $data[] = $row;
    }
    $json_data =  json_encode($data);
    echo $json_data;
}



?>