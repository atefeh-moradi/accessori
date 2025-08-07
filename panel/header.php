<?php
include '../database/PDO_Connection.php';

$numID = $_SESSION['num_id'];

$res = $conn->prepare("SELECT * FROM users where num_id=?");
$res->bindValue(1, $numID);
$res->execute();
$user = $res->fetchAll(PDO::FETCH_ASSOC);


if(!isset($_SESSION['username'])){
  // header("Location: ../signIn.php");
  echo "<script>location = '../signIn.php' </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="page_header" style="background-color: white;">
      <i class="bx bx-menu open_sidbar"></i>

      <div class="page_header_info">
        <?php foreach($user as $item){ ?>
            <div>
              <p><?= $user?$item['username'] : $_SESSION['username']; ?></p>
              <p><?= $user?$item['email'] : $_SESSION['email']; ?></p>
            </div>
            <img src="../image/users/<?= $item['image']?>" style="object-fit: cover;" alt="" />
        <?php } ?>
      </div>
    </div>
</body>
</html>