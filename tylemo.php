
      <div class="tinhchiso">
        <div class="container-fluid">
          <div class="row content">
            <div class="col-sm-3 sidenav tinhchiso_menu">
              <ul class="nav nav-pills nav-stacked tinhchiso_list">
                <li class="tinhchiso_item"><a href="./trangchu.php?page_layout=tinhBMI">Tính BMI</a></li>
                <li class="tinhchiso_item"><a href="./trangchu.php?page_layout=tinhBMR">Tính BMR</a></li>
                <li class="active tinhchiso_item"><a href="./trangchu.php?page_layout=tylemo">Tỷ lệ mỡ cơ thể</a></li>
                <li class="tinhchiso_item"><a href="trangchu.php?page_layout=tinhcalo">Calo cơ thể cần/ngày</a></li>
                <li class="tinhchiso_item"><a href="#section3">Lượng nước cần/ngày </a></li>
              </ul><br>
            </div>
            <div class="col-sm-9 TL_form">
              <form action="/action_page.php">
                <table class="table TL_table">
                    <thead>
                      <tr>
                        <th class="BMI_tieude">Tính tỷ lệ mỡ cơ thể</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <form action="/action_page.php">
                            <div class="form-group">
                              <label for="text">Cân nặng:</label>
                              <input type="text" class="form-control" id="text" placeholder="kg" name="cannang">
                            </div>
                            <div class="form-group">
                              <label for="text">Vòng eo:</label>
                              <input type="text" class="form-control" id="text" placeholder="cm" name="vongeo">
                            </div>
                            <div class="form-group">
                              <label for="text">Giới tính:</label>
                              <select class="form-control input-sm" id="sel3" name="gender">
                                <option>nam</option>
                                <option>nữ</option>
                              </select>
                            </div>
                            <div class="form-group submit_btn tt_nl-btn">
                              <button type="button" class="btn btn-success tinh_toan">Tính toán</button>
                              <button type="button" class="btn btn-danger nhap_lai" onclick="location.reload();">Nhập lại</button>
                            </div>
                          </form>
                        </td>
                      </tr>      
                    </tbody>
                  </table>
              </form>
              <div class="BMR_ketqua">
                <p>Tỷ lệ mỡ cơ thể là:</p>
                <p><span class="tylemo_ketqua">1400</span>%</p>
              </div>
              <div class="baiviet">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    <script>
      $(document).ready(function() {
        var canNang, eo, gioiTinh, T;
        $(".tinh_toan").click(function(event) {
          canNang = $(".TL_table [name='cannang']").val()*2.2;
          eo = $(".TL_table [name='vongeo']").val()/2.54;
          gioiTinh = $(".TL_table [name='gender']").val();
          if(gioiTinh == 'nam'){
            T = (4.15*eo - 98.42 - 0.082*canNang)/canNang * 100;//công thức YMCA
          }
          else if (gioiTinh == 'nữ') {
            T = (4.15*eo - 76.76 - 0.082*canNang)/canNang * 100;
          }
          T = +T.toFixed(4);
          $(".tylemo_ketqua").html(T);
          $(".BMR_ketqua").hide();
          $(".BMR_ketqua").show();
        });
      });
    </script>
