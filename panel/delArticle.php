<?php
  include '../database/PDO_Connection.php';
  $id = $_GET['id'];

  $result=$conn->prepare("DELETE FROM articles WHERE id=?");
  $result->bindValue(1, $id);
  $result->execute();
  header('location: ./listArticle.php');
?>