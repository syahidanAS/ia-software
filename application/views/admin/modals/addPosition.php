<!-- Modal -->
<div class="modal fade" id="addEmployee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">JABATAN BARU</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Admin/savePosition') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input class="form-control" id="uid" type="text" name="position_name" placeholder="Nama Jabatan" required>
                    </div>
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