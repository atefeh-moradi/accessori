<?php
include "./database/PDO_Connection.php";
include "./jdf.php";

session_start();

if(isset($_POST['subBtn'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confrimPassword = $_POST['confrimPassword'];
  $createAt = jdate('Y/m/d - h:i:s');

  if($username && $email && $phone && $password && $confrimPassword){
    if(strlen($username) >= 3){
      if(strlen($phone) > 10 && strlen($phone) <= 11){
        if(strlen($password) >= 4){
          if($password == $confrimPassword){
              $num_id=rand(1000000,9999999);

              $res = $conn->prepare("INSERT INTO users SET num_id=?, username=?, email=?, phone=?, password=?, create_at=?");
              $res->bindValue(1, $num_id);
              $res->bindValue(2, $username);
              $res->bindValue(3, $email);
              $res->bindValue(4, $phone);
              $res->bindValue(5, $password);
              $res->bindValue(6, $createAt);
              $res->execute();

              $_SESSION['num_id'] = $num_id;
              $_SESSION['username'] = $username;
              $_SESSION['email'] = $email;
              $_SESSION['rule'] = 0;

              echo "<script>alert('ثبت نام موفقیت آمیز بود، در حال رفتن به پنل!')</script>"; 
              echo "<script>location = './panel/userInfo.php' </script>";
          }
          else{
            echo "<script>alert('رمز عبور با تکرار آن برابر نیست')</script>";
          }
        }
        else{
          echo "<script>alert('رمز عبور باید حدقل 4 کاراکتر باشد')</script>";
        }
      }
      else{
        echo "<script>alert('شماره موبایل اشتباه یا بدون صفر اول است')</script>";
      }
    }
    else{
      echo "<script>alert('نام کاربری باید حدقل 3 کاراکتر باشد')</script>";
    }
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
    <link rel="stylesheet" href="./css/style.css" />
    <title>دلایت | ثبت نام</title>
  </head>
  <body>

    <div class="validation-msgs">
        <span class="validation-msgF">!اطلاعات فرم را به درستی وارد کنید</span>
        <span class="validation-msgT">!ثبت نام با موفقیت انجام شد</span>
    </div>

    <div class="validation">
      <div class="signUp">
        <div class="signUp-right">
          <form action="" method="POST">
            <p class="signUp-form__title title">عضویت</p>
            <p class="signUp-form__subtitle subtitle">
              قبلا ثبت نام کرده اید ؟ <a href="./signIn.php">ورود</a>
            </p>

            <div class="input-signUp form-signUp__username">
              <input type="text" name="username" placeholder="نام کاربری" />
              <i class="bx bx-user" style="color: #919191"></i>
            </div>
            <div class="input-signUp form-signUp__email">
              <input type="text" name="email" placeholder="ایمیل" />
              <i class="bx bx-envelope" style="color: #919191"></i>
            </div>
            <div class="input-signUp form-signUp__phoneNumber">
              <input type="text" name="phone" placeholder="شماره تلفن" />
              <i class="bx bx-phone" style="color: #919191"></i>
            </div>
            <div class="input-signUp form-signUp__password">
              <input type="password" name="password" placeholder="رمز عبور" />
              <i class="bx bx-lock-alt" style="color: #919191"></i>
            </div>
            <div class="input-signUp form-signUp__confPassword">
              <input
                type="password"
                name="confrimPassword"
                placeholder="تکرار رمز عبور"
              />
              <i class="bx bx-shield" style="color: #919191"></i>
            </div>
            <button class="signUpBtn" type="submit" name="subBtn">ثبت نام</button>
          </form>
        </div>
        <div class="signUp-left">
          <img src="./image/gallery/14.jpg" alt="" />
        </div>
      </div>
      <a href="./index.php" class="validation-closeBtn">خروج</a>
    </div>

    <script src="./validation.js"></script>
  </body>
</html>
