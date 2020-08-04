<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
            $this->load->view('login/header');
            $this->load->view('login/login');
            $this->load->view('login/footer');
        } else {
            //validasi sukses
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
                        redirect('kepsek');
                    } else {
                        $data = [
                            'id_login' => $user['id_login'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'status' => 'login_user'
                        ];
                        $this->session->set_userdata($data);
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('messege', '<div class="alert alert-danger mt-n5" role="alert">Password Salah</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger mt-n5" role="alert">Email Belum Aktif!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger mt-n5" role="alert">Email Belum Terdaftar!</div>');
            redirect('login');
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
            $this->load->view('login/header');
            $this->load->view('login/registration', $data);
            $this->load->view('login/footer');
        } else {
            $id_login = htmlspecialchars($this->input->post('id_login', true));

            $data = [

                'id_login' => $id_login,
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => 4,
                'is_Active' => 'N',
                'date_created' => time(),
            ];

            $this->db->insert('user', $data);

            $data = [
                'nis' => htmlspecialchars($this->input->post('nis', true)),
                'gambar' => 'user.png',
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'id_login' => $id_login
            ];
            $this->db->insert('anggota', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Selamat Akun Anda Sudah dibuat, silahkan cek email untuk validasi</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('keyword');
        $this->session->unset_userdata('id_login');


        $this->session->set_flashdata('messege', '<div class="alert alert-success mt-n5" role="alert">Anda Sudah Logout</div>');
        redirect('login');
    }
}
