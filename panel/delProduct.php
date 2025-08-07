<?php
  include '../database/PDO_Connection.php';
  $id = $_GET['id'];

  $result=$conn->prepare("DELETE FROM products WHERE id=?");
  $result->bindValue(1, $id);
  $result->execute();
  header('location: ./listProduct.php');
?>