<?php

class Rekanan_model extends CI_model
{
    public function getAllRekan($limit, $start)
    {

        $this->db->select("s.id as id_supplier, s.nama_supplier as nama_supplier, modified_by as  petugas,
                            modified_on as tanggal, no_kontrak as no_kontrak, tgl_kontrak as tgl_kontrak,
                            no_bas as no_bas, tgl_bas as tgl_bas, keterangan as keterangan,
                             t.status_keterangan as status_keterangan");
        $this->db->from("supplier as s");
        $this->db->join("status as t", "s.status = t.id", "left");



        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $data = $query->result_array();
        //echo $this->db->last_query();
        //die();
        return $data;
    }



    public function TambahDataRekan()
    {
        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');



        $data = [
            "nama_supplier" => $this->input->post('nama_supplier', true),
            "modified_by" => $this->input->post('petugas', true),
            "modified_on" => $date1,
            "no_kontrak " => $this->input->post('no_kontrak', true),
            "tgl_kontrak" => $this->input->post('tanggal1', true),
            "no_bas" => $this->input->post('no_bas', true),
            "tgl_bas" => $this->input->post('tanggal2', true),
            "keterangan" => $this->input->post('keterangan', true),
            "status" => $this->input->post('status_keterangan', true)


        ];
        $this->db->insert('supplier', $data);
    }


    public function hapusDataRekan($id)
    {
        $this->db->delete('supplier', ['id' => $id]);
    }


    public function getDataRekanById($id)
    {
        return $this->db->get_where('supplier', ['id' => $id])->row_array();
    }


    public function ubahDataRekan()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $data = [

            "nama_supplier" => $this->input->post('nama_supplier', true),
            "no_kontrak " => $this->input->post('no_kontrak', true),
            "no_bas" => $this->input->post('no_bas', true),
            "keterangan" => $this->input->post('keterangan', true),
            "status" => $this->input->post('status_keterangan', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('supplier', $data);
    }

    public function cariDataRekan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        return $this->db->get('supplier')->result_array();
    }

    public function countData()
    {
        return $this->db->get('supplier')->num_rows();
    }
}
