<!-- Modal -->
<?php $no = 0;
foreach ($positions as $pos) : $no++ ?>
    <div class="modal fade" id="posEdit<?php echo $pos->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>DETAIL || Ubah Jabatan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo site_url('Admin/updatePosition') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id" value="<?php echo $pos->id ?>" hidden>
                        </div>
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input class="form-control" type="text" name="position_name" value="<?php echo $pos->position_name ?>" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>