<?php
include '../database/PDO_Connection.php';
session_start();
$page_name="Users";
$counter = 1;

$res = $conn->prepare("SELECT * FROM users");
$res->execute();
$users = $res->fetchAll(PDO::FETCH_ASSOC);

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
    <title>لیست کاربران</title>
  </head>
  <body>
    <?php include './sidebar.php' ?>
    <?php include './header.php' ?>
  

    <div class="page_contents" style="margin: 0;">
      <div class="page_containers">
        <table border="0" style="border-collapse: collapse">
          <thead>
            <tr>
              <th>ردیف</th>
              <th>آیدی عددی</th>
              <th>نام</th>
              <th>نام خانوادگی</th>
              <th>نام کاربری</th>
              <th>ایمیل</th>
              <th>سطح</th>
              <th>عکس</th>
              <th>تاریخ ورود</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $user){ ?>
            <tr>
              <td><?= $counter++ ?></td>
              <td><?= $user['num_id'] ?></td>
              <td><?= $user['name'] ?></td>
              <td><?= $user['family'] ?></td>
              <td><?= $user['username'] ?></td>
              <td><?= $user['email'] ?></td>
              <td><?php if($user['rule']==1){echo "مالک";}else{echo "کاربر";} ?></td>
              <td><img src="../image/users/<?php if($user['image']){echo $user['image'];}else{echo 'default.png';} ?>" alt="" /></td>
              <td><?= $user['create_at'] ?></td>
              <td><a href="./delUser.php?id=<?= $user['num_id'] ?>">حذف</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="./script.js"></script>
  </body>
</html>
