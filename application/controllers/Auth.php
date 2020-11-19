<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/auth_header');
			$this->load->view('auth/login');
			$this->load->view('auth/auth_footer');
		} else {

			$this->_login();
		}
	}
	public function cekidlogin()
	{
		$query = $this->db->query("SELECT MAX(id_login) as id_login from user"); //
		$data = $query->row();
		return $data->id_login;
	}

	private function _login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		//jika user ada
		if ($user) {
			//user aktif
			if ($user['is_active'] == 'Y') {
				//cek password
				$data1 = password_verify($password, $user['password']);
				var_dump($data1);
				die;
				if (password_verify($password, $user['password'])) {

					if ($user['role'] == 1) {
						$data = [
							'id_login' => $user['id_login'],
							'email' => $user['email'],
							'role_id' => $user['role_id'],
							'status' => 'login_admin'
						];
						$this->session->set_userdata($data);
						redirect('admin');
					} else if ($user['role'] == 2) {
						$data = [
							'id_login' => $user['id_login'],
							'email' => $user['email'],
							'role_id' => $user['role_id'],
							'status' => 'login_petugas'
						];
						$this->session->set_userdata($data);
						redirect('petugas');
					} else if ($user['role'] == 3) {
						$data = [
							'id_login' => $user['id_login'],
							'email' => $user['email'],
							'role_id' => $user['role_id'],
							'status' => 'login_kepsek'
						];
						$this->session->set_userdata($data);
						redirect('kepsek');
					} else {
						$data = [
							'id_login' => $user['id_login'],
							'email' => $user['email'],
							'role_id' => $user['role_id'],
							'status' => 'login_user'
						];
						$this->session->set_userdata($data);
						redirect('User');
					}
				} else {
					$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Password Salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email Belum Aktif!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$dariDB = $this->cekidlogin();
		$nourut = substr($dariDB, 2, 4);
		$idsekarang = $nourut + 1;
		$data = array('id_login' => $idsekarang);


		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nis', 'Nis', 'required|trim|is_unique[anggota.nis]', [
			'is_unique' => 'Nomor induk sudah terdatar'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email alredy registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password doesnt match!',
			'min_length' => 'Password to short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'SPENSATIM';
			$this->load->view('auth/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('auth/auth_footer');
		} else {
			$id_login = htmlspecialchars($this->input->post('id_login', true));
			$email = $this->input->post('email', true);

			$data = [
				'id_login' => $id_login,
				'email' => htmlspecialchars($email),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role' => 4,
				'is_Active' => 'N',
				'date_created' => time(),
			];

			//menyiapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];


			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');
			$data = [
				'nis' => htmlspecialchars($this->input->post('nis', true)),
				'gambar' => 'user.png',
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'id_login' => $id_login
			];
			$this->db->insert('anggota', $data);
			$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Akun Anda Sudah dibuat, silahkan cek email untuk validasi</div>');
			redirect('login');
		}
	}

	private function _sendEmail($token, $type)
	{
		$this->load->library('email');
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_user'] = 'info.smpn1seltim@gmail.com';
		$config['smtp_pass'] = 'Mm66768799@';
		$config['smtp_port'] = 465;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);

		$this->email->set_newline("\r\n");

		$this->email->from('info.smpn1seltim@gmail.com', 'SMPN 1 Selemadeg Timur');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik Tautan untuk mengaktifkan akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Active</a>');
		} elseif ($type = 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik Tautan untuk Reset Password akun anda : <a href="' . base_url() . 'auth/resetpass?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}


		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 'Y');
					$this->db->where('email', $email);
					$this->db->update('user');
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">' . $email . ' Telah Diaktiasi!, Silahkan Login</div>');
					redirect('login');
				} else {

					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Aktifasi Gagal, Token Expired!</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Aktifasi Gagal, Token Salah!</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Aktifasi Gagal, Email Salah!</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('keyword');
		$this->session->unset_userdata('id_login');


		$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Sudah Logout</div>');
		redirect('login');
	}

	public function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('login/header');
			$this->load->view('login/forgot_password');
			$this->load->view('login/footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 'Y'])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Silahkan Cek Email Untuk Merubah Password!</div>');
				redirect('auth/forgot_password');
			} else {
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Aktifasi Gagal, Email Belum Aktif atau Terdatar!</div>');
				redirect('auth/forgot_password');
			}
		}
	}


	public function resetpass()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->ubahPassword();
			} else {
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Reset Password Gagal, Token Salah!</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Reset Password Gagal, Email Salah!</div>');
			redirect('login');
		}
	}

	public function ubahpassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('login');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[4]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'SPENSATIM';
			$this->load->view('auth/auth_header', $data);
			$this->load->view('auth/ubahpass');
			$this->load->view('auth/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->db->delete('user_token', ['email' => $email]);
			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Password Telah Diubah, Silahkan Login</div>');
			redirect('login');
		}
	}
}
