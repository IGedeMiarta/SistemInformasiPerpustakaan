<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <div class="container">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; smpn1sltim.sch.id <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
</div>
<!-- ./wrapper -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>



<!-- REQUIRED SCRIPTS -->
<!-- DataTables -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.table-datatable').DataTable();
    });
</script>



<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . 'assets/js/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/js/adminlte.min.js' ?>"></script>
</body>

</html>