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

        $data['title'] = 'Daftar Obat';
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


    public function tambah()
    {
        $data['title'] = 'Tambah Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['status'] = $this->Obat_model->statusObat();

        $this->form_validation->set_rules('nama_obat', 'Nama', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('modified_by', 'Petugas', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('obat/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            echo "berhasil";
            $this->Obat_model->TambahDataObat();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('obat');
        }
    }

    public function hapus($id)
    {
        $this->Obat_model->hapusDataObat($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('obat');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Obat_model->getDataObatById($id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('obat/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Obat_model->getDataObatById($id);


        $this->form_validation->set_rules('nama_obat', 'Nama', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('obat/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Obat_model->ubahDataObat();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('obat');
        }
    }
}
