<?php
include '../database/PDO_Connection.php';
session_start();

$page_name="userInfo";

$numID = $_SESSION['num_id'];

$res = $conn->prepare("SELECT * FROM users where num_id=?");
$res->bindValue(1, $numID);
$res->execute();
$user = $res->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['subBtn'])){
$num_id = $_POST['num_id'];
$name = $_POST['name'];
$family = $_POST['family'];
$username = $_POST['username'];
$image = $_FILES['image']['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$res = $conn->prepare("UPDATE users SET num_id=?, name=?, family=?, username=?, image=?, email=?, phone=?, password=? where num_id=?");
$res->bindValue(1, $num_id);
$res->bindValue(2, $name);
$res->bindValue(3, $family);
$res->bindValue(4, $username);
$res->bindValue(5, $image);
$res->bindValue(6, $email);
$res->bindValue(7, $phone);
$res->bindValue(8, $password);
$res->bindValue(9, $numID);
$res->execute();
move_uploaded_file($_FILES["image"]["tmp_name"], "../image/users/".$_FILES['image']['name']);
echo "<script>alert('پروفایل با موفقیت بروز شد')</script>";
echo "<script>location = './userInfo.php' </script>";
}


?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style.css" />
    <title>اطلاعات کاربر</title>
  </head>
  <body>

  <?php include './sidebar.php' ?>
  <?php include './header.php' ?>

    <div class="page_content">
      <div class="page_container">
        <form method="POST" class="added" enctype="multipart/form-data">
        <?php foreach($user as $item){ ?>
          <div class="form-container">
            <div class="formItem">
              <label for="name">آیدی :</label>
              <input
                type="text"
                name="num_id"
                id="name"
                style="cursor: no-drop"
                value="<?= $item['num_id'] ?>"
                readonly
              />
            </div>

            <div class="formItem">
              <label for="name">نام :</label>
              <input type="text" name="name" id="name" placeholder="نام شما" value="<?= $item['name'] ?>" />
            </div>

            <div class="formItem">
              <label for="family">نام خانوادگی :</label>
              <input
                type="text"
                name="family"
                id="family"
                value="<?= $item['family'] ?>"
                placeholder="نام خانوادگی شما"
              />
            </div>

            <div class="formItem">
              <label for="username">نام کاربری :</label>
              <input
                type="text"
                name="username"
                id="username"
                value="<?= $item['username'] ?>"
                placeholder="نام کاربری شما"
              />
            </div>

            <div class="formItem">
              <label for="image">عکس پروفایل :</label>
              <input
                type="file"
                name="image"
                id="image"
                <?= $item['image'] ?>
                placeholder="آدرس عکس به صورت لینک"
              />
            </div>

            <div class="formItem">
              <label for="email">ایمیل :</label>
              <input
                type="text"
                name="email"
                id="email"
                value="<?= $item['email'] ?>"
                placeholder="ایمیل شما"
              />
            </div>

            <div class="formItem">
              <label for="phone">شماره موبایل :</label>
              <input
                type="text"
                name="phone"
                id="phone"
                value="<?= $item['phone'] ?>"
                placeholder="شماره موبال شما"
              />
            </div>

            <div class="formItem">
              <label for="password">رمز عبور :</label>
              <input
                type="text"
                name="password"
                id="password"
                value="<?= $item['password'] ?>"
                placeholder="رمز عبور شما"
              />
            </div>
          </div>
        <?php } ?>
          <input type="submit" name="subBtn" value="ویرایش کردن" class="subForm" />
        </form>
      </div>
    </div>

    <script src="./script.js"></script>
  </body>
</html>
