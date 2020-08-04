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

<!-- MODAL ANGGOTA -->
<div class="modal fade modalBesar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>DATA ANGGOTA</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-datatable" id="TbAnggota">
                        <thead>
                            <th width="1%">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($anggota as $a) {
                                // foreach($detail_buku as $dt){
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $a->nis; ?></td>
                                    <td><?php echo $a->nama; ?></td>
                                    <td><?php echo $a->kelas; ?></td>
                                    <td><?php echo $a->alamat; ?></td>
                                    <td><a id="btnTambah" class='btn btn-sm btn-primary'><i class="fa fa-plus"></i> </a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- AKHIR MODAL ANGGOTA -->

<!-- MODAL BUKU -->
<div class="modal fade modal_buku" id="modal_buku" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Data Buku</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <th width="1%">No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($buku as $b) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td id="id_detail"><?php echo $b->id_detail; ?></td>
                                        <td><?php echo $b->judul; ?></td>
                                        <td><?php echo $b->tahun; ?></td>
                                        <td><?php echo $b->penulis; ?></td>
                                        <td><?php echo $b->penerbit; ?></td>
                                        <td><a id="btnTambah" onclick="tambahBuku();" class='btn btn-sm btn-primary'><i class="fa fa-plus"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL BUKU-->


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


<script type="text/javascript">
    var rIndex,
        table = document.getElementById("table");

    function selectedRowToInput2() {

        for (var i = 1; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                document.getElementById("id_detail2").value = this.cells[1].innerHTML;

            };
        }
    }
    selectedRowToInput2();

    var rIndex2,
        table2 = document.getElementById("TbAnggota");

    function selectedRowToInput() {

        for (var i = 1; i < table2.rows.length; i++) {
            table2.rows[i].onclick = function() {
                rIndex2 = this.rowIndex;
                document.getElementById("id_anggota").value = this.cells[1].innerHTML + " - " + this.cells[2].innerHTML;

            };
        }
    }
    selectedRowToInput();
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url() . 'assets/js/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/js/adminlte.min.js' ?>"></script>
</body>

</html>