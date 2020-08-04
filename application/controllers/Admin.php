<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('status') != "login_admin") {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
            redirect('login');
        }
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
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/content', $data);
        $this->load->view('admin/footer');
    }
    function petugas()
    {
        // mengambil data dari database
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['petugas'] = $this->db->query("SELECT * FROM petugas, user WHERE petugas.id_login=user.id_login")->result();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/petugas', $data);
        $this->load->view('admin/footer');
    }

    public function cekidlogin()
    {
        $query = $this->db->query("SELECT MAX(id_login) as id_login from user"); //
        $data = $query->row();
        return $data->id_login;
    }

    public function petugas_tambah()
    {
        $dariDB = $this->cekidlogin();
        $nourut = substr($dariDB, 2, 4);
        $idsekarang = $nourut + 1;
        $data = array('id_login' => $idsekarang);

        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[petugas.nip]', [
            'is_unique' => 'Nomor induk sudah terdatar'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email alredy registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/petugas_tambah', $data);
            $this->load->view('admin/footer');
        } else {
            $id_login = htmlspecialchars($this->input->post('id_login', true));

            $data = [

                'id_login' => $id_login,
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => 2,
                'is_Active' => 'Y',
                'date_created' => time(),
            ];

            $this->db->insert('user', $data);

            $data2 = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'gambar' => 'default.png',
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'jenkel' => htmlspecialchars($this->input->post('jenkel', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'id_login' => $id_login
            ];
            $this->db->insert('petugas', $data2);
            redirect(base_url() . 'admin/petugas');
        }
    }
    function petugas_edit($nip)
    {
        // mengambil data dari database
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['petugas'] = $this->db->query("SELECT * FROM petugas WHERE nip=\"$nip\"")->result();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/petugas_edit', $data);
        $this->load->view('admin/footer');
    }
    function petugas_edit_aksi()
    {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $jenkel = $this->input->post('jenkel');
        $no_hp = $this->input->post('no_hp');
        $where = array(
            'nip' => $nip
        );
        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'jenkel' => $jenkel,
            'no_hp' =>  $no_hp
        ];
        // update data ke database
        $this->m_data->update_data($where, $data, 'petugas');

        // mengalihkan halaman ke halaman data anggota
        redirect(base_url() . 'admin/petugas');
    }

    function buku()
    {
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->db->query("SELECT detail_buku.id_buku,gambar,judul,tahun,penulis,penerbit,ket,buku.status_buku, COUNT(detail_buku.id_buku) AS stok, COUNT(IF(detail_buku.status!=2,1,null))AS stok2 FROM buku,detail_buku WHERE buku.id_buku=detail_buku.id_buku  GROUP by id_buku")->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/buku', $data);
        $this->load->view('admin/footer');
    }

    function buku_detail($id_buku)
    {
        $where = array(
            'id_buku' => $id_buku
        );
        $data['detail'] = $this->db->query("SELECT dt.id_buku, gambar, id_detail,judul,penulis,tahun,penerbit,tgl_masuk,ket,status FROM buku bk INNER JOIN detail_buku dt on bk.id_buku=dt.id_buku WHERE dt.id_buku=\"$id_buku\"")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/buku_detail', $data);
        $this->load->view('admin/footer');
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

        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/peminjaman', $data);
        $this->load->view('admin/footer');
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

        $this->load->view('admin/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/pemesanan', $data);
        $this->load->view('admin/footer');
    }
}
