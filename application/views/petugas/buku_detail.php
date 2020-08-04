<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku' ?>">Buku</a></li>
                        <li class="breadcrumb-item active">Detail Buku</li>
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
                <?php
                // $id_buku="0";
                foreach ($detail as $d) {
                    // $id_buku = $d->id_buku;
                }
                ?>
                <div class="card-header">

                    <div class="card">
                        <div class="card-header" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?= base_url() . 'fileupload/buku/' . $d->gambar; ?>" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body bg-transparent">
                                        <table>
                                            <tr>
                                                <td></td>
                                                <td> <b>Kode</b></td>
                                                <td width="5%"></td>
                                                <td>:</td>
                                                <td><b><?= $d->id_buku; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Judul</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $d->judul; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Tahun Terbit</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $d->tahun; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Penulis</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $d->penulis; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Penerbit</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $d->penerbit; ?></td>
                                            </tr>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . 'petugas/buku_detail_tambah/' . $d->id_buku ?>" class='btn btn-sm btn-success pull-right'><i class="fa fa-plus"></i> Detail Buku</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <!--               <th>Kode Buku</th> -->
                                    <th>Kode Detail Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Tahun Terbit</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th width="10%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail as $d) {
                                    $id_buku = $d->id_buku;
                                    // foreach($detail_buku as $dt){
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <!-- <td><?php echo $d->id_buku; ?></td> -->
                                        <td><?php echo $d->id_detail; ?></td>
                                        <td><?php echo $d->judul; ?></td>
                                        <td><?php echo $d->tahun; ?></td>
                                        <td><?php echo $d->penulis; ?></td>
                                        <td><?php echo $d->penerbit; ?></td>
                                        <td><?php echo $d->tgl_masuk; ?></td>
                                        <td><?php echo $d->ket; ?></td>
                                        <td>
                                            <?php
                                            if ($d->status == "1") {
                                                echo "<span class='badge badge-success'>Tersedia</span>";
                                            } else if ($d->status == "2") {
                                                echo "<span class='badge badge-warning'>Sedang Dipinjam</span>";
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <strong>Opsi</strong>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?php echo base_url() . 'petugas/buku_detail_edit/' . $d->id_detail; ?>"><i class="far fa-fw fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item" href="<?php echo base_url() . 'petugas/buku_detail_hapus/' . $d->id_detail; ?>"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    // }
                                }
                                ?>
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