<div class="m-2 container">
  <h4>DATA JABATAN</h4>
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addEmployee">
    Tambah Jabatan
  </button>
  <p><b><?php echo $this->session->flashdata('fail'); ?></b></p>
</div>

<div class="m-4">
  <table style="background: #fff;" id="example" class="table table-striped table-bordered mt-4">
    <thead>
      <tr style="text-align: center">
        <th>Nama Jabatan</th>
        <th>Dibuat Pada</th>
        <th>Diubah Pada</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($positions as $pos) { ?>
        <tr>
          <td><?php echo $pos->position_name ?></td>
          <td><?php echo $pos->created_at ?></td>
          <td><?php echo $pos->updated_at ?></td>
          <td style="text-align: center;">
            <a type="button" class="fa fa-edit text-warning" data-toggle="modal" data-target="#posEdit<?php echo $pos->id ?>"></a>
            <a data-href="<?= site_url("Admin/deletePosition/" . $pos->id); ?>" data-toggle="modal" data-target="#confirm-delete" class="fa fa-trash text-danger ml-1"></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Nama Jabatan</th>
        <th>Dibuat Pada</th>
        <th>Diubah Pada</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>


<!--  modal konfirmasi delete -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
  $('#confirm-delete').on('shown.bs.modal', function() {
    $('#confirm-delete').trigger('focus')
  })
</script>