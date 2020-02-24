<?php

class Transaksi_model extends CI_model
{

    public function DataObat()
    {
        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');

        die;


        /*   $this->db->select("d.id as id_obat, d.kode_obat as kode_obat, d.nama_obat as nama_obat,  
                             d.modified_on as tanggal,  ")
            ->from("outbox as o")
            ->join("aksi_inbox as i", "o.id_obat = i.id", "left")
            ->join("detail as d", "o.id_obat = d.id", "left")
            ->$this->db->where("o.modified_on  month('$date1') AND '$date2'");
            ->$this->db->group_by("id_obat, hari");
 */
    }
}
