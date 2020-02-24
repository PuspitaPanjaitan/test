<?php

class Report_model extends CI_model
{


    public function getLaporan()
    {

        $query = "SELECT `aksi_outbox`.`id_obat`, `detail_obat`.`nama_obat`
                    FROM `aksi_outbox` JOIN `detail_obat` 
                    ON `aksi_outbox`.`id_obat` = `detail_obat`. `id`
                     GROUP BY `id_obat`";


        $query =  $this->db->query($query);
        $data =  $query->result_array();
        return $data;
    }


    public function getLaporan4()
    {
        $date1 = $this->input->post('tanggal1');
        $date2 = $this->input->post('tanggal2');

        $this->db->select("o.jumlah as jumlah_outbox,  o.modified_on as tanggal_outbox,
                             i.jumlah as jumlah_inbox, 
                             d.nama_obat as nama_obat, d.kode_obat as kode_obat,
                             d.harga as harga, d.id as id_obat,
                            w.jumlah as jumlah_awal,
                             s.satuan as satuan, m.anggaran as anggaran");
        $this->db->from("aksi_outbox as o");
        $this->db->join("detail_obat as d", "o.id_obat = d.id", "left");
        $this->db->join("aksi_inbox as i", "o.id_obat = i.id_obat", "left");
        $this->db->join("barang_masuk as m", "o.id_obat = m.id_obat", "left");
        $this->db->join("aksi_awal as w", " o.id_obat = w.id_obat", "left");
        $this->db->join("satuan as s", "d.id_satuan = s.id", "left");
        $this->db->where("o.modified_on BETWEEN '$date1' AND '$date2'");
        $this->db->group_by("d.id");



        $query = $this->db->get();
        $data = $query->result_array();
        //echo $this->db->last_query();
        //die();
        return $data;
    }




    public function queryBaru()
    {
        $date1 = $this->input->post('tanggal1');
        $date2 = $this->input->post('tanggal2');

        $this->db->select("d.kode_obat as kode_obat, n.satuan as satuan, m.anggaran as anggaran, d.harga as harga,
        i.jumlah as jumlah_inbox, w.jumlah as jumlah_awal, d.nama_obat as nama_obat, o.modified_on as tanggal, 
        SUM(o.jumlah)* harga as total_outbox, d.id as id_obat, DATE_FORMAT(o.modified_on,'%Y-%m-%d') as hari, 
        SUM(o.jumlah) as jumlah_outbox");
        $this->db->from("aksi_outbox as o");
        $this->db->join("aksi_inbox as i", "o.id_obat = i.id_obat", "left");
        $this->db->join("detail_obat as d", "o.id_obat = d.id", "left");
        $this->db->join("barang_masuk as m", "o.id_obat = m.id_obat", "left");
        $this->db->join("satuan as n", "d.id_satuan = n.id", "left");
        $this->db->join("aksi_awal as w", " o.id_obat = w.id_obat", "left");
        $this->db->where("o.modified_on BETWEEN '$date1' AND '$date2'");
        $this->db->group_by("id_obat, hari");


        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function getLaporan1()
    {

        $date1 = "2020-02-01";
        $date2 = "2020-02-31";

        $query = "SELECT `aksi_outbox`.`id_obat`, `detail_obat`.`nama_obat`
                    FROM `aksi_outbox` JOIN `detail_obat` 
                    ON `aksi_outbox`.`id_obat` = `detail_obat`. `id`
                     GROUP BY `id`";


        $query =  $this->db->query($query);
        $data =  $query->result_array();
        return $data;
    }



    public function queryOutbox1()
    {

        $this->db->select("*");
        $this->db->from("aksi_outbox");
        $this->db->join("detail_obat", "aksi_outbox.id_obat = detail_obat.id", "left");
        $this->db->join("aksi_inbox", "aksi_outbox.id_obat = aksi_inbox.id_obat", "left");


        $query = $this->db->get();
        return $query->result_array();
    }


    public function obatReport()
    {
        $date1 = "2020-02-01";
        $date2 = "2020-02-31";

        $this->db->select("o.jumlah as jumlah_outbox, d.id as obat, i.jumlah as jumlah_inbox");
        $this->db->from("aksi_outbox as o");
        $this->db->join("detail_obat as d", "o.id_obat = d.id", "left");
        $this->db->join("aksi_inbox as i", "o.id_obat = i.id_obat", "left");
        $this->db->where("o.modified_on BETWEEN '$date1' AND '$date2'");
        $this->db->group_by("d.id");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function aksiReport()
    {
        $date1 = "2020-02-01";
        $date2 = "2020-02-31";


        $this->db->select(" d.nama_obat as nama_obat,
                            o.jumlah as jumlah_outbox, i.jumlah as jumlah_inbox, 
                            d.kode_obat as kode_obat, m.anggaran as anggaran, n.satuan as satuan,
                            d.harga as harga");
        $this->db->from("aksi_outbox as o");
        $this->db->join("aksi_inbox as i", "o.id_obat = i.id_obat", "left");
        $this->db->join("detail_obat as d", "o.id_obat = d.id", "left");
        $this->db->join("barang_masuk as m", "o.id_obat = m.id_obat", "left");
        $this->db->join("satuan as n", "d.id_satuan = n.id", "left");
        $this->db->where("o.modified_on BETWEEN '$date1' AND '$date2'");



        $query = $this->db->get();
        $data = $query->result_array();
    }
}
