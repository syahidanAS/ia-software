<div class="container mt-4">
    <a href="<?php echo base_url('Admin/exportExcel') ?>" class="btn btn-primary">EXPORT EXCEL</a>
    <table style="background: #fff; font-size:10px;" id="monitoringTable" class="table table-striped table-bordered">
        <thead>
            <tr style="text-align:">
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendances as $att) { ?>
                <tr>
                    <td><?php echo $att->name ?></td>
                    <td><?php echo date_indo($att->tgl); ?></td>
                    <td><?php echo $att->time_in ?></td>
                    <td><?php echo $att->time_out ?></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
        </tfoot>
    </table>
</div>