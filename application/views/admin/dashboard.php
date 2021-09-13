 <div class="panel-header panel-header-lg">
 </div>
 <div class="content">
   <div class="row">
     <div class="col-lg-4">
       <div class="card card-chart">
         <b>
           <h3 style="text-align: center; margin-top: 10%;">Jumlah Pegawai</h3>
         </b>
         <b>
           <?php foreach ($employeesCount as $emp) { ?>
             <h5 style="text-align: center;"><?php echo $emp->total ?></h5>
           <?php } ?>
         </b>
         <div class="card-footer">
           <div class="stats">
             <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
           </div>
         </div>
       </div>
     </div>
     <div class="col-lg-4 col-md-6">
       <div class="card card-chart">
         <b>
           <h2>
             <div id="clock" style="text-align: center; margin-top: 10%;"></div>
           </h2>
         </b>
         <div class="card-footer">
           <div class="stats">
             <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
           </div>
         </div>
       </div>
     </div>
     <div class="col-lg-4 col-md-6">
       <div class="card card-chart">
         <b>
           <h3 style="text-align: center; margin-top: 10%;">Jumlah Jabatan</h3>
           <?php foreach ($positionsCount as $posCount) { ?>
             <h5 style="text-align: center;"><?php echo $posCount->position_total ?></h5>
           <?php } ?>
         </b>
         <div class="card-footer">
           <div class="stats">
             <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>