<?php
  include './database/PDO_Connection.php';
  $id = $_GET['id'];

  $result=$conn->prepare("DELETE FROM cart WHERE id=?");
  $result->bindValue(1, $id);
  $result->execute();
  echo "<script>alert('محصول از سبد حذف شد ⛔')</script>";
  echo "<script>location= './index.php'</script>";
?>