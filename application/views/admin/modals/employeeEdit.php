<!-- Modal -->
<?php $no = 0;
foreach($employees as $u): $no++ ?>
<div class="modal fade" id="employeeEdit<?php echo $u->e_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-m" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>DETAIL || UBAH DATA PEGAWAI</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    <form action="<?php echo site_url('Admin/updateEmployee') ?>" method="post" enctype="multipart/form-data" >
    <div class="form-group">
            <input class="form-control" type="text" name="id" value="<?php echo $u->e_id?>" hidden>
                </div>            
    <div class="form-group">
                    <label>ID Kartu</label>
                    <input class="form-control" type="text" name="uid" value="<?php echo $u->uid?>" readonly required>
                   
                </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $u->name?>" required />
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                   
                    <?php
                    
                    $gender = $u->gender;
                    if($gender=="m"){
                        ?>
                         <input type="radio" id="css" name="gender" value="m" checked>
                         <label for="css">Laki-laki</label>
                         <input type="radio" id="javascript" name="gender" value="f">
                        <label for="javascript">Perempuan</label>
                        <?php
                        
                    }else{
                        ?>
                        <input type="radio" id="css" name="gender" value="m">
                         <label for="css">Laki-laki</label>
                         <input type="radio" id="javascript" name="gender" value="f" checked>
                        <label for="javascript">Perempuan</label>
                        <?php
                    }?>
                        
                       
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="position_id">
                    
                    <option class="text-blue" value="<?php echo $u->position_id?>"><?php echo $u->position_name?></option>
                    
                        <?php foreach ($positions as $pos) { ?>
                            <hr>
                            <option value="<?php echo $pos->id ?>"><?php echo $pos->position_name ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" type="text" name="address" required ><?php echo $u->address?></textarea>
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