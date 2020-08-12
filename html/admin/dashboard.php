<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
    header("Location: admin_login.html");
} else {
    $name = $_SESSION["admin_name"];
    $img = $_SESSION["admin_img"];

    $user_count = 0;
    $books_count = 0;
    $pending_books = 0;

    $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );

    if ($conn) {
        $user_query = "SELECT count(id) as users FROM hariscorp_zfhlibrary.Member;";
        $book_query = "SELECT count(book_id) FROM hariscorp_zfhlibrary.Book;";
        $pending_books_query = "SELECT count(issue_id) FROM hariscorp_zfhlibrary.Issue where return_date is null;";

        $user_res =  mysqli_query($conn, $user_query);
        $book_res = mysqli_query($conn, $book_query);
        $pending_res = mysqli_query($conn, $pending_books_query);

        $user_data = mysqli_fetch_row($user_res);
        $book_data = mysqli_fetch_row($book_res);
        $pending_data = mysqli_fetch_row($pending_res);


        $activityTable = "SELECT user_id, concat(concat (firstname,' ' ),lastname) as name, activity, date FROM Member inner join hariscorp_zfhlibrary.activity on(user_id = Member.id);";
        $exec_query = mysqli_query($conn, $activityTable);
    }

    // Log out admin
    if (isset($_POST["signout"])) {
        session_destroy();
        session_unset();
        header("Location: admin_login.html");
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/admin/index.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
    <script src="../../js/admin/graph.js"></script>
    <link rel="stylesheet" href="../../css/admin/dashboard.css">
</head>


<body>

    <div class="container-fluid">
        <div class="row" id="sidemenu">
            <div id="leftNav" class="col-lg-2 col-md-3 bg-dark text-info">
                <div id="tag" class="row p-4 my-auto">
                    <img id="admin_img" class="col-md-4 mx-auto" src=<?php echo "../../assets/$img" ?> alt="" width="100%">
                    <h5 id="admin_name" class="col-md-8 my-auto">
                        <?php
                        echo $name;
                        ?>
                    </h5>

                </div>
                <h4 class="mt-3 text-light">Admin Panel</h4>
                <ul class="sideNav mb-auto">
                    <li>
                        <i class="fa fa-dashboard"></i>
                        <a href="dashboard.php"> Dashboard </a>
                    </li>
                    <li class="subMenu">
                        <i class="fa fa-clipboard"></i> <a href="Manage.php">Manage</a>
                    </li>
                    <div id="subMenuItems">
                        <li>
                            <i class="fa fa-book"></i> Manage Books
                        </li>
                        <li>
                            <i class="fa fa-user"></i> Manage Members
                        </li>

                    </div>
                    <li>
                        <i class="fa fa-cart-plus"></i> Catalogue
                    </li>
                    <li>
                        <i class="fa fa-gear"></i> Settings
                    </li>
                </ul>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row">
                        <div id="buttons">
                            <button name="signout" class="btn btn-dark m-2">
                                <i class="fa fa-sign-out"></i>
                                Sign Out
                            </button>
                            <button name="login" class="btn btn-dark m-2">
                                <i class="fa fa-sign-in"></i>
                                Log In as Member
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-2 col-md-3"></div>
            <div id="right" class="col-lg-10 col-md-9 p-3">
                <div class="row px-3 ">
                    <h1 class="mr-auto mt-auto">Dashboard</h1>
                    <img id="logo" src="../../assets/freeLogo.jpeg" width="10%">
                </div>

                <div id="statsCards" class="row m-5">
                    <div class="col-3">
                        <div class="row">
                            <div class="col-8">
                                <h5>Users</h5>
                                <h3>
                                    <?php

                                    echo $user_data[0];

                                    ?>
                                </h3>
                            </div>
                            <div class="col-4 m-auto">
                                <img src="../../assets/Icons/read.png" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-8">
                                <h5>Total Books</h5>
                                <h3>
                                    <?php

                                    echo $book_data[0];

                                    ?>
                                </h3>
                            </div>
                            <div class="col-4 m-auto">
                                <img src="../../assets/Icons/book.png" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-8">
                                <h5>Pending Returns</h5>
                                <h3>
                                    <?php

                                    echo $pending_data[0];

                                    ?>
                                </h3>
                            </div>
                            <div class="col-4 m-auto">
                                <img src="../../assets/Icons/time-and-date.png" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                </div>

                <h1>Statistics</h1>
                <div class="row my-5">

                    <div class="col-md-5 graph ">
                        <h3>Users</h3>
                        <div class="row"><canvas id="newUsers" height="70%" class="mt-3">

                            </canvas> </div>
                    </div>
                    <div class="col-md-5 graph ">
                        <h3>Popular Categories</h3>
                        <div id="column2" class="row my-auto">

                            <div id="categories" class="col-md-6 my-auto"></div>

                            <div id="column2" class="col-md-6">
                                <canvas id="pie" class="" height="150%">

                                </canvas>
                            </div>
                        </div>
                    </div>

                </div>

                <h1>Recent Activity</h1>
                <div class="activityTable">
                    <table class="table">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Activity</th>
                        <th>Date</th>

                        <?php

                        while ($row = mysqli_fetch_assoc($exec_query)) {
                            echo "<tr>";
                            echo  "<td>" . $row["user_id"] . "</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["activity"]."</td>";
                            echo "<td>".$row["date"]."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>

    </div>




</body>

</html>