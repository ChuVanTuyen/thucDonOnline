<?php 
  ob_start();
  session_start();
  include_once '../connect.php';

  if($_SESSION["adname"] ==''){
    header('location: dangxuat.php');
  }
if(isset($_POST["submit"])){
  if($_POST["adname"]!="" && $_POST["matkhau"]!=""){
    $adname=$_POST["adname"];
    $matkhau=$_POST["matkhau"];
    mysqli_query($conn, "INSERT INTO admin (adname, adpwd) VALUES ('$adname', '$matkhau')");
    header('location: ./danhsachadmin.php');
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" href="../css/quangtri.css">
    <title>Document</title>
</head>
<body style="background-color: #eff0f1;">
    <div class="jumbotron header_main-nav headerqt">
      <nav class="navbar navbar-inverse navbar-inverse-color header_main-nav">
        <div class="container-fluid container-fluid-color headerqt_text">
          <div class="navbar-header">
            <a class="navbar-brand navbar-nav-text_color" href="./trangchu.php">ThucDonOnline</a>
          </div>
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="../dangky.php"><span class="glyphicon glyphicon-user"></span>adname</a></li>
              <li><a href="../dangxuat.php"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
          </ul>
        </div>
      </nav>
    </div>
      
    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav">
          <h4>Danh mục quản trị</h4>
          <div data-role="dm_quantri">
            <div class="dm_quantri-item"><a href="./danhsachadmin.php">Quản lý tài khoản admin</a></div>
            <div class="dm_quantri-item"><a href="./danhsachnguoidung.php">Quản lý tài khoản người dùng</a></div>
            <div class="dm_quantri-item"><a href="./danhsachthucdon.php" >Quản lý thực đơn</a></div>
          </div>
        </div>
      
        <div class="col-sm-9"> 
<div class="quanly_thucdon" style="background-color: #fff; padding: 10px; border-radius: 5px;">
            <h1>Thêm thực đơn</h1>
            <form action="./themtkadmin.php" method="POST">
              <p>Adname:</p>
              <?php if(isset($_POST["submit"])){if($_POST["adname"]=="" ){echo '<p style="color: red;">Bạn chưa nhập tên thực đơn</p>';}} ?>
              <input type="text" name="adname" class="form-control"><br>
              <p>Mật khẩu:</p>
              <?php if(isset($_POST["submit"])){if($_POST["matkhau"]=="" ){echo '<p style="color: red;">Bạn chưa nhập tên thực đơn</p>';}} ?>
              <input type="text" name="matkhau" class="form-control"><br>
              <button name="submit" class="submit" style="color: #fff; border: solid 1px #333; border-radius: 2px; padding: 2px 4px">Thêm</button>
              <button class="cancel">Làm mới</button>

              
    </form>
</div>


        </div>
      </div>
    </div>
    
    
    <div class="footer">
        <div class="footer2">
          <div class="container-fluid">
            <div class="container">
              <div class="row">
                <div class="clear30"></div>
                <div class="col-sm-12 text-center"><p><strong>HaNoi © 2021-2022 Project application software engineering.</strong></p></div>
                <div class="clear30"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>