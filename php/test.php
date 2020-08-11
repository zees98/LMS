<?php
 $con = mysqli_connect("localhost","root","");
 if($con)
     echo "<br>Connection Sucessful";
 else
     die(mysqli_error($con));
 
    //  $db = "create database login";
    //  $db_creation = mysqli_query($con,$db);
    //  if($db_creation)
    //      echo "<br>Db Created";
    //  else
    //      echo "<br>Db not Created";
     
    //  mysqli_select_db($con,"test");
    //  $tableCreate = "create table test.image(path text)";
    //  $tablecreated = mysqli_query($con,$tableCreate);
    //  if($tablecreated)
    //      echo "<br> Table Created";
    //  else
    //      die(mysqli_error($con));

// $getData = "Select * from image.upload";

// $results = mysqli_query($db, $getData);

// while($row=mysqli_fetch_array($results)){
//     echo "<div id='img_div'>";
//     echo"<h1>".$row["name"]."</h1>";
//     echo "<img src='images/".$row['img']."'>";
//     echo"</div>";
// }

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $img=$_FILES['img']['name'];
    echo"$img";
    $insert="insert into test.image values('NULL','$img')";
    if(mysqli_query($db,$insert)){
        move_uploaded_file($_FILES['img']['tmp_name'],"images/$img");
        echo "<script>alert('uploaded successfully')</script>";
    }
    else{
        echo "<script>alert('uploaded unsuccessfully')</script>";
    }
}


?>

<html>
<head>
</head>
<body>
<form action="test.php" method="POST" enctype="multipart/form-data">
<label>name</label>
<input name="name" type="text">
<br>
<label>File</label>
<input name="img" type="file">
<br>
<input type="submit" name="submit" value="upload">
</form>
</body>
</html>