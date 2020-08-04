<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != "login_user") {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
            redirect('login');
        }
        $this->load->library('pagination');
        $this->load->model('m_data');
        $this->load->model('pages');
    }

    public function index()
    {
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //ambil data
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        //base url
        $this->db->like('judul', $data['keyword']);
        $this->db->or_like('penulis', $data['keyword']);
        $this->db->or_like('penerbit', $data['keyword']);
        $this->db->or_like('tahun', $data['keyword']);
        $this->db->from('buku');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8;
        //style

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['buku'] = $this->pages->getBuku($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/navbar', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/content', $data);
        $this->load->view('templates_user/footer');
    }


    public function peminjaman()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['peminjaman'] = $this->db->query("SELECT peminjaman.peminjaman_id, detail_buku.Id_detail, buku.judul, anggota.nama,anggota.nis,anggota.kelas, peminjaman.peminjaman_tanggal_mulai, peminjaman.peminjaman_tanggal_sampai, peminjaman.peminjaman_status FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota WHERE detail_buku.Id_detail=peminjaman.peminjaman_buku AND buku.id_buku=detail_buku.id_buku AND anggota.nis=peminjaman.peminjaman_anggota ORDER BY peminjaman_id DESC ")->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/navbar', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/peminjaman', $data);
        $this->load->view('templates_user/footer');
    }

    public function pemesanan($nis)
    {
        $buku = $this->input->get('id_buku');
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemesanan'] = $this->db->query("SELECT id_pesan,id_buku,judul,buku.gambar,nama,kelas,waktu_pesan,batas_pesan,pemesanan.status FROM pemesanan,buku,anggota
        WHERE pemesanan.nama_pemesan=anggota.nis
        AND pemesanan.buku=buku.id_buku
        AND pemesanan.nama_pemesan=$nis ORDER BY id_pesan DESC")->result();
        $data['pesan'] = $this->db->get_where('pemesanan', array('nama_pemesan' => $nis))->row_array();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/navbar', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/v_pemesanan', $data);
        $this->load->view('templates_user/footer');
    }
    public function pemesanan_tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['buku'] = $this->db->query("SELECT * FROM buku")->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/navbar', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/pemesanan', $data);
        $this->load->view('templates_user/footer_pemesanan', $data);
    }

    function pemesanan_aksi()
    {

        $waktu_pesan = date("Y-m-d H:i:s");
        $nama_pemesan = $this->input->post('nis');
        $buku = $this->input->post('id_buku');
        $nis = $this->input->post('nis');

        $cek = $this->db->query("SELECT * FROM pemesanan WHERE nama_pemesan=\"$nis\" AND buku=\"$buku\" AND status != 4")->result();

        var_dump($cek);
        die;
        if ($cek === null) {
            $data = array(
                'waktu_pesan' => $waktu_pesan,
                'nama_pemesan' => $nama_pemesan,
                'buku' => $buku,
                'status' => 1
            );

            // insert data ke database
            $this->m_data->insert_data($data, 'pemesanan');


            redirect('user/pemesanan/' . $nis);
        } else {
            echo "<script>
                    alert('yang diupload bukan gambar');
            </script>";
            return false;
        }
    }
    public function profile($nis)
    {
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->db->query("SELECT * FROM user JOIN anggota ON user.id_login=anggota.id_login WHERE anggota.nis=\"$nis\"")->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/navbar', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates_user/footer', $data);
    }
    public function profile_update()
    {
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/navbar', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/profile_update', $data);
        $this->load->view('templates_user/footer', $data);
    }


    function profile_update_aksi()
    {
        // var_dump($_POST);
        // // var_dump($_FILES);
        // die;
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $jenkel = $this->input->post('jenkel');
        $kelas = $this->input->post('kelas');
        $alamat = $this->input->post('alamat');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');

        $gambar = $this->upload();
        if (!$gambar) {
            return false;
        }



        $where = array(
            'nis' => $nis
        );

        $data = array(
            'nis' => $nis,
            'gambar' => $gambar,
            'nama' => $nama,
            'jenkel' => $jenkel,
            'kelas' => $kelas,
            'alamat' => $alamat,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir
        );

        $this->m_data->update_data($where, $data, 'anggota');

        redirect('user/profile');
    }

    function upload()
    {
        $namagambar = $this->input->post('gambar_edt');
        $namaFile = $_FILES['gambar']['name'];
        // $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //validasi upload gambar
        if ($error === 4) {
            $namaFile = $namagambar;
            return $namaFile;
        }

        //validasi ekstensi gambar
        $eGambarValid = ['jpg', 'jpeg', 'png'];
        $eGambar = explode('.', $namaFile);
        $eGambar = strtolower(end($eGambar));
        if (!in_array($eGambar, $eGambarValid)) {
            echo "<script>
                    alert('yang diupload bukan gambar');
            </script>";
            return false;
        }

        move_uploaded_file($tmpName, './fileupload/user/' . $namaFile);

        return $namaFile;
    }



    public function info_buku($id_buku)
    {
        // SELECT detail_buku.id_buku,judul,tahun,penulis,penerbit,ket,COUNT(detail_buku.id_buku) AS stok,status FROM buku,detail_buku WHERE buku.id_buku=detail_buku.id_buku AND detail_buku.status=1 GROUP by id_buku
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('anggota', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $data['buku'] = $this->db->query("SELECT detail_buku.id_buku,gambar,judul,tahun,penulis,penerbit,ket,COUNT(detail_buku.id_buku) AS stok, COUNT(IF(detail_buku.status!=2,1,null))AS stok2 FROM buku,detail_buku WHERE buku.id_buku=detail_buku.id_buku  GROUP by id_buku")->result();
        $data['info'] = $this->db->query("SELECT detail_buku.id_buku,gambar,judul,tahun,penulis,penerbit,ket, COUNT(IF(detail_buku.status!=2,1,null))AS stok,COUNT(detail_buku.id_buku) AS stok2 FROM buku,detail_buku WHERE buku.id_buku=detail_buku.id_buku AND detail_buku.id_buku=\"$id_buku\"")->result();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/navbar', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/info_buku', $data);
        $this->load->view('templates_user/footer');
    }

    function pesan_buku()
    {
        $waktu_pesan = date("Y-m-d H:i:s");

        $nama_pemesan = $this->input->get('nis');
        $buku = $this->input->get('id_buku');

        $nis = $this->input->get('nis');


        $cek = $this->db->query("SELECT * FROM pemesanan WHERE nama_pemesan =\"$nama_pemesan\" AND buku=\"$buku\" AND status !=4")->result();

        if ($cek != null) {
            $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Anda Memesan Buku Dengan Judul Sama!, Silahkan selesaikan pemesanan sebelumnya atau pesan buku baru!</div>');
            redirect('user/pemesanan/' . $nis);
        } else {

            $data = array(
                'waktu_pesan' => $waktu_pesan,
                'nama_pemesan' => $nama_pemesan,
                'buku' => $buku,
                'status' => 1
            );

            // insert data ke database
            $this->m_data->insert_data($data, 'pemesanan');
            redirect('user/pemesanan/' . $nis);
        }
    }
}
