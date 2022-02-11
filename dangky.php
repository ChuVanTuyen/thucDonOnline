<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/registered.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="login-modal__body">
      <div class="login-modal__inner"></div>
      <div class="registered">
        <h1 class="registered_name-form">Đăng ký</h1>
        <form action="./dangky.php" method="POST" id="dangky">
        <div class="form-group">
            <label for="text">Họ và Tên:</label>
            <input type="text" class="form-control" id="fullname" placeholder="VD: Chu Văn Tuyến" name="fullname">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="VD: example@gmail.com" name="email">
          </div>
          <div class="form-group">
            <label for="text">Tên tài khoản:</label>
            <input type="text" class="form-control" id="username" placeholder="VD: Tuyen123" name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pwd">
          </div>
          <div class="form-group">
            <label for="pwd">Nhập lại mật khẩu:</label>
            <input type="password" class="form-control" id="repwd" placeholder="Nhập lại mật khẩu" name="repwd">
          </div>
          <?php
          ob_start(); 
          session_start();
          include_once './connect.php';
          if(isset($_POST["submit"])){
              $username = $_POST["username"];
              $name = $_POST["fullname"];
              $password = $_POST["pwd"];
              $email = $_POST["email"];
              $repassword = $_POST["repwd"];
              if($name == ''){
                echo '<center class="alert alert-danger">Vui lòng nhập tên của bạn!</center>';
              }
              if($name != '' && $email == ''){
                echo '<center class="alert alert-danger">Bạn chưa nhập email!</center>';
              }
              if($name != '' && $email !='' && $username == ''){
                echo '<center class="alert alert-danger">Bạn chưa nhập tên tài khoản!</center>';
              }
              if($name != '' && $email !='' &&  $username != '' && $password == ''){
                echo '<center class="alert alert-danger">Bạn chưa nhập mật khẩu!</center>';
              }
              if($name != '' && $email !='' &&  $username != '' && $password != '' && $password != $repassword){
                echo '<center class="alert alert-danger">Mật khẩu không trùng khớp!</center>';
              }
              if($name != '' && $email !='' &&  $username != '' && $password != '' && $password == $repassword){
                $sql = "SELECT tentk FROM user WHERE tentk = '$username'";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                if($rows > 0){
                  echo '<center class="alert alert-danger">Tên đăng nhập đã tồn tại!</center>';
                }
                if($rows == 0){
                  $sql = "INSERT INTO user(email, tentk, pwd, hoten, quyen_truy_cap)
                  VALUES ('$email', '$username', '$password','$name', 0)";
                  mysqli_query($conn,$sql);
                  header('location: index.php');
                }
              }
              
            }
          ?>
          <button type="submit" class="btn btn-default registered_btn" name="submit">Đăng ký</button>
        </form>
      </div>
    </div>
  </div>
  <script src="./js/dangky.js"></script>
</body>
</html>