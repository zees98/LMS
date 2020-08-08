<?php
session_start();
if (!isset($_SESSION["admin_name"])) {
    header("Location: admin_login.html");
} else {
    $name = $_SESSION["admin_name"];
    $img = $_SESSION["admin_img"];
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
    <style>
        html,
        body {
            background-color: azure;
            height: 100%;
        }

        .container-fluid {
            height: 100%;
        }

        #sidemenu.row {
            height: 100%;
        }

        #tag {
            background-color: black;
        }

        ul {
            list-style-type: none;
        }

        ul.sideNav {
            margin-top: 25%;
        }

        .sideNav li {
            position: relative;
            z-index: 0;
            padding: 10% 0;
            transition: linear 200ms;
        }

        .sideNav li:hover {
            margin: 5% 0;
            padding: 6%;
            box-shadow: 0 0 20px rgba(150, 150, 150, 0.5);
            z-index: 100;
        }

        #subMenuItems {
            background-color: black;
            padding: 6%;
        }

        #buttons {
            position: absolute;
            bottom: 0;
        }

        #statsCards div.col-3 {
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 30px rgba(150, 150, 150, 0.5);
            border-radius: 20px;
        }

        .graph {
            margin: auto;
            box-shadow: 0 0 30px rgba(150, 150, 150, 0.5);
            border-radius: 20px;
        }

        #logo {
            animation: rotateAnim 10s linear infinite;
        }

        @keyframes rotateAnim {
            0% {
                transform: rotateY(0);
            }

            50% {
                transform: rotateY(360deg);
            }

            100% {
                transform: rotateY(0deg);
            }
        }

        #leftNav {
            position: fixed;
            top: 0px;
            left: 0px;
            bottom: 0px;
            z-index: 2;
        }

        a {
            color: white;
        }
        #admin_name {
            font-size: 0.8rem;
        }
        #admin_img {
            border-radius: 100%;
        }
       
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row" id="sidemenu">
            <div id="leftNav" class="col-lg-2 col-md-3 bg-dark text-info">
                <div id="tag" class="row p-4 my-auto">
                    <img id = "admin_img" class="col-md-4 mx-auto" src=<?php echo "../../assets/$img" ?> alt="" width="100%">
                    <h5 id= "admin_name" class="col-md-8 my-auto">
                        <?php
                        echo $name;
                        ?>
                    </h5>

                </div>
                <h4 class="mt-3 text-light">Admin Panel</h4>
                <ul class="sideNav mb-auto">
                    <li>
                        <i class="fa fa-dashboard"></i>
                        <a href="dashboard.html"> Dashboard </a>
                    </li>
                    <li class="subMenu">
                        <i class="fa fa-clipboard"></i> <a href="Manage.html">Manage</a>
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
                <div class="row">
                    <div id="buttons">
                        <button class="btn btn-dark m-2">
                            <i class="fa fa-sign-out"></i>
                            Sign Out
                        </button>
                        <button class="btn btn-dark m-2">
                            <i class="fa fa-sign-in"></i>
                            Log In as Member
                        </button>
                    </div>
                </div>

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
                                <h5>New Users</h5>
                                <h3>500</h3>
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
                                <h3>250</h3>
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
                                <h3>53</h3>
                            </div>
                            <div class="col-4 m-auto">
                                <img src="../../assets/Icons/time-and-date.png" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                </div>

                <h1>Statistics</h1>
                <div class="row my-5">
                    <div class="col-md-4 graph">
                        <canvas id="newUsers" height="150%">

                        </canvas>
                    </div>
                    <div class="col-md-4 graph">
                        <canvas id="categories" height="150%">

                        </canvas>
                    </div>

                </div>

                <h1>Recent Activity</h1>
                <div class="activityTable">
                    <table class="table">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Activity</th>
                        <th>Date</th>


                        <tr>
                            <td>1</td>
                            <td>Zeeshan Ali</td>
                            <td>Created Account</td>
                            <td>7 Aug 2020</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Zeeshan Ali</td>
                            <td>Created Account</td>
                            <td>7 Aug 2020</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Zeeshan Ali</td>
                            <td>Created Account</td>
                            <td>7 Aug 2020</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Zeeshan Ali</td>
                            <td>Created Account</td>
                            <td>7 Aug 2020</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Zeeshan Ali</td>
                            <td>Created Account</td>
                            <td>7 Aug 2020</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Muhammad Fahad Bin Khalid</td>
                            <td>Issued A Book</td>
                            <td>5 Aug 2020</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Haseeb Arif</td>
                            <td>Membership Cancelled</td>
                            <td>5 Aug 2020</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Haseeb Arif</td>
                            <td>Membership Cancelled</td>
                            <td>5 Aug 2020</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Haseeb Arif</td>
                            <td>Membership Cancelled</td>
                            <td>5 Aug 2020</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

    </div>




</body>

</html>