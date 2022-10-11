</div>
<footer id="printPageButton" class="main-footer">
    <strong>Copyright &copy; 2021 Bringin Gigantara.</strong> All rights
    reserved.
</footer>
</div>


<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- DataTables Responsive -->
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatable-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatable-button/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatable-button/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/JSZip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatable-button/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatable-button/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatable-button/js/buttons.colVis.min.js"></script>
<!-- Summernonte -->
<script src="<?= base_url() ?>assets/bower_components/summernote/summernote.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/main.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- Sweetalert2 -->
<script src="<?= base_url() ?>assets/bower_components/sweetalert2/sweetalert2.min.js"></script>
<!-- Dropify -->
<script src="<?= base_url() ?>assets/plugins/dropify/js/dropify.min.js"></script>

<script>
    $(function() {
        <?php if ($this->session->flashdata("success")) : ?>
            toastr.success("<?= $this->session->flashdata("success") ?>");
        <?php elseif ($this->session->flashdata("error")) : ?>
            toastr.error("<?= $this->session->flashdata("error") ?>");
        <?php elseif ($this->session->flashdata("info")) : ?>
            toastr.info("<?= $this->session->flashdata("info") ?>");
        <?php elseif ($this->session->flashdata("warning")) : ?>
            toastr.warning("<?= $this->session->flashdata("warning") ?>");
        <?php endif; ?>
    });
</script>

</body>

</html>