<?php

class Obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'Daftar Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Obat_model->getAllObat();
        if ($this->input->post('keyword')) {
            $data['obat'] = $this->Obat_model->cariDataObat();
        }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('obat/index', $data);
        $this->load->view('templates/footer');
    }
}
