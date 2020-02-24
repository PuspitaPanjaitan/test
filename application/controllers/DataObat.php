<?php

class DataObat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataObat_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {

        $data['title'] = 'Daftar Obat';
        //pagination

        $config['base_url'] = 'http://localhost/puskes/dataObat/index';
        $config['total_rows'] = $this->DataObat_model->countData();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);
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


        $data['stok'] = $this->DataObat_model->DataObat($config['per_page'], $data['start']);


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['rekan'] = $this->DataObat_model->getAllRekan();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['detail'] = $this->DataObat_model->getAllDetail();
        $data['satuan'] = $this->DataObat_model->getAllSatuan();




        $this->form_validation->set_rules('kode_obat', 'Kode Obat', 'required');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('id_supplier', 'Rekan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('id_satuan', 'Satuan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_obat/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->DataObat_model->tambahDataObat();
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('dataObat');
        }
    }

    public function hapus($id)
    {
        $this->DataObat_model->hapusDataObat($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('DataObat');
    }

    public function ubah()
    {
        $data['title'] = 'Ubah Stok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['rekan'] = $this->DataObat_model->getAllRekan();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['detail'] = $this->DataObat_model->getAllDetail();

        //pagination

        $config['base_url'] = 'http://localhost/puskes/dataObat/index';
        $config['total_rows'] = $this->DataObat_model->countData();
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


        $data['stok'] = $this->DataObat_model->DataObat($config['per_page'], $data['start']);



        $this->form_validation->set_rules('kode_obat', 'Kode Obat', 'required');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('id_supplier', 'Rekan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data_obat/index');
            $this->load->view('templates/footer');
        } else {
            $this->DataObat_model->ubahDataObat();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('dataObat/index');
        }
    }
}
