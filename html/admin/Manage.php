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
    <title>Manage| Admin</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/admin/index.js"></script>
    <link rel="stylesheet" href="../../css/manage.css">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap" rel="stylesheet">
    <script src="../../js/manage.js"></script>
    <script src="../../js/admin/manage_books.js"></script>
    <link rel="stylesheet" href="../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../css/spinner.css">



</head>


<body>

    <div id="dlgbx" class="">
        <div id="dlgbxBody" class="">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="">Add A new Book</h1>
                    <hr>
                    <h3 class="mb-4">
                        Book Details
                    </h3>

                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-info">Name</h5>
                            <input type="text" class="form-control" name="book_title">
                        </div>
                        <div class="col-6">
                            <h5 class="text-info">Author</h5>
                            <input type="text" class="form-control" name="book_author">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-info">Date</h5>
                            <input type="date" class="form-control" pattern="[0-9]{4}" name="book_title">
                        </div>
                        <div class="col-6">
                            <h5 class="text-info">Category</h5>
                            <select name="category" class="form-control" id="">
                                <option value="Thriller">Thriller</option>
                                <option value="Action">Action</option>
                                <option value="Mystery">Mystery</option>

                            </select>
                        </div>
                    </div>
                    <hr>
                    <h3 class="mb-4">
                        Publisher details
                    </h3>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-info">Name</h5>
                            <input type="text" class="form-control" name="book_title">
                        </div>
                        <div class="col-6">
                            <h5 class="text-info">Author</h5>
                            <input type="text" class="form-control" name="book_author">
                        </div>
                    </div>
                    <div class="row">
                        <div class="buttons mx-1 ml-auto">
                            <button id="submit" class="btn btn-primary mr-2">Submit</button>
                            <button id="cancel" class="btn btn-btn-outline-primary">Cancel</button>
                        </div>
                    </div>
                </div>
                <div id="" class="col-md-4 m-auto">
                    <div id="camera-icon" class="m-auto text-center">
                        <i class="fa fa-camera "></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
                        <i class="fa fa-clipboard"></i> Manage
                    </li>
                    <div id="subMenuItems">
                        <li id="managebook">
                            <i class="fa fa-book"></i> Manage Books
                        </li>
                        <li id="manageuser">
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
                <div class="row">
                    <div class="col">
                        <br><br>
                        <div id="bookdiv">
                            <div id="booktablediv">
                                <h1 id="bookheading">Manage Books</h1>
                                <div class="row">
                                    <!-- <div class="col-lg-1"></div> -->
                                    <div class="col-lg-12">
                                        <br>
                                        <table class="table table-bordered table-hover" id="booktable">
                                            <thead>

                                                <th scope="col">Book ID</th>
                                                <th scope="col">Book Name</th>
                                                <th scope="col">Year Of Publication</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Book Category</th>
                                                <th scope="col">Action</th>

                                            </thead>
                                            <tbody id="manage-books-table-body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="spinner mx-auto"></div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-outline-dark ml-auto mr-3" id="addbutton">Add Book </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="userdiv">
                            <br><br>
                            <div id="usertablediv">
                                <h1 id="userheading">Manage Users</h1>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <br>
                                        <table class="table table-bordered table-hover" id="usertable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone no</th>
                                                    <th scope="col">Email Address</th>
                                                    <th scope="col">Gender</th>
                                                    <th scope="col">DOB</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>
                                                        <button class="btn"><i class="fa fa-trash" aria-hidden="true" id="trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>
                                                        <button class="btn"><i class="fa fa-trash" aria-hidden="true" id="trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>
                                                        <button class="btn"><i class="fa fa-trash" aria-hidden="true" id="trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>
                                                        <button class="btn"><i class="fa fa-trash" aria-hidden="true" id="trash"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>@mdo</td>
                                                    <td>
                                                        <button class="btn"><i class="fa fa-trash" aria-hidden="true" id="trash"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>

    </div>




</body>

</html>

<?php

if (isset($_POST["signout"])) {
    session_destroy();
    session_unset();
    header("Location: adminLogin.html");
}

?>