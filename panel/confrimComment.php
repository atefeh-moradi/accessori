<?php
include '../database/PDO_Connection.php';
$id = $_GET['id'];

$res=$conn->prepare("UPDATE comments SET status=? WHERE id=?");
$res->bindValue(1, 1);
$res->bindValue(2, $id);
$res->execute();
// header("location : ./listComments.php");
echo "<script>location = './listComments.php' </script>";

?>