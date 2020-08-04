<?php
class Pages extends CI_Model
{
    public function getAllBuku()
    {
        return $this->db->query("SELECT detail_buku.id_buku,judul,tahun,penulis,penerbit,ket,COUNT(detail_buku.id_buku) AS stok, COUNT(IF(detail_buku.status=1,1,null))AS stok2 FROM buku,detail_buku WHERE buku.id_buku=detail_buku.id_buku  GROUP by id_buku")->result();
    }
    public function getBuku($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->or_like('penerbit', $keyword);
            $this->db->or_like('tahun', $keyword);
        }
        return $this->db->get('buku', $limit, $start)->result();
        // return $this->db->get('')
    }
    public function countAllBuku()
    {
        return $this->db->get('buku')->num_rows();
    }
}
