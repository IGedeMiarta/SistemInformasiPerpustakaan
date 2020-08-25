<!DOCTYPE html>
<html>

<head>
    <table class="table table-borderless table-condensed table-hover" width="100%">
        <tr>
            <td width="13%" align="center"><img src="<?php echo base_url() . 'img/tabanan.png' ?>"></td>
            <td width="74%" align="center">
                <p class="kecil">
                    <font size="5" face="times new roman"><b>SMP NEGERI 1 SELEMADEG TIMUR<br><br></b></font>
                    <font size="4" face="times new roman">
                        NSS. 201 220 307 050, NPSN 50101136<br><br>
                        Alamat Jl. Khayangan, Bunutpuhun, Ds. Bantas, Kec. Selemadeg Timur,<br><br> Kab. Tabanan, Prov. Bali. Fax 82162, Tlpn 085100444428
                    </font>
                </p>
            </td>
            <td width="13%" align="center"><img src="<?php echo base_url() . 'img/LogoSMP.png' ?>"></td>
        </tr>
    </table>

    <title>Cetak Laporan</title>
</head>

<body>

    <style type="text/css">
        table {
            font-family: Arial, Helvetica, sans-serif;
            color: #666;
            text-shadow: 1px 1px 0px #fff;
            background: #ffffff;
            border: #ccc 1px solid;
            border-collapse: collapse;
        }

        table th {
            padding: 15px 35px;
            border-left: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
            background: #c4c4c4;
        }

        table th:first-child {
            border-left: none;
        }

        table tr {
            text-align: center;
            padding-left: 20px;
        }

        table td:first-child {
            text-align: left;
            padding-left: 20px;
            border-left: 0;
        }

        table td {
            padding: 15px 35px;
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;
            background: #fafafa;
            background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
            background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
        }

        table tr:last-child td {
            border-bottom: 0;
        }

        table tr:last-child td:first-child {
            -moz-border-radius-bottomleft: 3px;
            -webkit-border-bottom-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        table tr:last-child td:last-child {
            -moz-border-radius-bottomright: 3px;
            -webkit-border-bottom-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        table tr:hover td {
            background: #f2f2f2;
            background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
            background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
        }

        .table-borderless td,
        .table-berderless th {
            border: 0;
        }

        img {
            width: 75px;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        img.kiri {
            float: left;
            margin: 5px;
        }

        img.kanan {
            float: right;
            margin: 5px;
        }

        p.kecil {
            line-height: 70%;
        }
    </style>

    <center>
        <br><br>
        <font size="4" face="times new roman"><b>LAPORAN PEMINJAMAN PERPUSTAKAAN<br><br></b></font>
    </center>

    <table cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Buku</th>
                <th width="13%">Buku</th>
                <th>Peminjam</th>
                <th>Kelas</th>
                <th>Mulai Pinjam</th>
                <th>Pinjam Sampai</th>
                <th>Status</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($peminjaman as $p) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $p->peminjaman_buku ?></td>
                <td><?php echo $p->judul; ?></td>
                <td><?php echo $p->nama; ?></td>
                <td><?php echo $p->kelas; ?></td>
                <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_mulai)); ?></td>
                <td><?php echo date('d-m-Y', strtotime($p->peminjaman_tanggal_sampai)); ?></td>
                <td>
                    <center>
                        <?php
                        if ($p->peminjaman_status == "1") {
                            echo "<div class='badge badge-success'>Selesai</div>";
                        } else if ($p->peminjaman_status == "2") {
                            echo "<div class='badge badge-warning'>Dipinjam</div>";
                        }
                        ?>
                    </center>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <br><br>
    <br><br>
    <p align="right">
        <font size="4" face="times new roman">
            Yogyakarta, <?php echo date('d M Y '); ?>
            <br><br>
            <br><br>
            <?php echo $this->session->userdata('nama'); ?>
        </font>

    </p>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>