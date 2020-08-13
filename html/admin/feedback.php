<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
    header("Location: admin_login.html");
} else {
    $name = $_SESSION["admin_name"];
    $img = $_SESSION["admin_img"];


    $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );

    if ($conn) {



        $feedbackTable = "SELECT 
        feedback_id, firstname, lastname, description, date
    FROM
        hariscorp_zfhlibrary.Member
        INNER JOIN Feedback on id = mem_id;";

        $exec_query = mysqli_query($conn, $feedbackTable);
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
    <link rel="icon" href="..\..\assets\Icons\icon.png">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../css/admin/dashboard.css">
    <style>
        #id {
            color: yellow;
        }

        table {
            padding: 2%;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(150, 150, 150, 0.5);
            margin-top: 2%;
        }

        button {
            margin-top: 2%;
            padding: 2%;

        }
    </style>

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
                        <a href="feedback.php"> <i class="fa fa-star"></i> Feedback</a>
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
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-2 col-md-3"></div>

            <div class="col-lg-10 col-md-9">
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h2 class="mr-auto font-weight-bold">User Feedback</h2>
                        </div>
                        <div class="col-md-1 ml-auto">
                            <img id="logo" class="ml-auto" src="../../assets/Icons/feedback.svg" width="100%">
                        </div>
                    </div>
                    <table class="table table-dark table-borderless">
                        <th><i class="fa fa-list" aria-hidden="true"> </i> Feedback ID</th>
                        <th><i class="fa fa-user-circle" aria-hidden="true"></i> First name</th>
                        <th><i class="fa fa-user-circle" aria-hidden="true"></i> Last name</th>
                        <th><i class="fa fa-paperclip" aria-hidden="true"></i> Description</th>

                        <?php

                        if (mysqli_num_rows($exec_query) > 0)
                            while ($row = mysqli_fetch_assoc($exec_query)) {
                                echo "<tr>";
                                echo "<td>{$row['feedback_id']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['description']}</td>";
                                echo "</tr>";
                            }
                        else

                            echo "<h2>No Feedbacks yet</h2>"

                        ?>

                    </table>
                    <div class="row table"> <button id="refresh" class="ml-auto btn btn-dark "><i class="fa fa-refresh"></i> Refresh</button></div>
                </div>
            </div>


        </div>

</body>
<script>
    var btn = document.getElementById("refresh");
    btn.addEventListener("click", function(e) {
        location.reload();
    });
</script>

</html>