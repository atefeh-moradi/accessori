<?php
  include './database/PDO_Connection.php';
  $id = $_GET['id'];

  $result=$conn->prepare("SELECT * FROM articles WHERE id=?");
  $result->bindValue(1, $id);
  $result->execute();
  $articles = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach($articles as $article)

  $result=$conn->prepare("SELECT * FROM articles WHERE category=? LIMIT 3");
  $result->bindValue(1, $article['category']);
  $result->execute();
  $recommendArticles = $result->fetchAll(PDO::FETCH_ASSOC);


  $result = $conn->prepare("INSERT INTO articles_view SET article_id=?");
  $result->bindValue(1, $id);
  $result->execute();
  $articles_view = $result->fetchAll(PDO::FETCH_ASSOC);


  $result = $conn->prepare("SELECT COUNT(id) as totalView FROM articles_view WHERE article_id=?");
  $result->bindValue(1, $id);
  $result->execute();
  $articles_view = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach($articles_view as $view){}


?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <title>جزئیات مقاله</title>
</head>

<body>

    <?php include './mobileMenu.php' ?>
    <?php include './menu.php' ?>

    <div class="article">
      <?php foreach($articles as $article){ ?>
        <div class="article-container">

            <header class="article-header">
                <h1 class="article-title"><?= $article['title'] ?></h1>
                <div class="article-meta">
                    <span class="article-date">تاریخ انتشار: <?= $article['create_at'] ?></span>
                    <span class="article-author">نویسنده: <?= $article['author'] ?></span>
                    <span class="article-author">بازدید: <?= $view['totalView'] ?></span>
                </div>
            </header>

            <div class="article-content">
                <img src="./image/articles/<?= $article['image'] ?>" alt="تصویر مقاله" class="article-image">
                <div class="article-text">
                    <h2><?= $article['subTitle'] ?></h2>
                    <p><?= $article['caption'] ?></p>
                </div>
            </div>

            <div class="popular-accessory__header">
                <img src="./image/icons8-watch-90.png" alt="" />
                <div>
                    <p class="popular-title title">مقاله های پیشنهادی</p>
                    <p class="popular-subtitle subtitle">
                        مقاله های ما را بخوانید و به دانش خود بیافزایید !
                    </p>
                </div>
            </div>
            <div style="margin-top: 0;">
                <div class="article__content">
                   <?php foreach($recommendArticles as $item){ ?>
                    <div class="article__content-item">
                        <img src="./image/articles/<?= $item['image'] ?>" alt="" />
                        <p class="article__content-item-title"><?= $item['title'] ?></p>
                        <p class="article__content-item-subtitle"><?= $item['caption'] ?></p>
                        <div class="article__content-item-footer">
                            <p class="article__content-item-date"><?= $item['create_at'] ?></p>
                            <div>
                                <i class='bx  bx-pen-alt'></i>
                                <p>نویسنده : <?= $item['author'] ?></p>
                            </div>
                        </div>
                        <a href="./article.php?id=<?= $item['id'] ?>" class="article__content-item-link">بیشتر بدانید</a>
                    </div>
                   <?php } ?>
                </div>
            </div>
        </div>
      <?php } ?>


    <?php include './footer.php' ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>