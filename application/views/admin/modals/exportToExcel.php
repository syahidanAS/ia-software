<!-- Modal -->
<div class="modal fade" id="addEmployee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Export Absensi</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/exportExcel') ?>" method="post" enctype="multipart/form-data">
                    <div class="container my-4">
                        <label for="">Dari: </label>
                        <input class="form-control" type="date" id="from" name="from" require>
                        <label for="">Sampai: </label>
                        <input class="form-control" type="date" id="to" name="to" require>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <input class="btn btn-success" type="submit" name="btn" value="Ekspor" />
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