<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kartu Anggota</title>
</head>

<body>

    <style type="text/css">
        .card {
            border: 1px solid #000;
            width: 350px;
        }

        .card-header {
            border-bottom: 1px solid #000;
            text-align: center;
            font-weight: bold;
            padding: 10px;

        }

        .card-body {
            padding: 20px;
        }

        img {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        table {
            font-size: 12px;
        }
    </style>

    <div class="card">
        <table class="table table-borderless table-condensed table-hover card-header" width="100%">
            <td width="20%" align="right"><img src="../../img/LogoSMP.png" width="70%"></td>
            <td width="80%" align="center">KARTU ANGGOTA PERPUSTAKAAN<br>
                SMP N 1 SELEMADEG TIMUR
            </td>
        </table>
        <!-- <div class="card-header">
    KARTU ANGGOTA SMPN 1 SELEMADEG TIMUR
  </div> -->
        <div class="card-body">
            <div class="container">
                <table class="table table-borderless table-sm fs-2">
                    <?php
                    $no = 1;
                    foreach ($anggota as $a) {
                    ?>

                        <tr>
                            <td rowspan="4" valign="top"><img src="<?= base_url('fileupload/user/') . $a->gambar ?>" width="80px">
                                <font size="1" face="times new roman"> <br>Jogja, <?php echo date('d/m/Y'); ?>
                                    <br><br>
                                    <?php echo $this->session->userdata('nama'); ?>
                            </td>
                            <td></td>
                            <td width="14%"><b>NIS</b></td>
                            <td width="2%"><b>:</b></td>
                            <td><b><?php echo $a->nis; ?></b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> Nama</td>
                            <td>:</td>
                            <td><?php echo $a->nama; ?></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td> Kelas</td>
                            <td>:</td>
                            <td><?php echo $a->kelas; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="left" valign="top"> Alamat</td>
                            <td align="left" valign="top">:</td>
                            <td align="justufy" valign="top"><?php echo $a->alamat; ?><br></td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>