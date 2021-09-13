<!-- Modal -->
<?php $no = 0;
foreach ($operationalHour as $u) : $no++ ?>
    <div class="modal fade" id="operationalHour<?php echo $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-m" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>JAM OPERASIONAL</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo site_url('Admin/updateOperational') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id" value="<?php echo $u->id ?>" hidden>
                        </div>
                        <!-- <div style="margin-left: 16%;">
                            <p href="" class="badge badge-info" style="font-size:0.89rem;">Jam Masuk: <?php echo $u->attendance_in ?></p>

                            <p href="" class="badge badge-info" style="font-size:0.89rem;">Jam Keluar: <?php echo $u->attendance_out ?></p>
                        </div> -->
                        <div class="form-group">
                            <label>Jam Masuk</label>
                            <input class="form-control" type="time" name="attendance_in" value="<?php echo $u->attendance_in ?>" required />
                        </div>

                        <div class="form-group">
                            <label>Jam Keluar</label>
                            <input class="form-control" type="time" name="attendance_out" value="<?php echo $u->attendance_out ?>" required />
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <input class="btn btn-success" type="submit" name="btn" value="Perbaharui" />
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    $('#operationalHour').on('shown.bs.modal', function() {
        $('#operationalHour').trigger('focus')
    })
</script>