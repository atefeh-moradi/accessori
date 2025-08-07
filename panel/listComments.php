<?php
include '../database/PDO_Connection.php';
session_start();
$page_name="comments";
$counter=1;

$res = $conn->prepare("SELECT c.id as id, u.username as username, p.title as product, c.content as content, c.status as status, c.create_at as create_at FROM comments c JOIN users u on u.num_id = c.user_id join products p on p.id = c.product_id WHERE c.status = 0");
$res->execute();
$comments = $res->fetchAll(PDO::FETCH_ASSOC);
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
    <title>لیست دیدگاه ها</title>
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

    <div class="page_container">
      <div class="page_content">
        <table border="0" style="border-collapse: collapse">
          <thead>
            <tr>
              <th>ردیف</th>
              <th>نام کاربری</th>
              <th>نام محصول</th>
              <th>متن دیدگاه</th>
              <th>تاریخ</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($comments as $comment){ ?>
            <tr>
              <td><?= $counter++ ?></td>
              <td><?= $comment['username'] ?></td>
              <td><?= $comment['product'] ?></td>
              <td style="max-width: 10rem"><?= $comment['content'] ?></td>
              <td><?= $comment['create_at'] ?></td>
              <td>
                <form method="post">
                  <a href="./rejectComment.php?id=<?= $comment['id'] ?>">رد</a>
                  <a href="./confrimComment.php?id=<?= $comment['id'] ?>">تایید</a>
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="./script.js"></script>
  </body>
</html>
