</div>
</div>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/jquery.dataTables.min.js') ?>"></script>
<!--  Google Maps Plugin    -->
<!-- Chart JS -->
<script src="<?php echo base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url('assets/js/now-ui-dashboard.min.js?v=1.5.0') ?>" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('assets/demo/demo.js') ?>"></script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>
<script>
  $('#dispenModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>
</body>

</html>