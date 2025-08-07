<?php
include '../database/PDO_Connection.php';
include '../jdf.php';
$id = $_GET['id'];
session_start();
$page_name="products";

$res=$conn->prepare("SELECT * FROM products WHERE id=?");
$res->bindValue(1, $id);
$res->execute();
$products = $res->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['subBtn'])){
    $title = $_POST['title'];
    $caption = $_POST['caption'];
    $price = $_POST['price'];
    $model = $_POST['model'];
    $category = $_POST['category'];
    $feature1 = $_POST['feature1'];
    $feature2 = $_POST['feature2'];
    $feature3 = $_POST['feature3'];
    $feature4 = $_POST['feature4'];
    $image = $_FILES['image']['name'];
    $createAt = jdate('Y/m/d - h:i:s');
  
    if($title && $caption && $price && $model && $category && $feature1 && $feature2 && $feature3 && $feature4 && $image){
      $res = $conn->prepare("UPDATE products SET title=?, caption=?, price=?, model=?, category=?, feature1=?, feature2=?, feature3=?, feature4=?, image=? WHERE id=?");
      $res->bindValue(1, $title);
      $res->bindValue(2, $caption);
      $res->bindValue(3, $price);
      $res->bindValue(4, $model);
      $res->bindValue(5, $category);
      $res->bindValue(6, $feature1);
      $res->bindValue(7, $feature2);
      $res->bindValue(8, $feature3);
      $res->bindValue(9, $feature4);
      $res->bindValue(10, $image);
      $res->bindValue(11, $id);
      $res->execute();  
      move_uploaded_file($_FILES["image"]["tmp_name"], "../image/products/".$_FILES['image']['name']);
      echo "<script>alert('محصول ویرایش  شد')</script>"; 
      echo "<script>location = './listProduct.php' </script>";
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
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css" />
  <title>ویرایش کردن محصول</title>
</head>

<body>

  <?php include './sidebar.php' ?>
  <?php include './header.php' ?>

  
  <div class="page_content">
    <div class="content_container">
      <form action="" method="POSt" class="added" enctype="multipart/form-data">
      <?php foreach($products as $product){ ?>
      <div class="form-container">
        <div class="formItem">
          <label for="title">نام :</label>
          <input type="text" name="title" id="title" value="<?= $product['title'] ?>" placeholder="نام یا موضوعی برای محصول" />
        </div>

        <div class="formItem">
          <label for="image">لینک عکس :</label>
          <input type="file" name="image" id="image" value="<?= $product['image'] ?>"  />
        </div>

        <div class="formItem">
          <label for="category">دسته بندی :</label>
          <input type="text" name="category" id="category" value="<?= $product['category'] ?>" placeholder="دسته بندی محصول" />
        </div>

        <div class="formItem">
          <label for="category">مدل :</label>
          <input type="text" name="model" id="category" value="<?= $product['model'] ?>" placeholder="مدل محصول" />
        </div>

        <div class="formItem">
          <label for="price">قیمت :</label>
          <input type="text" name="price" id="price" value="<?= $product['price'] ?>" placeholder="مثال : 125000" />
        </div>

        <div class="formItem">
          <label for="feature">ویژگی 1 :</label>
          <input type="text" name="feature1" id="feature" value="<?= $product['feature1'] ?>" placeholder="مثال : 12" />
        </div>
        <div class="formItem">
          <label for="feature">ویژگی 2 :</label>
          <input type="text" name="feature2" id="feature" value="<?= $product['feature2'] ?>" placeholder="مثال : 12" />
        </div>
        <div class="formItem">
          <label for="feature">ویژگی 3 :</label>
          <input type="text" name="feature3" id="feature" value="<?= $product['feature3'] ?>" placeholder="مثال : 12" />
        </div>
        <div class="formItem">
          <label for="feature">ویژگی 4 :</label>
          <input type="text" name="feature4" id="feature" value="<?= $product['feature4'] ?>" placeholder="مثال : 12" />
        </div>

        <div class="formItem">
          <label for="caption">توضیحات :</label>
          <input type="text" name="caption" value="<?= $product['caption'] ?>" id="caption" placeholder="توضیحی درباره محصول فروشگاه..."></input>
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