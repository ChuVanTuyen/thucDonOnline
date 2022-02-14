<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/login.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>
  <div class="container">
      <div class="login">
        <h1 class="login_name-form">Đăng nhập</h1>
        <form action="./index.php" method="POST" name="submit">
          <div class="form-group">
            <label for="text">Tên tài khoản:</label>
            <div class="ttk_thongbao">bạn chưa nhập tài khoản</div>
            <input type="text" class="form-control" id="username" placeholder="VD: Thuy123" name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <div class="mk_thongbao">bạn chưa nhập mật khẩu</div>
            <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pwd">
          </div>
          <div class="recover_pwd-link"><a href="" class="forgot_password">Bạn quên mật khẩu?</a></div>
          <?php
            session_start();// khai báo sử dụng session
            include_once './connect.php';
            if(isset($_POST["submit"])){
              $username = $_POST["username"];
              $password = $_POST["pwd"];
              if($username == ''){
                echo '<div class="thongbao">Bạn chưa nhập tên tài khoản!</div>';
              }
              if($username != '' && $password == ''){
                echo '<div class="thongbao">Bạn chưa nhập mật khẩu!</div>';
              }
              if($username !='' && $password!=''){
                $sql = "SELECT id,tentk,pwd FROM user WHERE tentk='$username' AND pwd='$password'";
                $result = mysqli_query($conn, $sql);
                $nums = mysqli_num_rows($result);
                $rows = mysqli_fetch_array($result);
                if($nums > 0){
                  $_SESSION["username"] = $username;
                  $_SESSION["id"] = $rows["id"];
                  header('location: trangchu.php');
                }
                else{
                  $sql = "SELECT * FROM admin WHERE adname='$username' AND adpwd='$password'";
                  $result = mysqli_query($conn, $sql);
                  $adnums = mysqli_num_rows($result);
                  $adrows = mysqli_fetch_array($result);
                  if($adnums > 0){
                    $_SESSION["adname"] = $username;
                    $_SESSION["adid"] = $adrows["id"];
                    header('location: ./quangtri/danhsachthucdon.php');
                  }
                  echo '<div class="thongbao">Tài khoản hoặc mật khẩu không chính xác!</div>';
                }
              }
            }
          ?>
          <button type="submit" class="btn btn-default login_btn" name="submit">Đăng nhập</button>
          <div class="login_sign-up">
            <span>Bạn chưa có tài khoản?</span>
            <a href="./dangky.php">Đăng ký tại đây.</a>
          </div>
        </form>
    </div>
  </div>
  <script src="./js/dangnhap.js"></script>
</body>
</html>