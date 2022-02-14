<?php 
  ob_start();
  session_start();
  include_once '../connect.php';

  if($_SESSION["adname"] ==''){
    header('location: dangxuat.php');
  }
  $menuid = $_GET["menuid"];
  $sql = "SELECT noidung FROM menu WHERE id='$menuid'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM xep_hang WHERE menu_id='$menuid'";// xóa tất cả đánh giá về thực đơn cũ
  $query = mysqli_query($conn, $sql);
  $sql = "DELETE FROM menu WHERE id='$menuid'";//xóa thực đơn
  $query = mysqli_query($conn, $sql);
  
  unlink(".".$row["noidung"]);
  
  header('location: ./danhsachthucdon.php');
?>