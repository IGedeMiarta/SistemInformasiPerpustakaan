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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- start -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <form action="<?= base_url('user') ?>" method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit">
                                    </div>
                                </div>
                            </form>
                            <h6> Result : <?php echo $total_rows; ?></h6>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <?php if (empty($buku)) : ?>
                        <tr>
                            <td>
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row">
                            <?php foreach ($buku as $b) { ?>

                                <div class="col-md-3 mb-5">
                                    <div class="card bg-light" style="width: 15rem; height: 400px;">
                                        <img src=" <?php echo base_url() . 'fileupload/buku/' . $b->gambar; ?>" class="card-img-top" style="max-height: 250px" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $b->judul; ?></h5><br>

                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="<?php echo base_url() . 'user/info_buku/' . $b->id_buku; ?>" class="btn btn-info btn-sm mr-4">Info Buku </a>
                                            <!-- button modal -->
                                            <!-- <a href="" class="btn btn-success btn-sm ml-4" data-toggle="modal" data-target="#exampleModal">modal</a> -->

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>

                    </div>


                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>





            <!-- end -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>