<!-- Modal -->
<div class="modal fade" id="izinModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-light" style="background-color:#063F8C;">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Izin</b></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #e6e6e6;">
                <?php echo form_open_multipart('admin/pushIzin') ?>
                <div class="container my-4">
                    <label for="">Nama Pegawai: </label>
                    <select class="form-control" id="uid" name="uid" class="form-control" style="background-color: #fff;">
                        <?php foreach ($employees as $emp) { ?>
                            <option value="<?php echo $emp->uid ?>"><?php echo $emp->name ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label for="">Untuk Tanggal: </label>
                    <input class="form-control" type="date" id="tgl" name="tgl" require style="background-color: #fff;">
                    <br>
                    <label for="">Surat/bukti dispensasi: </label>
                    <a class="text-danger text-sm" style="font-size: 13px;">*Format file (JPG,PNG,PDF)</a>
                    <input type="file" placeholder="Caption" class="form-control" name="foto" id="foto" style="background-color: #fff;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


<script>
    $('#izinModal').on('shown.bs.modal', function() {
        $('#izinModal').trigger('focus')
    })
</script>