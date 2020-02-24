<?php

class Awal_model extends CI_model
{
    public function getAllAwal()
    {
        return $this->db->get('awal')->result_array();
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

    public function statusAwal()
    {
        return $this->db->get('status')->result_array();
    }

    public function hapusDataAwal($id)
    {
        $this->db->delete('awal', ['id' => $id]);
    }


    public function getDataAwalById($id)
    {
        return $this->db->get_where('awal', ['id' => $id])->row_array();
    }


    public function ubahDataAwal()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $data = [
            'id_obat' => $this->input->post('id_obat'),
            'id_supplier' => $this->input->post('id_supplier'),
            'anggaran' => $this->input->post('anggaran'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'harga' => $this->input->post('harga')


        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('awal', $data);
    }

    public function tambahDataAwal()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $data = [
            'id_obat' => $this->input->post('id_obat'),
            'id_supplier' => $this->input->post('id_supplier'),
            'anggaran' => $this->input->post('anggaran'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'harga' => $this->input->post('harga'),
            'tanggal' => $this->input->post('tanggal')

        ];

        $this->db->insert('awal', $data);


        //print_r($this->db->last_query());
    }


    public function aksiDataStok()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $a = $this->input->post('jumlah');
        $b = $this->input->post('harga');
        $c = $a * $b;
        $data = [

            'id_obat' => $this->input->post('id_obat'),
            'id_stok' => $this->input->post('id_stok'),
            'jumlah' => $this->input->post('jumlah'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'total' => $c

        ];
        $this->db->insert('aksi_awal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Ditambah<!div>');
        redirect('awal');
    }

    public function cariDataObat()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_obat', $keyword);
        $this->db->or_like('satuan', $keyword);
        return $this->db->get('obat')->result_array();
    }



    public function DataAwal($limit, $start)
    {

        $this->db->select(" a.id as id_stok, a.modified_by as petugas, a.anggaran as anggaran,
                             a.tanggal as tanggal, a.harga as harga1,
                             d.id as id_obat, d.id_supplier as id_supplier,  
                             d.harga as harga, d.id_satuan as id_satuan, d.kode_obat as kode_obat,
                             d.nama_obat as nama_obat,
                             s.nama_supplier as nama_supplier")
            ->from("awal as a")
            ->join("supplier as s", "a.id_supplier = s.id", "left")
            ->join("detail_obat as d", "a.id_obat = d.id", "left");

        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function queryStok()
    {

        $this->db->select("*")
            ->from("detail_obat")
            ->join("gudang", "detail_obat.id_gudang = gudang.id", "left")
            ->join("obat", "detail_obat.id_obat = obat.id", "left")
            ->join("supplier", "detail_obat.id_supplier = supplier.id", "left")
            ->join("satuan", "detail_obat.id_satuan = satuan.id", "left");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function countData()
    {
        return $this->db->get('awal')->num_rows();
    }
}
