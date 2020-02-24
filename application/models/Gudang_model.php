<?php

class Gudang_model extends CI_model
{
    public function getAllGudang()
    {
        return $this->db->get('gudang')->result_array();
    }

    public function TambahDataGudang()
    {
        $data = [
            "nama_gudang" => $this->input->post('nama_gudang', true),
            "user" => $this->input->post('user', true),
            "status" => $this->input->post('status', true)
        ];
        $this->db->insert('gudang', $data);
    }

    public function hapusDataGudang($id)
    {
        $this->db->delete('gudang', ['id' => $id]);
    }


    public function getDataGudangById($id)
    {
        return $this->db->get_where('gudang', ['id' => $id])->row_array();
    }


    public function ubahDataGudang()
    {
        $data = [
            "nama_gudang" => $this->input->post('nama_gudang', true),
            "user" => $this->input->post('user', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('gudang', $data);
    }

    public function cariDataGudang()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_gudang', $keyword);
        $this->db->or_like('user', $keyword);
        return $this->db->get('gudang')->result_array();
    }
}
