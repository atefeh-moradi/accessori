<?php
include '../database/PDO_Connection.php';
$id = $_GET['id'];

$res=$conn->prepare("DELETE FROM comments WHERE id=?");
$res->bindValue(1, $id);
$res->execute();
echo "<script>location = './listComments.php' </script>";
// header("location : ./listComments.php");

?>