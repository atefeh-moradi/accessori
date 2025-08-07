<?php
// session_start();
  include '../database/PDO_Connection.php';

  $result = $conn->prepare('SELECT * FROM users WHERE num_id=?');
  $result->bindValue(1, $_SESSION['num_id']);
  $result->execute();
  $users = $result->FetchAll(PDO::FETCH_ASSOC);
  foreach($users as $user){}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="sideBar-container">
      <div class="sideBar-menu">
        <div class="sideBar-menu-header">
          <img src="../image/logo.png" alt="" class="sideBar-logo" />
          <button class="close_sidbar">×</button>
        </div>
        <ul class="sideBar-items">
          
          <li class="sideBar-item">
            <div class="<?php echo $page_name=="userInfo" ? "active" : '' ?>">
              <p>پروفایل</p>
              <i class="bx bx-user"></i>
            </div>
            <ul>
              <li><a href="./userInfo.php">نمایش و ویرایش</a></li>
            </ul>
          </li>
          <?php if($user['rule']==1){ ?>
          <li class="sideBar-item">
            <div class="<?php echo $page_name=="products" ? "active" : '' ?>">
              <p>محصولات</p>
              <i class="bx bx-note"></i>
            </div>
            <ul>
              <li><a href="./addProduct.php">اضافه کردن</a></li>
              <li><a href="./listProduct.php">لیست محصولات</a></li>
            </ul>
          </li>
          <li class="sideBar-item">
            <div class="<?php echo $page_name=="articles" ? "active" : '' ?>">
              <p>مقاله ها</p>
              <i class="bx bx-receipt"></i>
            </div>
            <ul>
              <li><a href="./addArticle.php">اضافه کردن</a></li>
              <li><a href="./listArticle.php">لیست مقاله ها</a></li>
            </ul>
          </li>
          <li class="sideBar-item">
            <div class="<?php echo $page_name=="Users" ? "active" : '' ?>">
              <p>کاربران</p>
              <i class="bx bx-user"></i>
            </div>
            <ul>
              <li><a href="./listUsers.php">لیست کاربران</a></li>
            </ul>
          </li>
            <li class="sideBar-item">
            <div class="<?php echo $page_name=="comments" ? "active" : '' ?>">
              <p>کامنت ها</p>
              <i class="bx bx-message"></i>
            </div>
            <ul>
              <li><a href="./listComments.php">لیست کامنت ها</a></li>
            </ul>
          </li>
          <?php } ?>
          <li class="sideBar-item logout">
            <a
              href="./logout.php"
              style="display: flex; justify-content: flex-end; gap: 0.4rem"
            >
              <p>خروج</p>
              <i class="bx bx-log-out"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
</body>
</html>