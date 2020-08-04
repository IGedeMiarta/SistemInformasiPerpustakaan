<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{


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
}
