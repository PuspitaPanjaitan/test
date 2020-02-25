<?php

class Transaksi_model extends CI_model
{

    public function Transaksi()
    {
        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');




        $this->db->select("d.id as id_obat, d.kode_obat as kode_obat, d.nama_obat as nama_obat,
                            d.harga as harga, SUM(o.jumlah)* harga as total_outbox,
                            SUM(a.jumlah)* harga as total_awal,  
                            SUM(i.jumlah)* harga as total_inbox,
                            ((SUM(i.jumlah)+SUM(a.jumlah))- SUM(o.jumlah))  as sisa_stok,
                             i.modified_on as tanggal, sum(i.jumlah) as jumlah_masuk, 
                             SUM(o.jumlah) as jumlah_keluar, SUM(a.jumlah) as jumlah_awal");
        $this->db->from("detail_obat as d");
        $this->db->join("aksi_outbox as o", "o.id_obat = d.id", "left");
        $this->db->join("aksi_inbox as i", " i.id_obat = d.id", "left");
        $this->db->join("aksi_awal as a", "a.id_obat = d.id", "left");
        $this->db->group_by("id_obat");
        $query = $this->db->get();
        return $query->result_array();
    }
}
