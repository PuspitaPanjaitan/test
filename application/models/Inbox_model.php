<?php

class Inbox_model extends CI_model
{
    public function getAllRekan()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function getAllDetail()
    {
        return $this->db->get('detail_obat')->result_array();
    }


    public function getAllInbox()
    {
        return $this->db->get('barang_masuk')->result_array();
    }



    public function hapusDataInbox($id)
    {
        $this->db->delete('barang_masuk', ['id' => $id]);
    }


    public function getDataInById($id)
    {
        return $this->db->get_where('barang_masuk', ['id' => $id])->row_array();
    }

    public function tambahDataInbox()
    {
        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $data = [
            'id_obat' => $this->input->post('id_obat'),
            'id_supplier' => $this->input->post('id_supplier'),
            'tahun_pembuatan' => $this->input->post('tahun_pembuatan'),
            'anggaran' => $this->input->post('anggaran'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => $this->input->post('tanggal')



        ];
        $this->db->insert('barang_masuk', $data);
    }


    public function ubahDataInbox()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $data = [
            'id_obat' => $this->input->post('id_obat'),
            'id_supplier' => $this->input->post('id_supplier'),
            'tahun_pembuatan' => $this->input->post('tahun_pembuatan'),
            'anggaran' => $this->input->post('anggaran'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'keterangan' => $this->input->post('keterangan')

        ];


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('barang_masuk', $data);
    }


    public function aksiDataInbox()
    {

        $date = new \DateTime("now");
        $date1 = $date->format('Y-m-d');
        $a = $this->input->post('jumlah');
        $b = $this->input->post('harga');
        $c = $a * $b;
        $data = [

            'id_obat' => $this->input->post('id_obat'),
            'id_inbox' => $this->input->post('id_masuk'),
            'jumlah' => $this->input->post('jumlah'),
            'modified_by' => $this->input->post('petugas'),
            'modified_on' => $date1,
            'total' => $c

        ];
        $this->db->insert('aksi_inbox', $data);
    }

    public function cariDataObat()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_obat', $keyword);
        $this->db->or_like('satuan', $keyword);
        return $this->db->get('obat')->result_array();
    }


    public function queryInbox($limit, $start)
    {

        $this->db->select("b.id as id_masuk, b.tanggal as tanggal, b.modified_by as petugas, b.keterangan as ket,
                            d.nama_obat as nama_obat, s.nama_supplier as nama_supplier, d.id as id_obat,
                             b.tahun_pembuatan as tahun_pembuatan, b.anggaran as anggaran, d.harga as harga,
                             jumlah as jumlah");
        $this->db->from("barang_masuk as b");
        $this->db->join("detail_obat as d", "b.id_obat = d.id", "left");
        $this->db->join("supplier as s", "b.id_supplier = s.id", "left");
        $this->db->join("aksi_inbox as a", "a.id_inbox =  b.id", "left");
        $this->db->group_by("b.id_obat");

        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
    public function countData()
    {
        return $this->db->get('barang_masuk')->num_rows();
    }
}
