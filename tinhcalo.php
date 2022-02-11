

      <div class="tinhchiso">
        <div class="container-fluid">
          <div class="row content">
            <div class="col-sm-3 sidenav tinhchiso_menu">
              <ul class="nav nav-pills nav-stacked tinhchiso_list">
                <li class="tinhchiso_item"><a href="./trangchu.php?page_layout=tinhBMI">Tính BMI</a></li>
                <li class="tinhchiso_item"><a href="./trangchu.php?page_layout=tinhBMR">Tính BMR</a></li>
                <li class="tinhchiso_item"><a href="./trangchu.php?page_layout=tylemo">Tỷ lệ mỡ cơ thể</a></li>
                <li class="active tinhchiso_item"><a href="trangchu.php?page_layout=tinhcalo">Calo cơ thể cần/ngày</a></li>
                <li class="tinhchiso_item"><a href="#section3">Lượng nước cần/ngày </a></li>
              </ul><br>
            </div>
            <div class="col-sm-9 Calo_form">
              <form action="/action_page.php">
                <table class="table Calo_table">
                    <thead>
                      <tr>
                        <th class="BMI_tieude">Tính lượng calo cần cho cơ thể</th>
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
                            <div class="form-group">
                              <label for="text">Tần suất vận động:</label>
                              <select class="form-control input-sm" id="sel3" name="Fvd">
                                <option>Người ít vận động (thường là người lớn tuổi, người làm việc văn phòng)</option>
                                <option>Người vận động nhẹ (người tập thể dục thể thao 1 - 3 lần/tuần)</option>
                                <option>Người vận động vừa (người vận động hàng ngày, luyện tập 3 - 5 lần/tuần)</option>
                                <option>Người vận động nặng (người lao động chân tay nhiều, di chuyển thường xuyên, vận động thường xuyên, tập luyện và chơi thể dục thể thao từ 6 - 7 lần/ tuần)</option>
                                <option>Người vận động rất nặng (người lao động phổ thông, vận động viên tập luyện thể dục thể thao 2 lần/ngày)</option>
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
                <p>Lượng calories cơ thể cần/ngày</p>
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
          var tuoi, canNang, chieuCao, gioiTinh, BMR, F, R, TDEE;
          $(".tinh_toan").click(function(event) {
            tuoi = $(".Calo_table [name='tuoi']").val();
            canNang = $(".Calo_table [name='cannang']").val();
            chieuCao = $(".Calo_table [name='chieucao']").val();
            gioiTinh = $(".Calo_table [name='gender']").val();
            F = $(".Calo_table [name='Fvd']").val()
            if(gioiTinh == 'nam'){
              BMR = (13.397 * canNang) + (4.799 * chieuCao) - (5.677 * tuoi) + 88.362;
            }
            if (gioiTinh == 'nữ') {
              BMR = (9.247 * canNang) + (3.098 * chieuCao) - (4.330 * tuoi) + 447.593;
            }
            if(F == 'Người ít vận động (thường là người lớn tuổi, người làm việc văn phòng)'){
              R = 1.2;
            }
            if (F == 'Người vận động nhẹ (người tập thể dục thể thao 1 - 3 lần/tuần)') {
              R = 1.375;
            }
            if (F == 'Người vận động vừa (người vận động hàng ngày, luyện tập 3 - 5 lần/tuần)') {
              R = 1.55;
            }
            if (F == 'Người vận động nặng (người lao động chân tay nhiều, di chuyển thường xuyên, vận động thường xuyên, tập luyện và chơi thể dục thể thao từ 6 - 7 lần/ tuần)') {
              R = 1.725;
            }
            if (F == 'Người vận động rất nặng (người lao động phổ thông, vận động viên tập luyện thể dục thể thao 2 lần/ngày)') {
              R = 1.9;
            }
            TDEE = BMR*R;
            TDEE = +TDEE.toFixed(0);
            $(".BMR_ketqua2").html(TDEE);
            $(".BMR_ketqua").hide();
            $(".BMR_ketqua").show();
          });
        });
      </script>
