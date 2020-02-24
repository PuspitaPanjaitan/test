<?php

class Obat_model extends CI_model
{
    public function getAllObat()
    {
        return $this->db->get('obat')->result_array();
    }

    public function TambahDataObat()
    {
        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');



        $data = [
            "nama_obat" => $this->input->post('nama_obat', true),
            "satuan" => $this->input->post('satuan', true),
            "status" => $this->input->post('status', true),
            "modified_by" => $this->input->post('modified_by', true),
            "modified_on" => $date1

        ];
        $this->db->insert('obat', $data);
    }


    public function hapusDataObat($id)
    {
        $this->db->delete('obat', ['id' => $id]);
    }


    public function getDataObatById($id)
    {
        return $this->db->get_where('obat', ['id' => $id])->row_array();
    }


    public function ubahDataObat()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $data = [
            "nama_obat" => $this->input->post('nama_obat', true),
            "satuan" => $this->input->post('satuan', true),
            "status" => $this->input->post('status', true),
            "modified_by" => $this->input->post('modified_by', true),
            "modified_on" => $date1
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('obat', $data);
    }

    public function cariDataObat()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_obat', $keyword);
        $this->db->or_like('satuan', $keyword);
        return $this->db->get('obat')->result_array();
    }

    public function statusObat()
    {
        return $this->db->get('status')->result_array();
    }

    public function Notification()
    {
        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');


        $q = "select `nama_obat`  from `obat` WHERE  where `{modified_by}` <= '{$date1}'";

        return $this->db->query($q)->result_array();
    }
}
