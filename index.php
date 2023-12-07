<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="test2";
$conn=new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$id=$_POST["id"];
$title=$_POST["title"];
$date=$_POST["date"];

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO table_1 (id, title,add_date) VALUES ('$id', '$title','$date')";
    $conn->query($sql);
    header('location:/exe1/index.php');
}
?>
<!doctype html>
<html>
    <style>
        .th1{
            background:#f39c12;
        }
        .tb1{
            background: #3498db;
        }
        th,td{
            border: 1px solid white; 
        }
    </style>
    <body>
<form action="index.php" method="post">
    <fieldset>
        <legend>INSERt & SELECt</legend>
    <label for="id">ID</label><br>
    <input type="number" min="1" max="10"name="id" id="id" required><br>
    <label for="title">TITLE</label><br>
    <input type="text" name="title" id="title" required><br><br>
    <label for="date">date</label><br>
    <input type="date" name="date" id="date" required><br><br>
    <input type="submit" name="submit" value="ADD">
   </fieldset>
</form>
<table  cellspacing="0">
      		<thead class="th1">
      			<tr>
      				<th>id</th>
      				<th>title</th>
                    <th>date</th>
                    <th colspan="2">actions</th>
      			</tr>
      		</thead>
            <tbody class ="tb1">
<?php
   $result=$conn->query("SELECT id,title,add_date FROM `table_1`");
   $registres= $result->fetchAll();
   foreach ($registres as $data){
    echo"<tr>";
    echo"<td>".$data["id"]."</td>";
    echo"<td>".$data["title"]."</td>";
    echo "<td>".$data["add_date"]."</td>";
    echo"<td><a href=\"modif_exe.php?id=".$data["id"]."\">Edit</a></td>";
    echo "</tr>";
}
?>


</tbody>
</body>
</html>