<?php 
$con = mysqli_connect('localhost', 'root', '', 'function');
// $dsn='mysqli:host:localhost;dbname:view';
// $username='root';
// $password='';
// try
// {
//     $con=new PDO($dsn,$username,$password);
//     $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// }
// catch(Exeption $ex)
// {
//     echo 'not found'.$ex->getMessage();
// }

// $connection = mysqli_connect('localhost', 'root', '', 'function');
if(isset($_POST['insert'])){
$user=$_POST['user'];
$email=$_POST['email'];
$id=$_POST['id'];
$pas=$_POST['pas'];
$sql=" INSERT INTO info(id,user,email,pas) values('$id','$user','$email','$pas') ";
$res=mysqli_query($con,$sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
    </style>
</head>
<body>
<form action="simple.php" method="post">
    <input type="text" name ="id" placeholder="id"><br/><br/>
    <input type="text" name ="user" placeholder="user"><br/><br/>
    <input type="text" name ="email" placeholder="email"><br/><br/>
    <input type="text" name ="pas" placeholder="pas"><br/><br/>
    <input type="submit" name="insert" value="insert">
    <input type="submit" name="update" value="update">
    <input type="submit" name="delete" value="delete">
    <input type="submit" name="search" value="search">
    <br><br><br><br>
    <table class="styled-table">
    <thead>
        <tr>
            <th>id</th>
            <th>user</th>
            <th>email</th>
            <th>pas</th>
        </tr>
    </thead>
    <?php
          
          $sql1 = "SELECT  * FROM info";
          $result = mysqli_query($con, $sql1);
          if(mysqli_num_rows($result) > 0){

              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<td>'. $row['id'] .'</td>';
                  echo '<td>'. $row['user'] .'</td>';
                  echo '<td>'. $row['email'] .'</td>';
                  echo '<td>'. $row['pas'] .'</td>';
                  echo '</tr>';
              }
          }
      ?>
</table>
    </form>
    </body>
</html>
