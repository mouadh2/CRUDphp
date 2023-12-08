<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="test2";
    $conn=mysqli_connect($servername, $username, $password, $dbname);

if(!empty($_GET["id"])){
    $ids=mysqli_real_escape_string($conn,$_GET["id"]);
    $sql = "DELETE FROM table_1 WHERE id=$ids";
    echo$sql;
    mysqli_query($conn,$sql);
    header("Location:index.php");
}

?>