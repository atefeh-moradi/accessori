<?php
  include "./database/PDO_Connection.php";
  session_start();

  if(isset($_POST['subBtn'])){
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $result = $conn->prepare('SELECT * FROM users WHERE phone=? AND password=?');
    $result->bindValue(1, $phone);
    $result->bindValue(2, $password);
    $result->execute();
    $users = $result->FetchAll(PDO::FETCH_ASSOC);

    if($result->rowCount() >= 1){
        foreach($users as $user){
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['num_id'] = $user['num_id'];
      }
       echo "<script>alert('ورود با موفقیت انجام شد ✅')</script>";
       echo "<script>location = './panel/userInfo.php' </script>";
      //  header("location : ./panel/userInfo.php");
    }
    else{
     echo "<script>alert('کاربری با این مشخضات پیدا نشد ⛔')</script>";
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
    <link rel="stylesheet" href="./css/style.css" />
    <title>دلایت | ورود</title>
  </head>
  <body>

    <div class="validation">
      <div class="signIn">

        <div class="signIn-right">
          <form method="POST">
            <p class="signIn-form__title title">ورود</p>
            <p class="signIn-form__subtitle subtitle">
              حسابی برای ورود ندارید ؟ <a href="./signUp.php">ثبت نام</a>
            </p>

            <div class="input-signIn form-signIn__phoneNumber">
              <input type="text" name="phone" placeholder="شماره تلفن" />
              <i class="bx bx-phone" style="color: #919191"></i>
            </div>
            <div class="input-signIn form-signIn__password">
              <input type="password" name="password" placeholder="رمز عبور" />
              <i class="bx bx-lock-alt" style="color: #919191"></i>
            </div>

            <button class="signInBtn" type="submit" name="subBtn">ورود</button>
            
            <a href="" class="forgetPass">رمز عبور خود را فراموش کرده اید؟</a>
          </form>
        </div>

        <div class="signIn-left">
          <img src="./image/gallery/16.jpg" alt="" />
        </div>
        
      </div>
      <a href="./index.php" class="validation-closeBtn">خروج</a>
    </div>

    <script src="./validation.js"></script>
  </body>
</html>
