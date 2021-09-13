<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/now-ui-dashboard.css?v=1.5.0') ?>" rel="stylesheet" />
</head>

<body style="background-color: #1d55a3;">
    <div class="col-md-12">
        <div class="modal-dialog modal-dialog-centered" style="margin-bottom:0;">
            <div class="modal-content p-4 modal-centered">
                <div class="panel-heading">
                    <div style="margin-left:30%;">
                        <img src="<?= base_url('assets/img/logo.jpeg') ?>" alt="" style="width:50%;">
                    </div>
                    <div style="text-align: center;">
                        <p class="text-centered"><b><?php echo $this->session->flashdata('fail'); ?></b></p>
                    </div>
                    <h4 class="panel-title" style="text-align: center;"><b>HRD</b></h4>
                    <p style="text-align: center;">Silahkan masukkan pin</p>
                </div>
                <div class="panel-body modal-centered">
                    <form action="<?php echo base_url('Login/login_process') ?>" id="my_form" method="post">
                        <label for="text-1"></label>
                        <input class="form-control" type="number" autofocus name="sID" id="sID" value="" id="my_button" placeholder="Masukkan PIN" maxlength="7" />
                        <input type="hidden" name="lane" value="1" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/jquery.dataTables.min.js') ?>"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <script>
        $(function() {
            var $id = $('#sID');
            $id.keyup(function(e) {
                if ($id.val().length == 6) {
                    $(this.form).submit();
                }
            });
        });
    </script>
</body>

</html>