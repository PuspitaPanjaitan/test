<?php

class Awal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Awal_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {

        $data['title'] = 'Daftar Stok Awal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['rekan'] = $this->Awal_model->getAllRekan();
        $data['detail'] = $this->Awal_model->getAllDetail();
        $data['satuan'] = $this->Awal_model->getAllSatuan();

        //pagination
        $config['base_url'] = 'http://localhost/puskes/awal/index';
        $config['total_rows'] = $this->Awal_model->countData();
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = ' </ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li">';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li">';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li">';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li">';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li">';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li">';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['stok'] = $this->Awal_model->DataAwal($config['per_page'], $data['start']);



        $this->form_validation->set_rules('id_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('id_supplier', 'Rekan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('awal/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Awal_model->tambahDataAwal();
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('awal');
        }
    }

    public function hapus($id)
    {
        $this->Awal_model->hapusDataAwal($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('awal');
    }

    public function ubah()
    {
        $data['title'] = 'Daftar Stok Awal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['rekan'] = $this->Awal_model->getAllRekan();
        $data['detail'] = $this->Awal_model->getAllDetail();
        $data['satuan'] = $this->Awal_model->getAllSatuan();

        //pagination
        $config['base_url'] = 'http://localhost/puskes/awal/index';
        $config['total_rows'] = $this->Awal_model->countData();
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = ' </ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li">';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li">';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li">';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li">';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li">';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li">';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['stok'] = $this->Awal_model->DataAwal($config['per_page'], $data['start']);


        $this->form_validation->set_rules('id_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('id_supplier', 'Rekan', 'required');
        $this->form_validation->set_rules('anggaran', 'Anggaran', 'required');
        $this->form_validation->set_rules('petugas', 'Petugas', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('awal/index');
            $this->load->view('templates/footer');
        } else {
            $this->Awal_model->ubahDataAwal();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('awal/index');
        }
    }

    public function aksi()
    {
        $data['title'] = 'Daftar Stok Awal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['rekan'] = $this->Awal_model->getAllRekan();
        $data['detail'] = $this->Awal_model->getAllDetail();
        $data['satuan'] = $this->Awal_model->getAllSatuan();

        //pagination
        $config['base_url'] = 'http://localhost/puskes/awal/index';
        $config['total_rows'] = $this->Awal_model->countData();
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = ' </ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li">';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li">';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li">';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li">';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li">';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li">';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['stok'] = $this->Awal_model->DataAwal($config['per_page'], $data['start']);




        $this->form_validation->set_rules('id_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('awal/index');
            $this->load->view('templates/footer');
        } else {
            $this->Awal_model->aksiDataStok();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('awal');
        }
    }
}
