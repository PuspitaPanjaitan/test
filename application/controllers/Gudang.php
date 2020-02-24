<?php

class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gudang_model');
        $this->load->library('form_validation');
    }

    public function index()

    {
        $data['title'] = 'Gudang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gudang'] = $this->Gudang_model->getAllGudang();
        if ($this->input->post('keyword')) {
            $data['gudang'] = $this->Gudang_model->cariDataGudang();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gudang/index', $data);
        $this->load->view('templates/footer');
    }



    public function tambah()
    {
        $data['title'] = 'Form Tambah Gudang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        //$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['name'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $this->form_validation->set_rules('nama_gudang', 'Nama', 'required');
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gudang/tambah');
            $this->load->view('templates/footer');
        } else {
            echo "berhasil";
            $this->Gudang_model->TambahDataGudang();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('gudang');
        }
    }

    public function hapus($id)
    {
        $this->Gudang_model->hapusDataGudang($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('gudang');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Gudang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gudang'] = $this->Gudang_model->getDataGudangById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gudang/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Form Ubah data Gudang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gudang'] = $this->Gudang_model->getDataGudangbyId($id);



        $this->form_validation->set_rules('nama_gudang', 'Nama', 'required');
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gudang/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Gudang_model->ubahDataGudang();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('gudang');
        }
    }
}
