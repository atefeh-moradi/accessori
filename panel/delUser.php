<?php
  include '../database/PDO_Connection.php';
  $id = $_GET['id'];

  $result=$conn->prepare("DELETE FROM users WHERE num_id=?");
  $result->bindValue(1, $id);
  $result->execute();
  echo "<script>alert('کاربر حذف شد')</script>";
  echo "<script>location = './listUsers.php' </script>";
  // header('location: ./listUsers.php');
?>