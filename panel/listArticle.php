<?php
include '../database/PDO_Connection.php';
session_start();
$page_name="articles";


$res = $conn->prepare("SELECT * FROM articles ORDER BY id");
$res->execute();
$articles = $res->fetchAll(PDO::FETCH_ASSOC);

$counter=1;
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
    <title>لیست مقاله ها</title>
  </head>
  <style>
      table tr td:last-child a {
        padding: 0.2rem 0;
        font-size: 0.8rem;
        border-radius: 0.3rem;
        width: 3rem;
        height: 1.8rem;
        transition: 0.3s;
      }

      table tr td:last-child a:hover {
        opacity: 0.8;
      }

      table tr td:last-child a:nth-child(1) {
        padding:.3rem 1rem;
        background-color: var(--red);
        color: var(--white1);
      }
      table tr td:last-child a:nth-child(2) {
        padding:.3rem 1rem;
        background-color: var(--yellow);
        color: var(--white1);
      }
  </style>
  <body>
    <?php include './sidebar.php' ?>
    <?php include './header.php' ?>


    <div class="page_content">
      <a href="./addArticle.php">
        <button class="page-newBtn">
          <p>مقاله جدید</p>
          <i class="bx bx-plus-circle"></i>
        </button>
      </a>
      <div class="page_container">
        <table border="0" style="border-collapse: collapse">
          <thead>
            <tr>
              <th>ردیف</th>
              <th>نام</th>
              <th>توضیحات</th>
              <th>نویسنده</th>
              <th>دسته بندی</th>
              <th>زیر عنوان</th>
              <th>زمان خواندن</th>
              <th>عکس</th>
              <th>زمان انتشار</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($articles as $article){ ?>
            <tr>
              <td><?= $counter++; ?></td>
              <td><?= $article['title'] ?></td>
              <td><?= $article['caption'] ?></td>
              <td><?= $article['author'] ?></td>
              <td><?= $article['category'] ?></td>
              <td><?= $article['subTitle'] ?></td>
              <td><?= $article['time_read'] ?> دقیقه </td>
              <td><img src="../image/articles/<?= $article['image'] ?>" alt="" /></td>
              <td><?= $article['create_at'] ?></td>
              <td><a href="./delArticle.php?id=<?= $article['id'] ?>">حذف</a> <a href="./editArticle.php?id=<?= $article['id'] ?>">ویراش</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="./script.js"></script>
  </body>
</html>
