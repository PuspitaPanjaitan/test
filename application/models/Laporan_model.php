<?php

class Laporan_model extends CI_model
{

    public function getLaporan()
    {
        $query = "SELECT `aksi_inbox`.*, `aksi_outbox`.*
                    FROM `aksi_inbox` JOIN `aksi_outbox` 
                    ON `aksi_inbox`.`id_obat` = `aksi_outbox`. `id_obat`";

        return $this->db->query($query)->result_array();
    }

    public function getAllLaporan()
    {
        return $this->db->get('aksi_outbox')->result_array();
    }

    public function namaBulan()
    {
        return $this->db->get('bulan')->result_array();
    }


    public function reportView()

    {
        $date1 = "2020-02-01";
        $date2 = "2020-02-31";


        $this->db->select("o.jumlah as jumlah_outbox, 
                            o.modified_on as tanggal_outbox as,
                            d.id as obat, i.jumlah as jumlah_inbox,
                             i.modified_on as tanggal_inbox");
        $this->db->from("aksi_outbox as o");
        $this->db->join("detail_obat as d", "o.id_obat = d.id", "left");
        $this->db->join("aksi_inbox as i", "o.id_obat = i.id_obat", "left");
        $this->db->where("o.modified_by BETWEEN '$date1' AND '$date2'");
        $this->db->group_by("o.id_obat");




        $query = $this->db->get();
        return $query->result_array();
    }
}
