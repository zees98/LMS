

<?php

if (isset($_POST["func"])) {
    $func = $_POST["func"];
    $conn = $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );
    if ($conn) {
        if ($func == "users") {
            chartData($conn);
        } else if ($func == "categories") {
            categoriesData($conn);
        }
        $conn->close();
    }
} else
    echo "func not set";

function chartData($conn)
{
    $query = "SELECT year,  count(year) as users        FROM            (SELECT                 YEAR(join_date) AS year            FROM                hariscorp_zfhlibrary.Member) S         Group by year;";
    $exec_query = mysqli_query($conn, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($exec_query)) {
        $data[] = $row;
    }
    $json_data =  json_encode($data);
    echo $json_data;
}
function categoriesData($conn)
{
    $query = "
    SELECT 
        Category.cat_id,cat_name, COUNT(S.cat_id) as count
    FROM
        Category
            LEFT OUTER JOIN
        (SELECT 
            cat_id
        FROM
            hariscorp_zfhlibrary.Issue
        NATURAL JOIN Book) S 
    ON S.cat_id = Category.cat_id
    GROUP BY Category.cat_id;";

    $query_res = mysqli_query($conn, $query);

    $data = array();

    while ($row = mysqli_fetch_assoc($query_res)) {
        $data[] = $row;
    }
    echo json_encode($data);
}


?>