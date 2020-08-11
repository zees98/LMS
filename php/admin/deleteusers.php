 <?php
 if(isset($_POST['id'])){
     $id=$_POST['id'];
     echo "$id";

     $conn = mysqli_connect(
        "68.183.162.131",
        "hariscorp_hariscorp",
        "kdw{koz4]c[%",
        "hariscorp_zfhlibrary",
        3306
    );
    if ($conn) {
        $delete_query = "Delete from Member where id = '{$id}'";
        $result = mysqli_query($conn, $delete_query);
        if($result)
            echo "Success";
        else 
            echo "Failed";
    }
    else{
        echo "connection failed";
    }
 }
 else{
     echo "isset failed";
 }


?>