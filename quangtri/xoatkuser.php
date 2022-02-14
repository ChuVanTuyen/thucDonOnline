<?php 
  ob_start();
  session_start();
  include_once '../connect.php';

  if($_SESSION["adname"] ==''){
    header('location: dangxuat.php');
  }
  $id = $_GET["userid"];
  $sql = "DELETE FROM user WHERE id='$id'";// xóa tất cả đánh giá về thực đơn cũ
  $query = mysqli_query($conn, $sql);
  
  header('location: ./danhsachnguoidung.php');
?>