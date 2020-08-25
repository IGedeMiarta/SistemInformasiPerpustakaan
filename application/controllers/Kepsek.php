<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_data');
    }

    public function index()
    {
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->db->query("SELECT COUNT(buku.id_buku) AS jumlah FROM buku")->result();
        $data['petugas'] = $this->db->query("SELECT COUNT(petugas.nip) AS jumlah FROM petugas")->result();
        $data['peminjaman'] = $this->db->query("SELECT COUNT(peminjaman.peminjaman_id) AS jumlah FROM peminjaman")->result();
        $data['pemesanan'] = $this->db->query("SELECT COUNT(pemesanan.id_pesan) AS jumlah FROM pemesanan")->result();
        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/content', $data);
        $this->load->view('kepsek/footer');
    }
    function petugas()
    {
        // mengambil data dari database
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['petugas'] = $this->db->query("SELECT * FROM petugas, user WHERE petugas.id_login=user.id_login")->result();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/petugas', $data);
        $this->load->view('kepsek/footer');
    }

    function anggota()
    {
        // mengambil data dari database
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->db->query("SELECT * FROM anggota INNER JOIN user ON anggota.id_login = user.id_login")->result();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/anggota', $data);
        $this->load->view('kepsek/footer');
    }

    function buku()
    {
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->db->query("SELECT detail_buku.id_buku,gambar,judul,tahun,penulis,penerbit,ket,buku.status_buku, COUNT(detail_buku.id_buku) AS stok, COUNT(IF(detail_buku.status!=2,1,null))AS stok2 FROM buku,detail_buku WHERE buku.id_buku=detail_buku.id_buku  GROUP by id_buku")->result();
        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/buku', $data);
        $this->load->view('kepsek/footer');
    }
    function peminjaman()
    {
        // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
        $data['peminjaman'] = $this->db->query("SELECT peminjaman.peminjaman_id, detail_buku.Id_detail, buku.judul, buku.id_buku, 
					anggota.nama,anggota.nis,anggota.kelas, 
					peminjaman.peminjaman_tanggal_mulai, peminjaman.peminjaman_tanggal_sampai, peminjaman.tanggal_kembali, peminjaman.peminjaman_status 
					FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota 
					WHERE detail_buku.Id_detail=peminjaman.peminjaman_buku 
					AND buku.id_buku=detail_buku.id_buku 
					AND anggota.nis=peminjaman.peminjaman_anggota 
					AND peminjaman_status=2
					ORDER BY peminjaman_id DESC")->result();

        $data['peminjaman2'] = $this->db->query("SELECT peminjaman.peminjaman_id, detail_buku.Id_detail, buku.judul, buku.id_buku, 
					anggota.nama,anggota.nis,anggota.kelas, 
					peminjaman.peminjaman_tanggal_mulai, peminjaman.peminjaman_tanggal_sampai, peminjaman.tanggal_kembali, peminjaman.peminjaman_status 
					FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota 
					WHERE detail_buku.Id_detail=peminjaman.peminjaman_buku 
					AND buku.id_buku=detail_buku.id_buku 
					AND anggota.nis=peminjaman.peminjaman_anggota 
					AND peminjaman_status=1
					ORDER BY tanggal_kembali DESC")->result();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/peminjaman', $data);
        $this->load->view('kepsek/footer');
    }

    function pemesanan()
    {
        $data['pemesanan'] = $this->db->query("SELECT pemesanan.id_pesan,pemesanan.buku, pemesanan.nama_pemesan, waktu_pesan, pemesanan.status, anggota.nama, anggota.nis,anggota.kelas,buku.judul,buku.penulis, COUNT(IF(detail_buku.status!=2,1,null))AS stok FROM pemesanan,anggota,buku,detail_buku
				WHERE pemesanan.nama_pemesan=anggota.nis
				AND pemesanan.buku=buku.id_buku
				AND buku.id_buku=detail_buku.id_buku
				GROUP BY id_pesan DESC")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/pemesanan', $data);
        $this->load->view('kepsek/footer');
    }

    function laporan_buku()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['book'] = $this->db->query("SELECT * FROM detail_buku INNER JOIN buku WHERE detail_buku.id_buku=buku.id_buku AND date(tgl_masuk) >='$mulai' AND date(tgl_masuk) <= '$sampai'")->result();
        } else {
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['book'] = $this->db->query("SELECT * FROM detail_buku INNER JOIN buku WHERE detail_buku.id_buku=buku.id_buku")->result();
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/laporan_buku', $data);
        $this->load->view('kepsek/footer');
    }

    function laporan_buku_cetak()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
            $data['book'] = $this->db->query("SELECT * FROM detail_buku INNER JOIN buku WHERE detail_buku.id_buku=buku.id_buku AND date(tgl_masuk) >='$mulai' AND date(tgl_masuk) <= '$sampai'")->result();
            $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();
            $this->load->view('kepsek/laporan_buku_cetak', $data);
        } else {
            redirect(base_url() . 'kepsek/laporan_buku');
        }
    }

    function laporan_peminjaman()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['peminjaman'] = $this->db->query("select * from peminjaman,buku,detail_buku,anggota where peminjaman.peminjaman_buku=detail_buku.id_detail AND detail_buku.id_buku=buku.id_buku and peminjaman.peminjaman_anggota=anggota.nis and date(peminjaman_tanggal_mulai) >= '$mulai' and date(peminjaman_tanggal_mulai) <= '$sampai' order by peminjaman_id desc")->result();
        } else {
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['peminjaman'] = $this->db->query("select * from peminjaman,buku,detail_buku,anggota where peminjaman.peminjaman_buku=detail_buku.id_detail AND detail_buku.id_buku=buku.id_buku and peminjaman.peminjaman_anggota=anggota.nis order by peminjaman_id desc")->result();
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/laporan_peminjaman', $data);
        $this->load->view('kepsek/footer');
    }

    function laporan_pinjam_cetak()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
            $data['peminjaman'] = $this->db->query("SELECT peminjaman.peminjaman_buku,buku.judul,anggota.nama,anggota.nis,anggota.kelas,peminjaman.peminjaman_tanggal_mulai,peminjaman.peminjaman_tanggal_sampai,peminjaman.peminjaman_status FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota WHERE peminjaman.peminjaman_buku=detail_buku.Id_detail AND detail_buku.id_buku=buku.id_buku AND peminjaman.peminjaman_anggota=anggota.nis AND date(peminjaman_tanggal_mulai)>='$mulai' AND date(peminjaman_tanggal_sampai)<='$sampai'")->result();

            $this->load->view('kepsek/laporan_peminjaman_cetak', $data);
        } else {
            redirect(base_url() . 'kepsek/laporan_peminjaman');
        }
    }

    function laporan_pemesanan()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
            // SELECT anggota.nis, anggota.nama, anggota.kelas, buku.id_buku, buku.judul, pemesanan.id_pesan, pemesanan.waktu_pesan, pemesanan.status  FROM anggota INNER JOIN pemesanan ON pemesanan.nama_pemesan=anggota.nis INNER JOIN buku ON pemesanan.buku=buku.id_buku WHERE 
            //date(waktu_pesan)>='2020-07-1' AND date(waktu_pesan)<='2020-07-16'
            $data['pemesanan'] = $this->db->query("SELECT anggota.nis, anggota.nama, anggota.kelas, buku.id_buku, buku.judul, pemesanan.id_pesan, pemesanan.waktu_pesan, pemesanan.status  FROM anggota INNER JOIN pemesanan ON pemesanan.nama_pemesan=anggota.nis INNER JOIN buku ON pemesanan.buku=buku.id_buku  
			WHERE date(waktu_pesan) >='$mulai' AND date(waktu_pesan) <= '$sampai'")->result();
        } else {
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['pemesanan'] = $this->db->query("SELECT anggota.nis, anggota.nama, anggota.kelas, buku.id_buku, buku.judul, pemesanan.id_pesan, pemesanan.waktu_pesan, pemesanan.status  FROM anggota INNER JOIN pemesanan ON pemesanan.nama_pemesan=anggota.nis INNER JOIN buku ON pemesanan.buku=buku.id_buku")->result();
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('kepsek/header', $data);
        $this->load->view('kepsek/navbar', $data);
        $this->load->view('kepsek/sidebar', $data);
        $this->load->view('kepsek/laporan_pemesanan', $data);
        $this->load->view('kepsek/footer');
    }
    function laporan_pesan_cetak()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
            $data['pemesanan'] = $this->db->query("SELECT anggota.nis, anggota.nama, anggota.kelas, buku.id_buku, buku.judul, pemesanan.id_pesan, pemesanan.waktu_pesan, pemesanan.status  FROM anggota INNER JOIN pemesanan ON pemesanan.nama_pemesan=anggota.nis INNER JOIN buku ON pemesanan.buku=buku.id_buku  
			WHERE date(waktu_pesan) >='$mulai' AND date(waktu_pesan) <= '$sampai'")->result();
            $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();
            $this->load->view('kepsek/laporan_pesan_cetak', $data);
        } else {
            redirect(base_url() . 'kepsek/laporan_buku');
        }
    }
    function ubah_password()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlelu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('kepsek/header');
            $this->load->view('kepsek/navbar');
            $this->load->view('kepsek/sidebar');
            $this->load->view('kepsek/ubah_password');
            $this->load->view('kepsek/footer');
        } else {
            $where = [
                'id_login' => 2
            ];
            $data = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];
            $this->m_data->update_data($where, $data, 'user');
            $this->session->set_flashdata('messege', '<script>
			alert("Password Berhasil Diubah!");
		</script>');
            redirect('kepsek/ubah_password');
        }
    }
}
