<?php 
  ob_start();
  session_start();
  include_once '../connect.php';

  if($_SESSION["adname"] ==''){
    header('location: dangxuat.php');
  }
?>
<?php 
if(isset($_POST["submit"])){
  $menuid = $_GET["menuid"];
  $menuname = $_POST["menuname"];
  $dotuoi = $_POST["dotuoi"];
  $trangthai = $_POST["trangthai"];

  // Kiểm tra có dữ liệu fileupload trong $_FILES không
  // Nếu không có thì dừng
  if(!isset($_FILES["fileupload"])){
          $sql = "UPDATE menu SET name = '$menuname', luatuoi = '$dotuoi',trangthai = '$trangthai' WHERE id = '$menuid'";
      $query = mysqli_query($conn, $sql);
      header('location: ./danhsachthucdon.php');
  }
if($_POST["menuname"]!="" && isset($_FILES["fileupload"])){
  $sql = "DELETE FROM xep_hang WHERE menu_id='$menuid'";//xóa tất cả đánh giá của thực đơn cũ
  $query = mysqli_query($conn, $sql);
  $sql = "SELECT * FROM menu WHERE id = '$menuid'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  
  unlink(".".$row["noidung"]);
  
  // Kiểm tra dữ liệu có bị lỗi không
  if ($_FILES["fileupload"]['error'] != 0){

      $sql = "UPDATE menu SET name = '$menuname', luatuoi = '$dotuoi',trangthai = '$trangthai' WHERE id = '$menuid'";
      $query = mysqli_query($conn, $sql);
      header('location: ./danhsachthucdon.php');
  }
  else{
  // Đã có dữ liệu upload, thực hiện xử lý file upload

  //Thư mục bạn sẽ lưu file upload
  $target_dir    = "../data/";
  //Vị trí file lưu tạm trong server (file sẽ lưu trong data, với tên giống tên ban đầu)
  $target_file   = $target_dir.basename($_FILES["fileupload"]["name"]);

  $allowUpload   = true;

  //Lấy phần mở rộng của file (jpg, png, ...)
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


  ////Những loại file được phép upload
  $allowtypes    = array('pdf');

  // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
  // Bạn có thể phát triển code để lưu thành một tên file khác
  if (file_exists($target_file))
  {
      echo "Tên file đã tồn tại trên server, không được ghi đè";
      $allowUpload = false;
  }

  // Kiểm tra kiểu file
  if (!in_array($imageFileType,$allowtypes))
  {
      echo "Chỉ được upload các định dạng pdf";
      $allowUpload = false;
  }


  if ($allowUpload)
  {
      // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file

      if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)){
        $menulink = "./data/".$_FILES["fileupload"]["name"];
        $sql = "UPDATE menu SET name = '$menuname', luatuoi = '$dotuoi',trangthai = '$trangthai', noidung='$menulink' WHERE id = '$menuid'";
        $query = mysqli_query($conn, $sql);
        header('location: ./danhsachthucdon.php');

      }
      else{
          echo "Có lỗi xảy ra khi upload file.";
      }
  }
}
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
            <div class="dm_quantri-item"><a href="" style="width: 100%;">Quản lý tài khoản</a></div>
            <div class="dm_quantri-item"><a href="./danhsachthucdon.php" >Quản lý thực đơn</a></div>
            <div class="dm_quantri-item"><a href="">quản lý danh mục ẩm thực Việt</a></div>
            <div class="dm_quantri-item"><a href="">quản lý món ăn</a></div>
            
          </div>
        </div>
      
        <div class="col-sm-9"> 
<div class="quanly_thucdon" style="background-color: #fff; padding: 10px; border-radius: 5px;">
            <h1>Sửa thực đơn</h1>
            <form action="./suathucdon.php?menuid=<?php echo $_GET["menuid"];?>" method="POST" enctype="multipart/form-data">
              <p>Tên thực đơn:</p>
              <?php if(isset($_POST["submit"])){if($_POST["menuname"]=="" ){echo '<p style="color: red;">Bạn chưa nhập tên thực đơn</p>';}} ?>
              <input type="text" name="menuname" class="form-control menuname" value="<?php echo $_GET["namemenu"];?>"><br>
              <p>Độ tuổi:</p>
              <select class="form-control" name="dotuoi">
              <option <?php if($_GET["luatuoi"] == 'Trẻ em'){echo 'selected="selected"';}?>>Trẻ em</option>
              <option <?php if($_GET["luatuoi"] == 'Trưởng thành'){echo 'selected="selected"';}?>>Trưởng thành</option>
              <option <?php if($_GET["luatuoi"] == 'Bô lão'){echo 'selected="selected"';}?>>Bô lão</option>
              </select><br>
              <p>Trạng thái:</p>
              <select class="form-control" name="trangthai" value="<?php echo $_GET["trangthai"];?>">
              <option <?php if($_GET["trangthai"] == 'Thiếu cân'){echo 'selected="selected"';}?>>Thiếu cân</option>
              <option <?php if($_GET["trangthai"] == 'Bình thường'){echo 'selected="selected"';}?>>Bình thường</option>
              <option <?php if($_GET["trangthai"] == 'Thừa cân'){echo 'selected="selected"';}?>>Thừa cân</option>
              </select><br>
              <p>Chọn file:</p>

              <input type="file" name="fileupload" id="fileupload" class="form-control"><br>
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