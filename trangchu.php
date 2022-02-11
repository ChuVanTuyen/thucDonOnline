<?php 
  ob_start();
  session_start();
  include_once './connect.php';

  if($_SESSION["username"] ==''){
    header('location: dangxuat.php');
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
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/tinhchiso.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <title>Document</title>
</head>
<body style="background-color: #eff0f1;">
    <div class="jumbotron header_main-nav">
        <nav class="navbar navbar-inverse navbar-inverse-color header_main-nav">
          <div class="container-fluid container-fluid-color">
            <div class="navbar-header">
              <a class="navbar-brand navbar-nav-text_color" href="./trangchu.php">ThucDonOnline</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Liên hệ</a></li>
              <li><a href="#" class="navbar-nav-color">Tải ứng dụng</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="navbar-nav-text_color" href="#">Hỗ trợ</a></li>
                <li><a href="#">Thông báo</a></li>
                <li><a href="./dangky.php"><span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?></a></li>
                <li><a href="./dangxuat.php"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
            </ul>
          </div>
        </nav>
        <div class="container text-center header_main">
          <div>
            <h1>healthy and balanced</h1>
            <h4>Hãy sử dụng dịch vụ của ThucDonOnline để có được 1 thực đơn khoa học!</h4>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-inverse navbar-inverse-color">
        <div class="container-fluid container-fluid-color">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>        
              <span class="icon-bar"></span>                     
            </button>
            <a class="navbar-brand" href="./trangchu.php">Logo</a>
          </div>
          <div class="collapse navbar-collapse navLogo_bot" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="navLogo_bot"><a href="./trangchu.php">Trang chủ</a></li>
              <li><a data-toggle="dropdown" href="#">Tính chỉ số</a></li>
              <li><a href="./updatethucdon.php">Xem thực đơn</a></li>
              <li><a href="./trangchu.php?page_layout=food">Ẩm thực Việt</a></li>
              <li><a href="#">Tin tức</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left navbar-left__search" action="/action_page.php">
                <div class="form-group form-group">
                  <input type="text" class="form-control" placeholder="Search" name="search">
                </div>
                <button type="submit" class="btn btn-default">Tìm kiếm</button>
              </form>
            </ul>
          </div>
        </div>
      </nav>
  <?php 
    if(isset($_GET["page_layout"])){ 
      switch ($_GET["page_layout"]) {
        case 'food': include_once './food.php';break;
        case 'tinhBMI': include_once './tinhBMI.php';break;
        case 'tinhBMR': include_once './tinhBMR.php';break;
        case 'tinhcalo': include_once './tinhcalo.php';break;
        case 'tylemo': include_once './tylemo.php';break;
      }
    }
    else{
      include_once './gioithieu.php';
    }
  ?>

    <div class="footer">
      <div class="footer1">
        <div class="container-fluid">
          <div class="container ">
            <div class="row">
              <div class="col-sm-4">
                <h2>Địa chỉ</h2><p>
                <div class="myframegmap"> 
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d739.0754152821385!2d105.8443923755125!3d21.004399524438448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ed86bf1f%3A0xfaa06dbc3dcfbbb5!2zR2nhuqNuZyDEkcaw4budbmcgRDUsIELDo2kgZ-G7rWkgeGUsIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1643093403568!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div></p><br>
              </div>
            <div class="col-sm-4">
              <h2>Chăm sóc khách hàng</h2>
              <p>
                <i class="fa fa-home"></i> <a href="#">Giới thiệu</a><br>
                <i class="fa fa-user-o"></i> <a href="#">Trung tâm trợ giúp</a><br>
                <i class="fa fa-map-marker"></i> <a href="#">Hướng dẫn</a><br>
                <i class="fa fa-briefcase"></i> <a href="#">Điều khoản & dịch vụ</a><br>
              </p>
            </div>
            <div class="col-sm-4 ">
              <h2>Liên Hệ</h2>
              <p>
                <i class="fa fa-phone"></i> <a href="SĐT:0123456789"> 0123456789</a><br>
                <i class="fa fa-envelope"></i> <a href="mailto:aebk@gmail.com"> aebk@gmail.com</a><br>
                <i class="fa fa-map-marker"></i>  D5-502 Đại Học Bách Khoa Hà Nội
              </p>
              <br>
            </div>
          </div>
            <div class="clear30"></div>
        </div>
        </div>
      </div>
        
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
    <script src="./js/menu.js"></script>
</body>
</html>