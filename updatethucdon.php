<?php 
  ob_start();
  session_start();
  include_once './connect.php';
  if($_SESSION["username"]==''){
    header('location: dangxuat.php');
  }
  $id = $_SESSION["id"];
  if(isset($_POST["submit"])){
    if(isset($_POST["fullname"]) && isset($_POST["gender"]) && isset($_POST["age"]) && isset($_POST["weight"]) && isset($_POST["height"])){
      $fullname = $_POST["fullname"];
      $gender = $_POST["gender"];
      $age = $_POST["age"];
      $weight = $_POST["weight"];
      $height = $_POST["height"];
      $sql = "UPDATE user SET hoten = '$fullname', gioitinh = '$gender', tuoi = '$age', cannang = '$weight', chieucao = '$height' WHERE user.id = '$id';";
      mysqli_query($conn, $sql);
      header('location: updatethucdon.php');
    }
  }

  $sql = "SELECT * FROM user WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_array($result);

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

    <script src="./js/menu.js"></script>
    <title>Document</title>
</head>
<body style="background-color: #eff0f1;">
    <div class="jumbotron header_main-nav">
        <nav class="navbar navbar-inverse navbar-inverse-color header_main-nav">
          <div class="container-fluid container-fluid-color">
            <div class="navbar-header">
              <a class="navbar-brand navbar-nav-text_color" href="./trangchu.php">ThucDonOnline</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./updatethucdon.php"><span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?></a></li>
                <li><a href="./dangxuat.php"><span class="glyphicon glyphicon-log-in"></span> ????ng xu???t</a></li>
            </ul>
          </div>
        </nav>
        <div class="container text-center header_main">
          <div>
            <h1>healthy and balanced</h1>
            <h4>H??y s??? d???ng d???ch v??? c???a ThucDonOnline ????? c?? ???????c 1 th???c ????n khoa h???c!</h4>
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
              <li class="navLogo_bot"><a href="./trangchu.php">Trang ch???</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">T??nh ch??? s??? <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="Menu">
                    <li><a href="./trangchu.php?page_layout=tinhBMI">T??nh BMI</a></li>
                    <li><a href="./trangchu.php?page_layout=tinhBMR">T??nh BMR</a></li>
                    <li><a href="./trangchu.php?page_layout=tylemo">T??? l??? m??? c?? th???</a></li>
                    <li><a href="./trangchu.php?page_layout=tinhcalo">Calo c?? th??? c???n/ng??y</a></li>                     
                  </ul>
                </li>
              <li class="active"><a href="./updatethucdon.php">Xem th???c ????n</a></li>
            </ul>
          </div>
        </div>
      </nav>
      
    <div class="noidungweb">
      <div  class="container">
        <div class="row infomation">
          <div class="col-sm-2 info_img">
            <img src="./img/Screenshot 2022-01-17 074805.png" class="img-circle cangiua" alt="Cinque Terre" width="80%">
          </div>
          <div class="col-sm-3 container_info"> 
            <div class="infor">
              <p>H??? v?? T??n: <span name="fullname"><?php echo $rows["hoten"]; ?></span></p>
              <p>Gi???i t??nh: <span name="gender"><?php if($rows["gioitinh"]==NULL){echo "ch??a c?? th??ng tin";}else{echo $rows["gioitinh"];} ?></span></p>
              <p>Tu???i: <span name="age"><?php if($rows["tuoi"]==NULL){echo "ch??a c?? th??ng tin";}else{echo $rows["tuoi"];} ?></span></p>
              <p>C??n n???ng: <span name="weight"><?php if($rows["cannang"]==NULL){echo "ch??a c?? th??ng tin";}else{echo $rows["cannang"];} ?></span> kg</p>
              <p>Chi???u cao: <span name="height"><?php if($rows["chieucao"]==NULL){echo "ch??a c?? th??ng tin";}else{echo $rows["chieucao"];} ?></span> cm</p>
              <button type="button" class="btn btn-danger update">C???p nh???t</button>
              <br/>
            </div>
          </div>
          <div class="col-sm-7 info_result">
            <div class="row cangiua">
              <div class="info_bmi col-sm-4">
                <?php 
                if($rows["cannang"] != NULL && $rows["cannang"] > 0 && $rows["chieucao"] !=NULL && $rows["chieucao"]> 0 ){
                  $BMI =  $rows["cannang"]/($rows["chieucao"]/100*$rows["chieucao"]/100);
                  $BMI = round($BMI, 1);
                  if($rows["tuoi"] < 17){
                    $dt = 'tr??? em';
                  }
                  elseif ($rows["tuoi"] > 70) {
                    $dt = 'b?? l??o';
                  }
                  else{
                    $dt = 'tr?????ng th??nh';
                  }
                  if($BMI < 18.5){
                    $tt = 'thi???u c??n';
                  }
                  elseif ($BMI > 25) {
                    $tt = 'th???a c??n';
                  } 
                  else{
                    $tt = 'b??nh th?????ng';
                  }
                  if($BMI < 18.5){
                    echo "<p style='color: #f0ad4e;font-size: 2.4rem;font-weight: 500;'>Ch??? s??? BMI</p><p style='font-size:5rem;'>$BMI</p>";
                  }
                  if($BMI <= 25 && $BMI >= 18.5){
                    echo "<p style='color: #08a908;font-size: 2.4rem;font-weight: 500;'>Ch??? s??? BMI</p><p style='font-size:5rem;'>$BMI</p>";
                  }
                  if($BMI > 25){
                    echo "<p style='color: red;font-size: 2.4rem;font-weight: 500;'>Ch??? s??? BMI</p><p style='font-size:5rem;'>$BMI</p>";
                  }
                ?>

              </div>
              <div class="info_evaluate col-sm-8">
                <?php 
                if($BMI < 18.5){
                    echo "<p style='color: #f0ad4e;font-size: 2.4rem;font-weight: 500;'>Thi???u c??n</p><p style='font-size: 1.6rem;'>Tr???ng l?????ng c?? th??? hi???n t???i thi???u c??n, c???n ph???i c?? m???t ch??? ????? ??n u???ng ?????y ????? ch???t.
                    H??y th?????ng th?????ng xuy??n t???p luy???n th??? d???c th??? thao ????? c?? 1 c?? th??? s??n ch???c v?? kh???e m???nh. </p>";
                }
                else if($BMI <= 25 && $BMI >= 18.5){
                  echo "<p style='color: #08a908;font-size: 2.4rem;font-weight: 500;'>B??nh th?????ng</p><p style='font-size: 1.6rem;'>Ch??? s??? BMI n???m ??? trong ph???m vi b??nh th?????ng.C??? g???ng duy tr?? b??? sung ?????y ????? n?????c, 
                    h??y t???p th??? d???c nh??? sau khi ??n ????? duy tr?? v??c d??ng ?????p.</p>";
                }
                else{
                  echo "<p style='color: red;font-size: 2.4rem;font-weight: 500;'>Th???a c??n</p><p style='font-size: 1.6rem;'>Tr???ng l?????ng c?? th??? hi???n t???i th???a c??n, c???n ph???i c?? m???t ch??? ????? ??n u???ng h???p l??.
                  H??y tr??nh c??c th???c ph???m gi??u n??ng l?????ng nh?? c??c ????? ??n nhi???u d???u m???.
                  H???n ch??? ??n c??c ????? ??n v???t kh??ng c???n thi???t,...</p>";
                }
              }
              else{
                echo "<p style='color: #888;font-size: 2.4rem;font-weight: 500; margin: auto; width:400px'>Ch??a c?? th??ng tin!Vui l??ng c???p nh???t th??ng tin c???a b???n.</p>";}?>
              </div>
            </div>
          </div>
        </div>
        <!-- C???p nh???t th??ng tin c?? nh??n -->
        <div class="modal__body">
          <div class="modal__inner"></div>
          <div class="update-infor">
            <form action="./updatethucdon.php" method="POST">
              <p>H??? T??n:</p>
              <input type="text" class="form-control" name="fullname" value="<?php echo $rows['hoten'];?>">
              <p>Gi???i t??nh:</p>
              <select class="form-control" id="sel1" name="gender">
                <option>Nam</option>
                <option>N???</option>
              </select>
              <p>tu???i:</p>
              <input name="age" class="form-control">
              <p>C??n n???ng:</p>
              <input name="weight" class="form-control">
              <p>Chi???u cao:</p>
              <input name="height" class="form-control">
              <div class="btn">
                <button class="btn btn-success" name="submit">C???p nh???t</button>
                <button class="btn btn-danger cancel">H???y</button>
              </div>
            </form>
          </div>
        </div>
           
    <!-- B???ng th???c ????n ????? su???t -->
        <div class="thucdon">
          <?php
          if($rows["cannang"] != NULL && $rows["cannang"] > 0 && $rows["chieucao"]!=NULL && $rows["chieucao"]> 0 && $rows["tuoi"] !=NULL && $rows["tuoi"] > 0){
            if(!isset($_COOKIE["menu"])){
              $sql1 = "SELECT * FROM menu  WHERE luatuoi='$dt' AND trangthai='$tt' ORDER BY RAND() LIMIT 1";
              $result1 = mysqli_query($conn, $sql1);
              $rows1 = mysqli_fetch_array($result1);
              setcookie("menu_id", $rows1["id"], time()+60);
              setcookie("menu", $rows1["noidung"], time()+60);
              setcookie("rating", $rows1["rating"], time()+60);
              setcookie("luatuoi", $dt, time()+60);
              setcookie("trangthai", $tt, time()+60);
              header('location: ./updatethucdon.php');
            }
            if(isset($_COOKIE["menu"])){
              if($_COOKIE["luatuoi"] != $dt || $_COOKIE["trangthai"] != $tt){
                $sql1 = "SELECT * FROM menu  WHERE luatuoi='$dt' AND trangthai='$tt' ORDER BY RAND() LIMIT 1";
                $result1 = mysqli_query($conn, $sql1);
                $rows1 = mysqli_fetch_array($result1);
                var_dump($rows1["id"]);
                $menu_id = $rows1["id"];
                setcookie("menu", '', time()-60);
                setcookie("rating", '', time()-60);
                setcookie("menu_id", '', time()-60);
                setcookie("menu", $rows1["noidung"], time()+60);
                setcookie("rating", $rows1["rating"], time()+60);
                setcookie("menu_id", $rows1["id"], time()+60);
              }

            }
            if(isset($_POST["danhgia"])){
                  $star = $_POST["star"];
                  $menu_id=$_COOKIE["menu_id"];
                  $sqlstar = "SELECT user_id,menu_id,danh_gia  FROM xep_hang WHERE user_id = '$id' AND menu_id = '$menu_id'";
                  $result = mysqli_query($conn, $sqlstar);
                  $stnum = mysqli_num_rows($result);
                  
                  if($stnum > 0){
                    $sqlstar = "UPDATE xep_hang SET  danh_gia = $star WHERE user_id = '$id' AND menu_id = '$menu_id'";
                  }
                  else{
                    $sqlstar = "INSERT INTO xep_hang (user_id, menu_id, danh_gia) VALUES ('$id', '$menu_id', '$star')";
                  }
                  $result = mysqli_query($conn, $sqlstar);
                  $sqlstar = "SELECT *  FROM xep_hang WHERE menu_id = '$menu_id'";
                  $result = mysqli_query($conn, $sqlstar);
                  $rstar = mysqli_num_rows($result);
                  $stsum = 0;
                  while($rstar1 = mysqli_fetch_assoc($result)){
                    $stsum = $stsum + $rstar1["danh_gia"];
                  }
                  $sttb = $stsum/$rstar; $sttb = round($sttb,0);
                  $sqlstar = "UPDATE menu SET rating = '$sttb' WHERE id = '$menu_id'";
                  $result = mysqli_query($conn, $sqlstar);
                  setcookie("rating", '', time()-60);
                  setcookie("rating", $sttb, time()+60);
                  header('location: ./updatethucdon.php');
              }}
          ?>
          <iframe class="nd_thucdon" src="<?php echo $_COOKIE["menu"];?>" frameborder="0"></iframe>
          <div class="thucdon_danhgia">
            <div>
              <div class="userstars">
                <p>????nh gi?? c???a nh???ng ng?????i d??ng kh??c</p>
                <form action="">
                  <input class="userstar userstar-5" id="userstar-5" type="radio" <?php if(isset($_COOKIE["rating"])){if($_COOKIE["rating"] == 5){echo 'checked="checked"';}}?> name="userstar"/>
                  <label class="userstar userstar-5" for="userstar-5"></label>
                  <input class="userstar userstar-4" id="userstar-4" type="radio" <?php if(isset($_COOKIE["rating"])){if($_COOKIE["rating"] == 4){echo 'checked="checked"';}}?> name="userstar"/>
                  <label class="userstar userstar-4" for="userstar-4"></label>
                  <input class="userstar userstar-3" id="userstar-3" type="radio" <?php if(isset($_COOKIE["rating"])){if($_COOKIE["rating"] == 3){echo 'checked="checked"';}}?> name="userstar"/>
                  <label class="userstar userstar-3" for="userstar-3"></label>
                  <input class="userstar userstar-2" id="userstar-2" type="radio" <?php if(isset($_COOKIE["rating"])){if($_COOKIE["rating"] == 2){echo 'checked="checked"';}}?> name="userstar"/>
                  <label class="userstar userstar-2" for="userstar-2"></label>
                  <input class="userstar userstar-1" id="userstar-1" type="radio" <?php if(isset($_COOKIE["rating"])){if($_COOKIE["rating"] == 1){echo 'checked="checked"';}}?>name="userstar"/>
                  <label class="userstar userstar-1" for="userstar-1"></label>
                </form>
              </div>
              <?php
              $menu_id=$_COOKIE["menu_id"];
              $sqlstar = "SELECT danh_gia  FROM xep_hang WHERE user_id = '$id' AND menu_id = '$menu_id'";
              $result = mysqli_query($conn, $sqlstar);
              $stnum1 = mysqli_fetch_array($result);// gia tr??? ng?????i d??ng ??ang ????nh gi??
              ?>
              <div class="stars">
                <p>????nh gi?? c???a b???n v??? th???c ????n n??y</p>
                <form action="./updatethucdon.php" method="POST">
                  <input class="star star-5" id="star-5" type="radio" <?php if(isset($stnum1["danh_gia"])){if($stnum1["danh_gia"] == 5){echo 'checked="checked"';}}?> value="5" name="star"/>
                  <label class="star star-5" for="star-5"></label>
                  <input class="star star-4" id="star-4" type="radio" <?php if(isset($stnum1["danh_gia"])){if($stnum1["danh_gia"] == 4){echo 'checked="checked"';}}?> value="4" name="star"/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-3" id="star-3" type="radio" <?php if(isset($stnum1["danh_gia"])){if($stnum1["danh_gia"] == 3){echo 'checked="checked"';}}?> value="3" name="star"/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-2" id="star-2" type="radio" <?php if(isset($stnum1["danh_gia"])){if($stnum1["danh_gia"] == 2){echo 'checked="checked"';}}?> value="2" name="star"/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-1" id="star-1" type="radio" <?php if(isset($stnum1["danh_gia"])){if($stnum1["danh_gia"] == 1){echo 'checked="checked"';}}?> value="1" name="star"/>
                  <label class="star star-1" for="star-1"></label>
                  <button type="submit" class="btn btn-danger danhgia" name="danhgia">????nh gi??</button>
                </form>
              </div>
            </div>
          </div>
          <div class="thucdon_danhgia1">Th???c ????n tham kh???o</div>
          <div class="thucdon_danhgia2"></div>
          <div class="thucdon_danhgia3"></div>
          
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="footer1">
        <div class="container-fluid">
          <div class="container ">
            <div class="row">
              <div class="col-sm-4">
                <h2>?????a ch???</h2><p>
                <div class="myframegmap"> 
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d739.0754152821385!2d105.8443923755125!3d21.004399524438448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ed86bf1f%3A0xfaa06dbc3dcfbbb5!2zR2nhuqNuZyDEkcaw4budbmcgRDUsIELDo2kgZ-G7rWkgeGUsIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1643093403568!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div></p><br>
              </div>
            <div class="col-sm-4">
              <h2>Ch??m s??c kh??ch h??ng</h2>
              <p>
                <i class="fa fa-home"></i> <a href="#">Gi???i thi???u</a><br>
                <i class="fa fa-user-o"></i> <a href="#">Trung t??m tr??? gi??p</a><br>
                <i class="fa fa-map-marker"></i> <a href="#">H?????ng d???n</a><br>
                <i class="fa fa-briefcase"></i> <a href="#">??i???u kho???n & d???ch v???</a><br>
              </p>
            </div>
            <div class="col-sm-4 ">
              <h2>Li??n H???</h2>
              <p>
                <i class="fa fa-phone"></i> <a href="S??T:0123456789"> 0123456789</a><br>
                <i class="fa fa-envelope"></i> <a href="mailto:aebk@gmail.com"> aebk@gmail.com</a><br>
                <i class="fa fa-map-marker"></i>  D5-502 ?????i H???c B??ch Khoa H?? N???i
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
                <div class="col-sm-12 text-center"><p><strong>HaNoi ?? 2021-2022 Project application software engineering.</strong></p></div>
                <div class="clear30"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>