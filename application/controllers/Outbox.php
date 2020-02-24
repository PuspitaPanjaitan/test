<?php

class Outbox extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Outbox_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {

        $data['title'] = 'Daftar Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Outbox_model->getAllDetail();
        $data['rekan'] = $this->Outbox_model->getAllRekan();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['getoutbox'] = $this->Outbox_model->getAllOutbox();
        $data['kepada'] = $this->Outbox_model->getKepada();

        //pagination
        $config['base_url'] = 'http://localhost/puskes/outbox/index';
        $config['total_rows'] = $this->Outbox_model->countData();
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

        $data['outbox'] = $this->Outbox_model->queryOutbox($config['per_page'], $data['start']);


        $this->form_validation->set_rules('id_obat', 'Id Obat', 'required');
        $this->form_validation->set_rules('id_supplier', 'Rekan', 'required');
        $this->form_validation->set_rules('kepada', 'Kepada', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('outbox/index');
            $this->load->view('templates/footer');
        } else {
            $this->Outbox_model->tambahDataOutbox();
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('outbox');
        }
    }

    public function hapus($id)
    {
        $this->Outbox_model->hapusDataOutbox($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('outbox');
    }

    public function ubah()
    {
        $data['title'] = 'Daftar Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Outbox_model->getAllDetail();
        $data['rekan'] = $this->Outbox_model->getAllRekan();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['getoutbox'] = $this->Outbox_model->getAllOutbox();
        $data['kepada'] = $this->Outbox_model->getKepada();



        //pagination
        $config['base_url'] = 'http://localhost/puskes/outbox/index';
        $config['total_rows'] = $this->Outbox_model->countData();
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

        $data['outbox'] = $this->Outbox_model->queryOutbox($config['per_page'], $data['start']);




        $this->form_validation->set_rules('id_obat', 'Id Obat', 'required');
        $this->form_validation->set_rules('id_supplier', 'Rekan', 'required');
        $this->form_validation->set_rules('kepada', 'Kepada', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('outbox/index');
            $this->load->view('templates/footer');
        } else {
            $this->Outbox_model->ubahDataOutbox();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('outbox/index');
        }
    }

    public function aksi()
    {
        $data['title'] = 'Daftar Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Outbox_model->getAllDetail();
        $data['rekan'] = $this->Outbox_model->getAllRekan();
        $data['nama'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['getoutbox'] = $this->Outbox_model->getAllOutbox();
        $data['kepada'] = $this->Outbox_model->getKepada();

        //pagination
        //$data['outbox'] = $this->Outbox_model->queryOutbox();

        $config['base_url'] = 'http://localhost/puskes/outbox/index';
        $config['total_rows'] = $this->Outbox_model->countData();
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

        $data['outbox'] = $this->Outbox_model->queryOutbox($config['per_page'], $data['start']);




        $this->form_validation->set_rules('id_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('inbox/index');
            $this->load->view('templates/footer');
        } else {
            $this->Outbox_model->aksiDataOutbox();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('outbox');
        }
    }
}
