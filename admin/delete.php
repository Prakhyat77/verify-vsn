<?php

include '../dbcon/conn.php';

$id = $_GET['id'];

$del_query="DELETE FROM verify WHERE id=$id";
mysqli_query($con,$del_query);
header("Location: index.php" );


?>