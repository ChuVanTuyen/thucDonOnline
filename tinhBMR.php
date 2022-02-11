
      <div class="tinhchiso">
        <div class="container-fluid">
          <div class="row content">
            <div class="col-sm-3 sidenav tinhchiso_menu">
              <ul class="nav nav-pills nav-stacked tinhchiso_list">
                <li class="tinhchiso_item"><a href="./trangchu.php?page_layout=tinhBMI">Tính BMI</a></li>
                <li class="active tinhchiso_item"><a href="./trangchu.php?page_layout=tinhBMR">Tính BMR</a></li>
                <li class="tinhchiso_item"><a href="./trangchu.php?page_layout=tylemo">Tỷ lệ mỡ cơ thể</a></li>
                <li class="tinhchiso_item"><a href="trangchu.php?page_layout=tinhcalo">Calo cơ thể cần/ngày</a></li>
                <li class="tinhchiso_item"><a href="#section3">Lượng nước cần/ngày </a></li>
              </ul><br>
            </div>
            <div class="col-sm-9 BMR_form">
              <form action="/action_page.php">
                <table class="table BMR_table">
                    <thead>
                      <tr>
                        <th class="BMI_tieude">Tính lượng calo tối thiểu cần thiết/ngày</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <form action="/action_page.php">
                            <div class="form-group">
                              <label for="text">Tuổi:</label>
                              <input type="text" class="form-control" id="text" name="tuoi">
                            </div>
                            <div class="form-group">
                              <label for="text">Cân nặng:</label>
                              <input type="text" class="form-control" id="text" placeholder="kg" name="cannang">
                            </div>
                            <div class="form-group">
                              <label for="text">Chiều cao:</label>
                              <input type="text" class="form-control" id="text" placeholder="cm" name="chieucao">
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
                <p>Lượng calories tối thiểu cần thiết/ngày</p>
                <p><span class="BMR_ketqua2">1400</span>calories</p>
              </div>
              <div class="baiviet">
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          var tuoi, canNang, chieuCao, gioiTinh, BMR;
          $(".tinh_toan").click(function(event) {
            tuoi = $(".BMR_table [name='tuoi']").val();
            canNang = $(".BMR_table [name='cannang']").val();
            chieuCao = $(".BMR_table [name='chieucao']").val();
            gioiTinh = $(".BMR_table [name='gender']").val();
            if(gioiTinh == 'nam'){
              BMR = (13.397 * canNang) + (4.799 * chieuCao) - (5.677 * tuoi) + 88.362;
            }
            else if (gioiTinh == 'nữ') {
              BMR = (9.247 * canNang) + (3.098 * chieuCao) - (4.330 * tuoi) + 447.593;
            }
            BMR = +BMR.toFixed(0);
            $(".BMR_ketqua2").html(BMR);
            $(".BMR_ketqua").hide();
            $(".BMR_ketqua").show();
          });
        });
      </script>
