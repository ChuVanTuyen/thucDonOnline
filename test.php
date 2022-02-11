<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php  
    session_start();// khai báo sử dụng session
    include_once './connect.php';
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);
    if(isset($_COOKIE["menu"])){
      echo $_COOKIE["menu"];
    }
    else{
      $BMI = $rows["cannang"] / $rows["chieucao"]/$rows["chieucao"]*100*100;
      if($rows["tuoi"] < 17){
        $dt = 'trẻ em';
      }
     elseif ($rows["tuoi"] > 70) {
      $dt = 'bô lão';
    }
    else{
      $dt = 'trưởng thành';
    }
    if($BMI < 18.5){
      $tt = 'thiếu cân';
    }
    elseif ($rows["tuoi"] >= 25) {
      $tt = 'thừa cân';
    }
    else{
      $tt = 'bình thường';
    }
    $sql1 = "SELECT noidung FROM menu  WHERE luatuoi='$dt' AND trangthai='$tt' ORDER BY RAND() LIMIT 1";
    $result1 = mysqli_query($conn, $sql1);
    $rows1 = mysqli_fetch_array($result1);
    
    setcookie("menu", $rows1["noidung"], time()+60);
    echo $_COOKIE["menu"];
    }
    echo '<input class="userstar userstar-5" id="userstar-5" type="radio" checked="checked" name="userstar"/>';
    
  ?>
</body>
</html>