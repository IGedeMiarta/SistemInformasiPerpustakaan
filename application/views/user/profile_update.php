<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Home</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'user' ?>">Home</a></li>
                        <li class="breadcrumb-item active">Update Data</li>
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
                <div class="card-body">
                    <form method="post" action="<?= base_url() . 'user/profile_update_aksi' ?>" enctype="multipart/form-data">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="Nis">NIS</span>
                            </div>
                            <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS" required="required" value="<?php echo $sesi['nis']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="nama">Nama</span>
                            </div>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required" value="<?php echo $sesi['nama']; ?>">
                        </div>
                        <!-- <div class="form-group ">
                            <label class="font-weight-bold" for="nik">NIS</label>
                            <input type="number" class="form-control" name="nis" placeholder="Masukkan NIS" required="required" value="<?php echo $sesi['nis']; ?>">
                        </div> -->
                        <!-- 
                        <div class="form-group">
                            <label class="font-weight-bold" for="nama">Nama Lengkap</label>

                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required" value="<?php echo $sesi['nama']; ?>">
                        </div> -->
                        <div class="row">
                            <div class="input-group col-sm-6 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Kelas</span>
                                </div>
                                <select class="custom-select" name="kelas" required="required">
                                    <option selected><?php echo $sesi['kelas']; ?></option>
                                    <option value="VII A">VII A</option>
                                    <option value="VII B">VII B</option>
                                    <option value="VII C">VII C</option>
                                    <option value="VII D">VII D</option>
                                    <option value="VII E">VII E</option>
                                    <option value="VII F">VII F</option>
                                    <option value="VII G">VII G</option>

                                    <option value="VIII A">VIII A</option>
                                    <option value="VIII B">VIII B</option>
                                    <option value="VIII C">VIII C</option>
                                    <option value="VIII D">VIII D</option>
                                    <option value="VIII E">VIII E</option>
                                    <option value="VIII F">VIII F</option>
                                    <option value="VIII G">VIII G</option>

                                    <option value="XI A">IX A</option>
                                    <option value="XI B">IX B</option>
                                    <option value="XI C">IX C</option>
                                    <option value="XI D">IX D</option>
                                    <option value="XI E">IX E</option>
                                    <option value="XI F">IX F</option>
                                    <option value="XI G">IX G</option>
                                </select>
                            </div>
                            <div class="input-group col-sm-6 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="Jenkel">Jenis Kelamin</span>
                                </div>
                                <select class="custom-select" name="jenkel">
                                    <option selected><?php if ($sesi['jenkel'] == 'L') {
                                                            echo "Laki-Laki";
                                                        } else {
                                                            echo "Perempuan";
                                                        }; ?></option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="alamat">Alamat</span>
                            </div>
                            <textarea class="form-control" name="alamat" required="required" placeholder="Masukkan alamat"><?php echo $sesi['alamat']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="input-group col-6 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="tempat">Tempat Lahir</span>
                                </div>
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="<?php echo $sesi['tempat_lahir'] ?>" value="<?php echo $sesi['tempat_lahir']; ?>">
                            </div>
                            <div class="input-group col-6 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="tgl">Tanggal Lahir</span>
                                </div>
                                <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="<?php echo $sesi['tgl_lahir']; ?>" value="<?php echo $sesi['tgl_lahir']; ?>">
                            </div>
                        </div>


                        <!-- <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                        </div> -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload Gambar</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="gambar">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="gambar_edt" value="<?php echo $sesi['gambar']; ?>" hidden>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>

                </div>
            </div>




            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->