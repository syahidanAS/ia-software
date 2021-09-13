<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        selesai();
    });

    function selesai() {
        setTimeout(function() {
            update();
            selesai();
        }, 400);
    }

    function update() {
        $.getJSON("http://localhost/api/aksi-tampil.php", function(data) {
            $("ul").empty;
            $.each(data.result, function() {
                // $("ul").append("<li>UID : "+this['uid']+"</li>");
                document.getElementById("uid").value = this['uid'];
            });
        });
    }
</script>