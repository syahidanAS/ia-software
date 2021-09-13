<style>
    .show-on-hover:hover>ul.dropdown-menu {
        display: block;
    }
</style>

<div class="panel-header panel-header-sm">

</div>

<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn" data-toggle="modal" data-target="#addEmployee">
                        <i class="fa fa-file-excel fa-lg"><span class="m-2">Export</span></i>
                    </button>
                    <div class="btn-group">

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <b>Absensi Manual</b>
                        </button>
                        <ul class="dropdown-menu p-2" role="menu">
                            <li><a href="" style="color: #000;" data-toggle="modal" data-target="#dispenModal">Dispensasi</a></li>
                            <li><a href="" style="color: #000;" data-toggle="modal" data-target="#sakitModal">Sakit</a></li>
                            <li><a href="" style="color: #000;" data-toggle="modal" data-target="#izinModal">Izin</a></li>
                            <li>
                                <hr>
                            </li>
                            <li><a style="color: #000;" href="#">Lainnya</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-filter fa-lg"><span class="m-2"></span></i>
                            <?php foreach ($head as $hd) { ?>
                                <b><?php echo $hd->title ?></b>
                            <?php } ?>
                        </button>
                        <ul class="dropdown-menu p-2" role="menu">
                            <li><a href="<?php echo base_url('Admin/Attendances') ?>" style="color: #000;">Semua Absensi</a></li>
                            <li><a href="<?php echo base_url('Admin/attendancesFilter') ?>" style="color: #000;">Hari Ini</a></li>

                        </ul>
                    </div>

                    <?php foreach ($operationalHour as $op) { ?>
                        <a type="button" class="btn btn-secondary text-light" data-toggle="modal" data-target="#operationalHour<?php echo $op->id ?>">
                            <i class="fa fa-clock fa-lg"><span class="m-2">Jam Operasional</span></i>
                        </a>
                    <?php } ?>




                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <span class="">
                            <?php foreach ($operationalHour as $u) : ?>
                                <p href="" class="badge badge-info text-center" style="font-size:0.89rem;">Jam Masuk: <?php echo $u->attendance_in ?></p>
                                <p href="" class="badge badge-info text-center" style="font-size:0.89rem;">Jam Keluar: <?php echo $u->attendance_out ?></p>
                            <?php endforeach ?>
                            <?php foreach ($head as $hd) { ?>
                                <h4 class="card-title text-center"><?php echo $hd->title ?></h4>
                                <h5 class="card-title text-center"><?php echo $hd->date ?></h5>
                            <?php } ?>
                        </span>
                        <!-- Button trigger modal -->

                        <p><b><?php echo $this->session->flashdata('fail'); ?></b></p>




                        <table style="background: #fff; font-size: 0.84rem;" id="monitoringTable" class="table table-striped table-bordered mt-4">
                            <thead>
                                <tr style="text-align: center">
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>

                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($attendances as $att) { ?>
                                    <tr>
                                        <td><?php echo $att->name ?></td>
                                        <td><?php echo date_indo($att->tgl) ?></td>
                                        <td>
                                            <?php
                                            if ($att->time_in == "00:00:00") {
                                                echo "Tidak Tersedia";
                                            } else {
                                                echo $att->time_in;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($att->time_out == "00:00:00") {
                                                echo "Tidak Tersedia";
                                            } else {
                                                echo $att->time_out;
                                            }
                                            ?>
                                        </td>
                                        x
                                        <?php

                                        if ($att->file == "") {
                                        ?>
                                            <td class="text-center text-danger">Tidak ada lampiran</td>
                                        <?php
                                        } else {
                                        ?>
                                            <td class="text-center"><a href="<?php echo base_url('assets/files/lampiran/') . $att->file; ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
                                        <?php
                                        }
                                        ?>
                                        <td>
                                            <?php
                                            if ($att->time_out == "00:00:00" && $att->file == "") {
                                            ?>
                                                <a type="button" class="btn btn-info btn-sm text-light" data-toggle="modal" data-target="#earlyOut<?php echo $att->id ?>" style="font-size:0.76rem; margin-bottom:7px;">Pulang Cepat</a>
                                                <a data-href="<?= site_url("Admin/deleteAttendance/" . $att->id); ?>" data-toggle="modal" data-target="#hapus" class="btn btn-danger btn-sm text-light" style="font-size:0.76rem;">Hapus</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a data-href="<?= site_url("Admin/deleteAttendance/" . $att->id); ?>" data-toggle="modal" data-target="#hapus" class="btn btn-danger btn-sm text-light" style="font-size:0.76rem;">Hapus</a>
                                            <?php
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>

                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<!--  modal konfirmasi delete -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                PESAN PERINGATAN!
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('hapus').on('shown.bs.modal', function() {

    })
</script>