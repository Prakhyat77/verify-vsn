<?php

include '../dbcon/conn.php';

$id = $_GET['id'];

$del_query="DELETE FROM contact WHERE c_id=$id";
mysqli_query($con,$del_query);
header("Location: contact.php" );


?>