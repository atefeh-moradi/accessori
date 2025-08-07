<?php
include '../database/PDO_Connection.php';
include "../jdf.php";
session_start();
$page_name="articles";

if(isset($_POST['subBtn'])){
    $title = $_POST['title'];
    $caption = $_POST['caption'];
    $subTitle = $_POST['subTitle'];
    $author = $_POST['author'];
    $timeRead = $_POST['timeRead'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $createAt = jdate('Y/m/d - h:i:s');

  
    if($title && $subTitle && $caption && $category && $timeRead && $author){
      $res = $conn->prepare("INSERT INTO articles SET title=?, caption=?, subTitle=?, author=?, time_read=?, category=?, image=?, create_at=?");
      $res->bindValue(1, $title);
      $res->bindValue(2, $caption);
      $res->bindValue(3, $subTitle);
      $res->bindValue(4, $author);
      $res->bindValue(5, $timeRead);
      $res->bindValue(6, $category);
      $res->bindValue(7, $image);
      $res->bindValue(8, $createAt);
      $res->execute();  
      move_uploaded_file($_FILES["image"]["tmp_name"], "../image/articles/".$_FILES['image']['name']);
      echo "<script>alert('مقاله اضافه شد')</script>";
      echo "<script>location = './listArticle.php' </script>";
    }
    else{
      echo "<script>alert('همه فیلد ها را پر کنید')</script>"; 
    }
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
    <title>اضافه کردن مقاله</title>
  </head>
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
        <form method="POST" class="added" enctype="multipart/form-data">
         <div class="form-container">
           <div class="formItem">
            <label for="title">نام :</label>
            <input
              type="text"
              name="title"
              id="title"
              placeholder="نام یا موضوعی برای مقاله"
            />
          </div>
          <div class="formItem">
          <label for="image">لینک عکس :</label>
            <input
              type="file"
              name="image"
              id="image"
            />
          </div>

          <div class="formItem">
          <label for="subTitle">زیر عنوان مقاله :</label>
            <input
            type="text"
              name="subTitle"
              id="subTitle"
              placeholder="زیر عنوانی برای مقاله..."
            ></input>
          </div>

          <div class="formItem">
          <label for="caption">توضیحات :</label>
            <input
            type="text"
              name="caption"
              id="caption"
              placeholder="توضیحی درباره مقاله..."
            ></input>
          </div>

          <div class="formItem">
          <label for="category">دسته بندی :</label>
            <input
            type="text"
              name="category"
              id="category"
              placeholder="مثال : کاربردی،مفید یا خلاقیت"
            ></input>
          </div>

          <div class="formItem">
          <label for="timeRead">مدت زمان خواندن (دقیقه):</label>
            <input
            type="text"
              name="timeRead"
              id="timeRead"
              placeholder="مثال : 10"
            ></input>
          </div>

          <div class="formItem">
          <label for="author">نویسنده :</label>
            <input
            type="text"
              name="author"
              id="author"
              placeholder="مثال : علی محمدی"
            ></input>
          </div>

         </div>

          <input
            type="submit"
            name="subBtn"
            value="اضافه کردن"
            class="subForm"
          />
        </form>
      </div>
    </div>


    <script src="./script.js"></script>
  </body>
</html>
