<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

	public $id_buku;
	public $id_detail; // id buku

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('status') != "login_petugas") {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
			redirect('login');
		}
		$this->load->model('m_data');


		$tanggal = date("Y-m-d");
		$cek = $this->db->query("SELECT id_pesan,buku,batas_pesan,pemesanan.status AS st_pesan,id_detail,detail_buku.status AS st_buku FROM pemesanan,detail_buku 
		WHERE pemesanan.buku=detail_buku.id_buku AND batas_pesan <= \"$tanggal\" AND pemesanan.status <=3")->row_array();

		if ($cek !== null) {
			$id_pesan = $cek['id_pesan'];
			$where = array('id_pesan' => $id_pesan);
			$data = array('status' => 5);
			//update data status ke tb pemesanan
			$this->m_data->update_data($where, $data, 'pemesanan');

			$id_detail = $cek['id_detail'];
			$w = array('id_detail' => $id_detail);
			$dt = array('status' => 1);
			//update data status ke tb detail_buku
			$this->m_data->update_data($w, $dt, 'detail_buku');
		}
	}


	function index()
	{

		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['buku'] = $this->db->query("SELECT COUNT(buku.id_buku) AS jumlah FROM buku")->result();
		$data['anggota'] = $this->db->query("SELECT COUNT(anggota.nis) AS jumlah FROM anggota")->result();
		$data['peminjaman'] = $this->db->query("SELECT COUNT(peminjaman.peminjaman_id) AS jumlah FROM peminjaman")->result();
		$data['pemesanan'] = $this->db->query("SELECT COUNT(pemesanan.id_pesan) AS jumlah FROM pemesanan")->result();
		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/dashboard', $data);
		$this->load->view('petugas/templates/footer');
	}



	function ganti_password()
	{
		$this->load->view('petugas/v_header');
		$this->load->view('petugas/v_ganti_password');
		$this->load->view('petugas/v_footer');
	}

	function ganti_password_aksi()
	{
		$baru = $this->input->post('password_baru');
		$ulang = $this->input->post('password_ulang');

		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
		$this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');

		if ($this->form_validation->run() != false) {
			$id = $this->session->userdata('id');

			$where = array('id' => $id);

			$data = array('password' => md5($baru));

			$this->m_data->update_data($where, $data, 'petugas');

			redirect(base_url() . 'petugas/ganti_password/?alert=sukses');
		} else {
			$this->load->view('petugas/v_header');
			$this->load->view('petugas/v_ganti_password');
			$this->load->view('petugas/v_footer');
		}
	}


	// crud anggota
	function anggota()
	{
		// mengambil data dari database
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['anggota'] = $this->db->query("SELECT * FROM anggota INNER JOIN user ON anggota.id_login = user.id_login")->result();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/anggota', $data);
		$this->load->view('petugas/templates/footer');
	}

	function akun($id_login)
	{
		$where = array('id_login' => $id_login);
		$data = array(
			'is_active' => 'Y'
		);

		// update data ke database
		$this->m_data->update_data($where, $data, 'user');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url() . 'petugas/anggota');
	}
	function akun_nonaktif($id_login)
	{
		$where = array('id_login' => $id_login);
		$data = array(
			'is_active' => 'N'
		);

		// update data ke database
		$this->m_data->update_data($where, $data, 'user');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url() . 'petugas/anggota');
	}


	function anggota_tambah_aksi()
	{
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$kelas = $this->input->post('kelas');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nis' => $nis,
			'nama' => $nama,
			'alamat' => $alamat,
			'kelas' => $kelas
		);

		// insert data ke database
		$this->m_data->insert_data($data, 'anggota');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url() . 'petugas/anggota');
	}



	function anggota_edit($nis)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$where = array(
			'nis' => $nis
		);

		$data['anggota'] = $this->db->query("SELECT * FROM anggota WHERE nis=\"$nis\"")->result();
		// $data['anggota'] = $this->m_data->edit_data($where, 'anggota')->result();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/anggota_edit', $data);
		$this->load->view('petugas/templates/footer');
	}

	function anggota_update()
	{
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$jenkel = $this->input->post('jenkel');
		$kelas = $this->input->post('kelas');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');

		$where = array(
			'nis' => $nis
		);

		$data = array(
			'nis' => $nis,
			'nama' => $nama,
			'jenkel' => $jenkel,
			'kelas' => $kelas,
			'alamat' => $alamat,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => $tgl_lahir
		);

		// update data ke database
		$this->m_data->update_data($where, $data, 'anggota');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url() . 'petugas/anggota');
	}


	function anggota_hapus($nis)
	{
		$where = array(
			'nis' => $nis
		);

		// menghapus data anggota dari database sesuai id
		$this->m_data->delete_data($where, 'anggota');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url() . 'petugas/anggota');
	}

	function anggota_kartu($nis)
	{
		$where = array('nis' => $nis);
		$data['anggota'] = $this->db->query("SELECT * FROM anggota INNER JOIN user ON anggota.id_login=user.id_login WHERE nis=\"$nis\"")->result();

		$this->load->view('petugas/v_anggota_kartu', $data);
	}
	// akhir crud anggota

	public function cekidbuku()
	{
		$query = $this->db->query("SELECT MAX(id_buku) as id_buku from buku"); //
		$data = $query->row();
		return $data->id_buku;
	}


	function buku()
	{
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['buku'] = $this->db->query("SELECT detail_buku.id_buku,gambar,judul,tahun,penulis,penerbit,ket,buku.status_buku, COUNT(detail_buku.id_buku) AS stok, COUNT(IF(detail_buku.status!=2,1,null))AS stok2 FROM buku,detail_buku WHERE buku.id_buku=detail_buku.id_buku  GROUP by id_buku")->result();
		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/buku', $data);
		$this->load->view('petugas/templates/footer');
	}


	function buku_tambah()
	{

		$dariDB = $this->cekidbuku();
		$nourut = substr($dariDB, 2, 4);
		$kodeBarangSekarang = $nourut + 1;
		$data = array('id_buku' => $kodeBarangSekarang);
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/buku_tambah', $data);
		$this->load->view('petugas/templates/footer');
	}

	function buku_tambah_aksi()
	{
		$judul = $this->input->post('judul');
		$id_buku = $this->input->post('id_buku');
		$tahun = $this->input->post('tahun');
		$penulis = $this->input->post('penulis');
		$penerbit = $this->input->post('penerbit');

		$gambar = $this->upload();
		if (!$gambar) {
			return false;
		}
		$data = array(
			'id_buku' => $id_buku,
			'gambar' => $gambar,
			'judul' => $judul,
			'tahun' => $tahun,
			'penulis' => $penulis,
			'penerbit' => $penerbit

		);
		$this->m_data->insert_data($data, 'buku');

		redirect(base_url() . 'petugas/buku');
	}

	function buku_edit($id_buku)
	{
		$where = array('id_buku' => $id_buku);
		$data['buku'] = $this->db->query("SELECT * FROM buku WHERE id_buku=\"$id_buku\"")->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/buku_edit', $data);
		$this->load->view('petugas/templates/footer');
	}

	function buku_update()
	{

		$id_buku = $this->input->post('id_buku');
		$judul = $this->input->post('judul');
		$tahun = $this->input->post('tahun');
		$penulis = $this->input->post('penulis');
		$penerbit = $this->input->post('penerbit');

		$gambar = $this->upload();
		if (!$gambar) {
			return false;
		}
		$where = array(
			'id_buku' => $id_buku
		);

		$data = array(
			'gambar' => $gambar,
			'judul' => $judul,
			'tahun' => $tahun,
			'penulis' => $penulis,
			'penerbit' => $penerbit
		);


		// insert data ke database
		$this->m_data->update_data($where, $data, 'buku');

		redirect(base_url() . 'petugas/buku');
	}


	function buku_hapus($id_buku)
	{
		$where = array(
			'id_buku' => $id_buku
		);

		// menghapus data buku dari database sesuai id
		$this->m_data->delete_data($where, 'buku');
		$this->m_data->delete_data($where, 'detail_buku');

		// mengalihkan halaman ke halaman data buku
		redirect(base_url() . 'petugas/buku');
	}

	public function cekidetailbuku()
	{
		$query = $this->db->query("SELECT MAX(id_detail) as id_detail from detail_buku WHERE id_buku"); //
		$data = $query->row();
		return $data->id_detail;
	}

	function buku_detail($id_buku)
	{
		$where = array(
			'id_buku' => $id_buku
		);
		$data['detail'] = $this->db->query("SELECT dt.id_buku, gambar, id_detail,judul,penulis,tahun,penerbit,tgl_masuk,ket,status FROM buku bk INNER JOIN detail_buku dt on bk.id_buku=dt.id_buku WHERE dt.id_buku=\"$id_buku\"")->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/buku_detail', $data);
		$this->load->view('petugas/templates/footer');
	}

	function buku_detail_tambah($id_buku)
	{
		$where = array(
			'id_buku' => $id_buku
		);
		$data['detail'] = $this->db->query("SELECT bk.id_buku,max(id_detail) as id_detail,judul,penulis,tahun,penerbit,tgl_masuk,ket FROM buku bk INNER JOIN detail_buku dt on bk.id_buku=dt.id_buku WHERE dt.id_buku=\"$id_buku\"")->result();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/buku_detail_tambah', $data);
		$this->load->view('petugas/templates/footer');
	}
	function buku_detail_aksi()
	{
		$dariDB = $this->input->post('id_detail');

		$nourut = substr($dariDB, 9, 1);
		$id_detail = substr($dariDB, 0, 9);
		$_nourut = intval($nourut);
		$KodeDetailSekarang = $_nourut + 1;
		$tgl_masuk = $this->input->post('tgl_masuk');
		$ket = $this->input->post('ket');
		$id_buku = $this->input->post('id_buku');
		if ($id_detail == '') {
			$_idDetail = $id_buku . ".DT1";
		} else {
			$_idDetail = $id_detail . $KodeDetailSekarang;
		}

		$data = array(
			'id_detail' => $_idDetail,
			'id_buku' => $id_buku,
			'tgl_masuk' => $tgl_masuk,
			'ket' => $ket,
			'status' => 1
		);

		$this->m_data->insert_data($data, 'detail_buku');

		$where = array(
			'id_buku' => $id_buku
		);
		$data = array(

			'status_buku' => 1
		);
		$this->m_data->update_data($where, $data, 'buku');
		redirect(base_url() . 'petugas/buku_detail/' . $id_buku);
	}


	function buku_detail_edit($id_detail)
	{
		$where = array('id_detail' => $id_detail);
		$data['detail'] = $this->db->query("SELECT buku.id_buku, detail_buku.id_detail, buku.judul, detail_buku.tgl_masuk, detail_buku.ket,status FROM detail_buku INNER JOIN buku ON detail_buku.id_buku=buku.id_buku where id_detail=\"$id_detail\"")->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/buku_detail_edit', $data);
		$this->load->view('petugas/templates/footer');
	}

	function buku_detail_update()
	{
		$id_buku = $this->input->post('id_buku');
		$id_detail = $this->input->post('id_detail');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$ket = $this->input->post('ket');

		$where = array(
			'id_detail' => $id_detail
		);

		$data = array(
			'id_detail' => $id_detail,
			'id_buku' => $id_buku,
			'tgl_masuk' => $tgl_masuk,
			'ket' => $ket,
			'status' => 1
		);

		$this->m_data->update_data($where, $data, 'detail_buku');

		// mengalihkan halaman ke halaman data buku
		redirect(base_url() . 'petugas/buku_detail/' . $id_buku);
	}

	function buku_detail_hapus($id_detail)
	{
		$where = array(
			'id_detail' => $id_detail
		);

		// menghapus data buku dari database sesuai id
		$this->m_data->delete_data($where, 'detail_buku');

		//mengalihkan halaman ke halaman data buku
		redirect(base_url() . 'petugas/buku');
	}
	// akhir crud buku


	//============================================================================================================================

	// proses transaksi_peminjaman
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

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/peminjaman', $data);
		$this->load->view('petugas/templates/footer');
	}

	function peminjaman_tambah()
	{
		// mengambil data buku yang berstatus 1 (tersedia) dari database
		$where = array('status' => 1);
		$data['buku'] = $this->db->query("SELECT detail_buku.id_detail,judul,tahun,penulis,penerbit,status FROM buku INNER JOIN detail_buku on buku.id_buku=detail_buku.id_buku WHERE detail_buku.status=\"1\"")->result();

		// mengambil data anggota dari database
		$data['anggota'] = $this->db->query("SELECT * FROM anggota ")->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/peminjaman_tambah', $data);
		$this->load->view('petugas/templates/footer_peminjaman');
	}


	function peminjaman_aksi()
	{
		$id_detail = $this->input->post('id_detail');
		$_anggota = $this->input->post('anggota');
		$anggota = substr($_anggota, 0, 5);
		$tanggal_mulai = date("Y-m-d");
		$tanggal_sampai = date("Y-m-d", strtotime("$tanggal_mulai + 7 days"));

		$cek = $this->db->query("SELECT peminjaman_id,peminjaman_buku, peminjaman_anggota,peminjaman_status,nama, 
		COUNT(IF(peminjaman_anggota=$anggota,1,null))AS jml_pinjam 
		FROM peminjaman, anggota 
		WHERE peminjaman_anggota=nis 
		AND peminjaman_status=2")->row_array();

		if ($cek['jml_pinjam'] <= 2) {
			$data = array(
				'peminjaman_buku' => $id_detail,
				'peminjaman_anggota' => $anggota,
				'peminjaman_tanggal_mulai' => $tanggal_mulai,
				'peminjaman_tanggal_sampai' => $tanggal_sampai,
				'peminjaman_status' => 2
			);

			// insert data ke database
			$this->m_data->insert_data($data, 'peminjaman');

			// mengubah status buku menjadi di pinjam (2)
			$w = array(
				'id_detail' => $id_detail
			);
			$d = array(
				'status' => 2
			);
			$this->m_data->update_data($w, $d, 'detail_buku');
			$this->session->set_flashdata('messege', '<script>
			alert("Berhasil Meminjam!");
		</script>');
			redirect(base_url() . 'petugas/peminjaman_siswa/' . $anggota);
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Anggota Tersebut Sudah Melebihi Batas Pinjam! <strong>Max Peminjaman Adalah 3 Buku!</strong></div>');
			redirect('petugas/peminjaman_siswa/' . $anggota);
		}
	}

	function peminjaman_batalkan($id)
	{
		$where = array(
			'peminjaman_id' => $id
		);

		// mengambil data buku pada peminjaman ber id tersebut
		$data = $this->m_data->edit_data($where, 'peminjaman')->row();
		$buku = $data->peminjaman_buku;

		// mengembalikan status buku kembali ke tersedia (1)
		$w = array(
			'id_detail' => $buku
		);
		$d = array(
			'status' => 1
		);
		$this->m_data->update_data($w, $d, 'detail_buku');

		// menghapus data peminjaman dari database sesuai id
		$this->m_data->delete_data($where, 'peminjaman');

		// mengalihkan halaman ke halaman data buku
		redirect(base_url() . 'petugas/peminjaman');
	}


	function peminjaman_siswa($nis)
	{

		$data['anggota'] = $this->db->query("SELECT * FROM anggota where nis=\"$nis\" ")->result();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$data['buku'] = $this->db->query("SELECT detail_buku.id_detail,judul,tahun,penulis,penerbit,status FROM buku INNER JOIN detail_buku on buku.id_buku=detail_buku.id_buku WHERE detail_buku.status='1'")->result();

		$data['peminjaman'] = $this->db->query("SELECT peminjaman.peminjaman_id, detail_buku.Id_detail, buku.judul, anggota.nama,anggota.nis,anggota.kelas, peminjaman.peminjaman_tanggal_mulai, peminjaman.peminjaman_tanggal_sampai, peminjaman.peminjaman_status FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota WHERE detail_buku.Id_detail=peminjaman.peminjaman_buku AND buku.id_buku=detail_buku.id_buku AND anggota.nis=peminjaman.peminjaman_anggota ORDER BY peminjaman_id DESC LIMIT 5")->result();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/peminjaman_siswa', $data);
		$this->load->view('petugas/templates/footer_peminjaman');
	}

	function peminjaman_riwayat($id_buku)
	{
		$data['peminjaman'] = $this->db->query("SELECT peminjaman.peminjaman_id, detail_buku.Id_detail, buku.judul, buku.id_buku, 
					anggota.nama,anggota.nis,anggota.kelas, 
					peminjaman.peminjaman_tanggal_mulai, peminjaman.peminjaman_tanggal_sampai, peminjaman.tanggal_kembali, peminjaman.peminjaman_status 
					FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota 
					WHERE detail_buku.Id_detail=peminjaman.peminjaman_buku 
					AND buku.id_buku=detail_buku.id_buku 
					AND anggota.nis=peminjaman.peminjaman_anggota 
					AND peminjaman_buku LIKE '%$id_buku%'
					ORDER BY peminjaman_id DESC")->result();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['buku'] = $this->db->query("SELECT * FROM buku, detail_buku WHERE buku.id_buku=detail_buku.id_buku AND buku.id_buku=\"$id_buku\" ")->result();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/peminjaman_riwayat', $data);
		$this->load->view('petugas/templates/footer');
	}

	function peminjaman_selesai()
	{
		$id = $this->input->get('id');
		$id_buku = $this->input->get('id_buku');
		$cek = $this->db->query("SELECT * FROM pemesanan WHERE buku =\"$id_buku\" AND status <=3 LIMIT 1 ")->row_array();

		if ($cek === null) {

			$where = array(
				'peminjaman_id' => $id
			);

			// mengambil data buku pada peminjaman ber id tersebut
			$data = $this->m_data->edit_data($where, 'peminjaman')->row();

			$buku = $data->peminjaman_buku;
			$tanggal_kembali = date("Y-m-d");

			$dt = array(
				'peminjaman_status' => 1,
				'tanggal_kembali' => $tanggal_kembali
			);
			// mengubah status peminjaman menjadi selesai (1)
			$this->m_data->update_data($where, $dt, 'peminjaman');

			// mengembalikan status buku kembali ke tersedia (1)
			$w = array(
				'id_detail' => $buku
			);
			$d = array(
				'status' => 1
			);

			$this->m_data->update_data($w, $d, 'detail_buku');



			redirect(base_url() . 'petugas/peminjaman');
		} else {

			$where = array(
				'peminjaman_id' => $id
			);

			// mengambil data buku pada peminjaman ber id tersebut
			$data = $this->m_data->edit_data($where, 'peminjaman')->row();
			$buku = $data->peminjaman_buku;
			$tanggal_kembali = date("Y-m-d");


			$dt = array(
				'peminjaman_status' => 1,
				'tanggal_kembali' => $tanggal_kembali
			);
			// mengubah status peminjaman menjadi selesai (1)
			$this->m_data->update_data($where, $dt, 'peminjaman');

			// mengembalikan status buku kembali ke tersedia (1)
			$w = array(
				'id_detail' => $buku
			);
			$d = array(
				'status' => 3
			);

			$id_pesan = $cek['id_pesan'];
			$this->m_data->update_data($w, $d, 'detail_buku');
			$batas_pesan = date("Y-m-d", strtotime("$tanggal_kembali + 2 days"));
			$w = array(
				'id_pesan' => $id_pesan
			);

			$d = array(
				'batas_pesan' => $batas_pesan,
				'status' => 3
			);

			$this->m_data->update_data($w, $d, 'pemesanan');


			redirect(base_url() . 'petugas/peminjaman');
		}
	}

	function peminjaman_laporan()
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

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/peminjaman_laporan', $data);
		$this->load->view('petugas/templates/footer');
	}

	function peminjaman_cetak()
	{
		if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			// mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
			$data['peminjaman'] = $this->db->query("SELECT peminjaman.peminjaman_buku,buku.judul,anggota.nama,anggota.nis,anggota.kelas,peminjaman.peminjaman_tanggal_mulai,peminjaman.peminjaman_tanggal_sampai,peminjaman.peminjaman_status FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota WHERE peminjaman.peminjaman_buku=detail_buku.Id_detail AND detail_buku.id_buku=buku.id_buku AND peminjaman.peminjaman_anggota=anggota.nis AND date(peminjaman_tanggal_mulai)>='$mulai' AND date(peminjaman_tanggal_sampai)<='$sampai'")->result();

			$this->load->view('petugas/peminjaman_cetak', $data);
		} else {
			redirect(base_url() . 'petugas/peminjaman_laporan');
		}
	}

	function peminjaman_buku()
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

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/templates/topbar', $data);
		$this->load->view('petugas/v_buku_laporan', $data);
		$this->load->view('petugas/templates/footer');
	}
	function peminjaman_buku_cetak()
	{
		if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			// mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
			$data['book'] = $this->db->query("SELECT * FROM detail_buku INNER JOIN buku WHERE detail_buku.id_buku=buku.id_buku AND date(tgl_masuk) >='$mulai' AND date(tgl_masuk) <= '$sampai'")->result();

			$this->load->view('petugas/v_peminjaman_buku_cetak', $data);
		} else {
			redirect(base_url() . 'petugas/peminjaman_buku');
		}
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

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/pemesanan', $data);
		$this->load->view('petugas/templates/footer');
	}

	function pemesanan_valid($id_pesan)
	{
		$where = array(
			'id_pesan' => $id_pesan
		);

		// mengubah status peminjaman menjadi selesai (1)
		$this->m_data->update_data($where, array('status' => 2), 'pemesanan');

		redirect(base_url() . 'petugas/pemesanan');
	}
	function pemesanan_ready($id_pesan)
	{
		$where = array(
			'id_pesan' => $id_pesan
		);

		// mengubah status peminjaman menjadi selesai (1)
		$this->m_data->update_data($where, array('status' => 3), 'pemesanan');

		redirect(base_url() . 'petugas/pemesanan');
	}
	function pemesanan_hapus($id_pesan)
	{

		$where = array(
			'id_pesan' => $id_pesan
		);

		// menghapus data buku dari database sesuai id
		$this->m_data->delete_data($where, 'pemesanan');

		//mengalihkan halaman ke halaman data buku
		redirect(base_url() . 'petugas/pemesanan');
	}
	// akhir crud buku


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



		move_uploaded_file($tmpName, './fileupload/buku/' . $namaFile);

		return $namaFile;
	}

	function pemesanan_pinjam()
	{

		$nis = $this->input->get('nis');
		$buku = $this->input->get('buku');
		$pesan = $this->input->get('pesan');
		$data['pesan'] = $pesan;
		$data['anggota'] = $this->db->query("SELECT * FROM anggota where nis=\"$nis\" ")->result();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$data['buku'] = $this->db->query("SELECT detail_buku.id_detail,judul,tahun,penulis,penerbit,status FROM buku INNER JOIN detail_buku on buku.id_buku=detail_buku.id_buku WHERE detail_buku.status!=2 AND id_detail LIKE '%$buku%'")->result();

		$data['peminjaman'] = $this->db->query("SELECT peminjaman.peminjaman_id, detail_buku.Id_detail, buku.judul, anggota.nama,anggota.nis,anggota.kelas, peminjaman.peminjaman_tanggal_mulai, peminjaman.peminjaman_tanggal_sampai, peminjaman.peminjaman_status FROM peminjaman INNER JOIN detail_buku INNER JOIN buku INNER JOIN anggota WHERE detail_buku.Id_detail=peminjaman.peminjaman_buku AND buku.id_buku=detail_buku.id_buku AND anggota.nis=peminjaman.peminjaman_anggota ORDER BY peminjaman_id DESC LIMIT 5")->result();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/pemesanan_pinjam', $data);
		$this->load->view('petugas/templates/footer_peminjaman');
	}
	function pemesanan_pinjam_aksi($pesan)
	{
		$id_detail = $this->input->post('id_detail');
		$_anggota = $this->input->post('anggota');
		$anggota = substr($_anggota, 0, 5);
		$tanggal_mulai = date("Y-m-d");
		$tanggal_sampai = date("Y-m-d", strtotime("$tanggal_mulai + 7 days"));

		$cek = $this->db->query("SELECT peminjaman_id,peminjaman_buku, peminjaman_anggota,peminjaman_status,nama, 
		COUNT(IF(peminjaman_anggota=$anggota,1,null))AS jml_pinjam 
		FROM peminjaman, anggota 
		WHERE peminjaman_anggota=nis 
		AND peminjaman_status=2")->row_array();

		if ($cek['jml_pinjam'] <= 2) {
			$data = array(
				'peminjaman_buku' => $id_detail,
				'peminjaman_anggota' => $anggota,
				'peminjaman_tanggal_mulai' => $tanggal_mulai,
				'peminjaman_tanggal_sampai' => $tanggal_sampai,
				'peminjaman_status' => 2
			);

			// insert data ke database
			$this->m_data->insert_data($data, 'peminjaman');

			// mengubah status buku menjadi di pinjam (2)
			$w = array(
				'id_detail' => $id_detail
			);
			$d = array(
				'status' => 2
			);
			$this->m_data->update_data($w, $d, 'detail_buku');

			$where = array(
				'id_pesan' => $pesan
			);
			$dt = array(
				'status' => 4
			);
			$this->m_data->update_data($where, $dt, 'pemesanan');
			redirect(base_url() . 'petugas/peminjaman_siswa/' . $anggota);
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Anggota Tersebut Sudah Melebihi Batas Pinjam! <strong>Max Peminjaman Adalah 3 Buku!</strong></div>');
			redirect('petugas/peminjaman_siswa/' . $anggota);
		}
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

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/laporan_buku', $data);
		$this->load->view('petugas/templates/footer');
	}
	function laporan_buku_cetak()
	{
		if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			// mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
			$data['book'] = $this->db->query("SELECT * FROM detail_buku INNER JOIN buku WHERE detail_buku.id_buku=buku.id_buku AND date(tgl_masuk) >='$mulai' AND date(tgl_masuk) <= '$sampai'")->result();
			$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();
			$this->load->view('petugas/laporan_buku_cetak', $data);
		} else {
			redirect(base_url() . 'petugas/laporan_buku');
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
			$data['pemesanan'] = $this->db->query("SELECT anggota.nis, anggota.nama, anggota.kelas, buku.id_buku, buku.judul, pemesanan.id_pesan, pemesanan.waktu_pesan, pemesanan.status  FROM anggota INNER JOIN pemesanan ON pemesanan.nama_pemesan=anggota.nis INNER JOIN buku ON pemesanan.buku=buku.id_buku ")->result();
		}
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

		$this->load->view('petugas/templates/header', $data);
		$this->load->view('petugas/templates/navbar', $data);
		$this->load->view('petugas/templates/sidebar', $data);
		$this->load->view('petugas/laporan_pemesanan', $data);
		$this->load->view('petugas/templates/footer');
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
			$this->load->view('petugas/laporan_pesan_cetak', $data);
		} else {
			redirect(base_url() . 'petugas/laporan_buku');
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
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['sesi'] = $this->db->get_where('petugas', ['id_login' => $this->session->userdata('id_login')])->row_array();

			$this->load->view('petugas/templates/header', $data);
			$this->load->view('petugas/templates/navbar', $data);
			$this->load->view('petugas/templates/sidebar', $data);
			$this->load->view('petugas/ubah_password', $data);
			$this->load->view('petugas/templates/footer');
		} else {

			$where = [
				'id_login' => $this->input->post('id')
			];
			$data = [
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->m_data->update_data($where, $data, 'user');
			$this->session->set_flashdata('messege', '<script>
			alert("Password Berhasil Diubah!");
		</script>');
			redirect('petugas/ubah_password');
		}
	}
}
