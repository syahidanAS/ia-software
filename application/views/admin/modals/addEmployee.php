<!-- Modal -->
<div class="modal fade" id="addEmployee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-light" style="background-color: #063F8C; text-align:center;">
        <h5 class="modal-title" id="staticBackdropLabel">PEGAWAI BARU</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('Admin/saveEmployee') ?>" method="post" enctype="multipart/form-data">

          <table class="table table-bordered" style="background-color: #f5f5f5;">
            <thead>
              <tr style=" text-align: center;">
                <th class=" text-dark">
                  <p>Biodata Pegawai</p>
                </th>
                <th class=" text-dark">
                  <p>Data Kepegawaian</p>
                </th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>
                  <div class="form-group">
                    <label>Id Kartu</label>
                    <input class="form-control" id="uid" style="background: #d6d4d4;" type="text" name="uid" placeholder="SILAHKAN SCAN KARTU" readonly required>
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="name" maxlength="50" required style="background: #ededed;" />
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <br>
                    <input type="radio" id="male" name="gender" value="male">
                    <label class="mr-2" for="male">Laki-laki</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Perempuan</label><br>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" type="text" name="address" maxlength="700" style="background: #ededed;" required></textarea>
                  </div>
                </td>


                <td>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" id="position" name="position_id" style="background: #ededed;">
                      <?php $no = 0;
                      foreach ($positions as $pos) {
                        $no++ ?>
                        <option value="<?php echo $pos->id ?>"><?php echo $pos->position_name ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $('#addEmployee').on('shown.bs.modal', function() {
    $('#addEmployee').trigger('focus')
  })
</script>