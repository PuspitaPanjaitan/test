<?php

class Outbox_model extends CI_model
{
    public function getAllRekan()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function getAllDetail()
    {
        return $this->db->get('detail_obat')->result_array();
    }


    public function getAllOutbox()
    {
        return $this->db->get('barang_keluar')->result_array();
    }

    public function getKepada()
    {
        return $this->db->get('kepada')->result_array();
    }


    public function hapusDataOutbox($id)
    {
        $this->db->delete('barang_keluar', ['id' => $id]);
    }


    public function getDataInById($id)
    {
        return $this->db->get_where('barang_keluar', ['id' => $id])->row_array();
    }

    public function getSupplierById($id)
    {
        return $this->db->get_where('supplier', ['id' => $id])->row_array();
    }


    public function tambahDataOutbox()
    {
        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');

        $data = [
            'id_obat' => $this->input->post('id_obat'),
            'id_supplier' => $this->input->post('id_supplier'),
            'kepada' => $this->input->post('kepada'),
            'keterangan' => $this->input->post('ket'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'tanggal' => $this->input->post('tanggal')
        ];
        $this->db->insert('barang_keluar', $data);
    }

    public function ubahDataOutbox()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $month = $date->format('Y');


        $data = [
            'id_obat' => $this->input->post('id_obat'),
            'id_supplier' => $this->input->post('id_supplier'),
            'kepada' => $this->input->post('kepada'),
            'keterangan' => $this->input->post('ket'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1
        ];


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('barang_keluar', $data);
    }

    public function cariData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->select("*,  barang_keluar.id as id_keluar")
            ->from("barang_keluar")
            ->join("detail_obat", "barang_keluar.id_obat = detail_obat.id", "left")
            ->join("supplier", "barang_keluar.id_supplier = supplier.id", "left");
        $this->db->where('detail_obat.nama_obat', $keyword);

        $query = $this->db->get();
        return $query->result_array();
    }


    public function queryOutbox($limit, $start)
    {
        $this->db->select(" k.id as id_keluar, k.id_supplier as id_supplier, k.modified_by as petugas, k.keterangan as ket, 
                            k.id_obat as id_obat, d.nama_obat as nama_obat, s.nama_supplier as nama_supplier, d.id as id_obat,
                            s.no_bas as no_bas, s.tgl_bas as tgl_bas, e.kepada as kepada, d.harga as harga, k.tanggal as tanggal")
            ->from("barang_keluar as k")
            ->join("detail_obat as d", "k.id_obat = d.id", "left")
            ->join("supplier as s", "k.id_supplier = s.id", "left")
            ->join("aksi_outbox as a", "a.id_outbox =  k.id", "left")
            ->join("kepada as e", "k.kepada =  e.id", "left");

        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function countData()
    {
        return $this->db->get('barang_keluar')->num_rows();
    }

    public function aksiDataOutbox()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $a = $this->input->post('jumlah');
        $b = $this->input->post('harga');
        $c = $a * $b;
        $data = [

            'id_obat' => $this->input->post('id_obat'),
            'id_outbox' => $this->input->post('id_keluar'),
            'jumlah' => $this->input->post('jumlah'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'total' => $c

        ];
        $this->db->insert('aksi_outbox', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Ditambah<!div>');
        redirect('outbox');
    }
}
