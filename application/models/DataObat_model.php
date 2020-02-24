<?php

class DataObat_model extends CI_model
{
    public function getAllGudang()
    {
        return $this->db->get('gudang')->result_array();
    }

    public function getAllRekan()
    {
        return $this->db->get('supplier')->result_array();
    }
    public function getAllSatuan()
    {
        return $this->db->get('satuan')->result_array();
    }

    public function getAllDetail()
    {
        return $this->db->get('detail_obat')->result_array();
    }

    public function hapusDataObat($id)
    {
        $this->db->delete('detail_obat', ['id' => $id]);
    }


    public function getDataObatById($id)
    {
        return $this->db->get_where('detail_obat', ['id' => $id])->row_array();
    }


    public function ubahDataObat()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');

        $data = [
            'kode_obat' => $this->input->post('kode_obat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'id_supplier' => $this->input->post('id_supplier'),
            'harga' => $this->input->post('harga'),
            'id_satuan' => $this->input->post('id_satuan'),
            'status' => $this->input->post('status')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('detail_obat', $data);
    }

    public function tambahDataObat()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $data = [
            'kode_obat' => $this->input->post('kode_obat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'id_supplier' => $this->input->post('id_supplier'),
            'harga' => $this->input->post('harga'),
            'tanggal' => $this->input->post('tanggal'),
            'id_satuan' => $this->input->post('id_satuan'),
            'status' => $this->input->post('status')

        ];

        $this->db->insert('detail_obat', $data);


        //print_r($this->db->last_query());
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

    public function DataObat($limit, $start)
    {

        $this->db->select("d.id as id_obat, d.kode_obat as kode_obat, d.nama_obat as nama_obat,  
                            d.modified_by as petugas, d.modified_on as tanggal, d.id_supplier as id_supplier,  
                            d.harga as harga, d.id_satuan as id_satuan, t.status_keterangan as status, 
                            s.nama_supplier as nama_supplier, n.satuan as satuan")
            ->from("detail_obat as d")
            ->join("status as t", "d.status = t.id", "left")
            ->join("supplier as s", "d.id_supplier = s.id", "left")
            ->join("satuan as n", "d.id_satuan = n.id", "left");


        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function queryStok($limit, $start)
    {

        $this->db->select("*")
            ->from("detail_obat", $limit, $start)
            ->join("gudang", "detail_obat.id_gudang = gudang.id", "left")
            ->join("obat", "detail_obat.id_obat = obat.id", "left")
            ->join("supplier", "detail_obat.id_supplier = supplier.id", "left")
            ->join("satuan", "detail_obat.id_satuan = satuan.id", "left");


        $query = $this->db->get();
        return $query->result_array();
    }

    public function countData()
    {
        return $this->db->get('detail_obat')->num_rows();
    }
}
