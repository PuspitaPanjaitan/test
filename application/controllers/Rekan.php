<?php

class Rekan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekanan_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Form Rekanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();


        //pagination
        $config['base_url'] = 'http://localhost/puskes/rekan/index';
        $config['total_rows'] = $this->Rekanan_model->countData();
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


        $data['rekan'] = $this->Rekanan_model->getAllRekan($config['per_page'], $data['start']);


        $this->form_validation->set_rules('nama_supplier', 'Nama', 'required');
        $this->form_validation->set_rules('petugas', 'Petugas', 'required');
        $this->form_validation->set_rules('status_keterangan', 'Status', 'required');
        $this->form_validation->set_rules('no_kontrak', 'No. Kontrak', 'required');
        $this->form_validation->set_rules('tanggal1', 'Tanggal Kontrak', 'required');
        $this->form_validation->set_rules('no_bas', 'No. BAS', 'required');
        $this->form_validation->set_rules('tanggal2', 'Tanggal BAS', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekanan/index');
            $this->load->view('templates/footer');
        } else {
            echo "berhasil";
            $this->Rekanan_model->TambahDataRekan();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('rekan');
        }
    }


    public function hapus($id)
    {
        $this->Rekanan_model->hapusDataRekan($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('rekan');
    }


    public function ubah()
    {
        $data['title'] = 'Form Ubah data Rekanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        //pagination
        $config['base_url'] = 'http://localhost/puskes/rekan/index';
        $config['total_rows'] = $this->Rekanan_model->countData();
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


        $data['rekan'] = $this->Rekanan_model->getAllRekan($config['per_page'], $data['start']);





        $this->form_validation->set_rules('nama_supplier', 'Nama', 'required');
        $this->form_validation->set_rules('no_kontrak', 'No. Kontrak', 'required');
        $this->form_validation->set_rules('no_bas', 'No. BAS Pemeriksaan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status_keterangan', 'Status', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekanan/index');
            $this->load->view('templates/footer');
        } else {

            $this->Rekanan_model->ubahDataRekan();
            $this->session->set_flashdata('flash', 'diubah');

            redirect('rekan');
        }
    }
}
