<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- start -->
            <div class="card">

                <div class="card-header">

                    <?php
                    $id_detail = "0";
                    $nik = "0";
                    ?>

                    <form method="post" action="<?php echo base_url() . 'petugas/peminjaman_aksi'; ?>">
                        <div class="form-group">
                            <label class="font-weight-bold" for="penulis">Anggota</label>
                            <?php foreach ($anggota as $a) { ?>
                                <input type="text" class="form-control" name="anggota" placeholder="masukan NIK" value="<?php echo $a->nis; ?> <?php echo "- " . $a->nama ?>" readonly>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="buku">Buku</label>
                            <div class="input-group mb-3">
                                <input id="id_detail2" name="id_detail" type="text" class="form-control" placeholder="Cari Buku" aria-label="Judul Buku" aria-describedby="basic-addon2" required="required">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target=".modal_buku"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div>

                        <br>
                        <input type="submit" class="btn btn-primary pull-right" value="Tambah"><i class=""></i>
                        <a href="<?php echo base_url() . 'petugas/peminjaman' ?>" class="btn btn-success">Selesai</a>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Peminjam</th>
                                    <th>Kode Buku</th>
                                    <th>Buku</th>
                                    <th>Mulai Pinjam</th>
                                    <th>Batas Pinjam</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($peminjaman as $p) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $p->nama; ?></td>
                                        <td><?php echo $p->Id_detail; ?></td>
                                        <td><?php echo $p->judul; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_mulai)); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_sampai)); ?></td>
                                        <td>
                                            <?php
                                            if ($p->peminjaman_status == "1") {
                                                echo "<div class='badge badge-success'>Selesai</div>";
                                            } else if ($p->peminjaman_status == "2") {
                                                echo "<div class='badge badge-warning'>Dipinjam</div>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">

                                            <?php
                                            if ($p->peminjaman_status == '1') {
                                                echo "-";
                                            } else if ($p->peminjaman_status == '2') {
                                            ?>

                                                <div class="btn-group ">
                                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <strong>Opsi</strong>
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a class="dropdown-item" href="<?php echo base_url() . 'petugas/peminjaman_batalkan/' . $p->peminjaman_id; ?>"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>

                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->