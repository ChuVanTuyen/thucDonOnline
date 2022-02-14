
<?php 
  ob_start();
  session_start();
  include_once '../connect.php';

  if($_SESSION["adname"] ==''){
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
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" href="../fonts/fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" href="../css/quangtri.css">
    <script>
      function xoaThucDon(){
        var conf = confirm("Bạn có muốn xóa thực đơn này không?");
        return conf;
      }
    </script>
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

<?php
if(isset($_GET["page"])){
  $page=$_GET["page"];
}
else{
  $page = 1;
}
$rowsPerPage = 5;
$perRow = $page * $rowsPerPage-$rowsPerPage;

$sql = "SELECT * FROM menu ORDER BY id ASC LIMIT $perRow,$rowsPerPage";
$query = mysqli_query($conn, $sql);
$totalRow=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM menu"));
$totalPages = ceil($totalRow/$rowsPerPage);
$listPage="";
for($i = 1; $i<=$totalPages; $i++){
  if($page==$i){
    $listPage.='<li class="page-item active"><a class="page-link" href="./danhsachthucdon.php?page='.$i.'">'.$i.'</a></li>';
  }
  else{
    $listPage.='<li class="page-item"><a class="page-link" href="./danhsachthucdon.php?page='.$i.'">'.$i.'</a></li>';
  }
}

?>
<div class="danhsachthucdon">
    <h1 style="text-align:center;">Danh sách thực đơn</h1>
    <a href="./themthucdon.php" class="themthucdonlink"><span>Thêm thực đơn</span></a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên thực đơn</th>
          <th>Độ tuổi</th>
          <th>Trạng thái</th>
          <th>Sửa</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($rows = mysqli_fetch_assoc($query)){?>
        <tr>
          <td><?php $id = $rows["id"]; echo $rows["id"]; ?></td>
          <td><?php $name = $rows["name"]; echo $rows["name"]; ?></td>
          <td><?php $luatuoi = $rows["luatuoi"]; echo $rows["luatuoi"]; ?></td>
          <td><?php $trangthai = $rows["trangthai"]; echo $rows["trangthai"]; ?></td>
          <td><a href="./suathucdon.php?<?php echo "menuid=".$id."&namemenu=".$name."&luatuoi=".$luatuoi."&trangthai=".$trangthai;?>"><i class="fa-solid fa-wrench icon_update"></i></a></td>
          <td><a onclick="return xoaThucDon();" href="./xoathucdon.php?<?php echo "menuid=".$id;?>"><i class="fa-solid fa-trash-can icon_delete"></i></a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <div class="trang">
      <nav aria-label="Something">
        <ul class="pagination justify-content-end bg-light" style="margin-left: 290px;">
          <?php
          echo $listPage;
          ?>
        </ul>
     </nav>
    </div>
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