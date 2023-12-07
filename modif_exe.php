<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="test2";
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    if(isset($_GET["id"]))
    {
        $idm=mysqli_real_escape_string($conn,$_GET["id"]);
        $sql="SELECT * FROM table_1 WHERE id=$idm";
        $result=mysqli_query($conn, $sql);

           if (mysqli_num_rows($result)>0){
           $row=mysqli_fetch_assoc($result);
           $id=$row["id"];
           $title=$row["title"];
           $date=$row["add_date"];
           }
           else{
            $message="L'exercice est introuvable";
        	header("Loation:index.php?message=$message");
    }
}
    if (count($_POST)>2){
        $id=mysqli_real_escape_string($conn, $_POST["id"]);
        $title=mysqli_real_escape_string($conn,$_POST["title"]);
        $date=mysqli_real_escape_string($conn,$_POST["date"]);
        $sql="UPDATE table_1 SET title='{$title}', add_date='{$date}' WHERE id='{$id}' ";
        if (mysqli_query($conn,$sql)){
        header("Location:index.php");
    }
}
?>


    
<form name="exe" action="modif_exe.php" method="post">
            <fieldset>
                <legend>Edit</legend>
                <label for="id">ID</label><br/>
                <input type="hidden" id="id" name="id" value="<?php echo $id;  ?>"><br/>
                <label for="title">title</label><br/>
                <input id="title" name="title" value="<?php $title; ?>"><br/>
                <label for="date">date</label><br/>
                <input type="date" id="date" name="date" value="<?php echo $date; ?>"><br/><br/>
                <input type="submit" value="save changes"> 
            </fieldset> 
</form>