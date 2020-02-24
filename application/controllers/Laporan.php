<?php

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('tanggal_obat', 'Tanggal 1', 'required');
        $this->form_validation->set_rules('tanggal_obat1', 'Tanggal 2', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Report_model->queryBaru();
            redirect('report');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hari']  = $this->Report_model->obatReport();
        $data['awal'] = $this->Report_model->getLaporan();
        $data['query'] = $this->Report_model->queryBaru();


        $this->form_validation->set_rules('tanggal1', 'Tanggal 1', 'required');
        $this->form_validation->set_rules('tanggal2', 'Tanggal 2', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Report_model->queryBaru();

            $tmp = [];
            foreach ($data['query'] as $val) {
                $tmp[$val['tanggal']][$val['id_obat']] = $val['total_outbox'];
            }
            $data['query'] = $tmp;

            // var_dump($data['query']);
            // die();

            $this->load->view('report/index', $data);
        }
    }
}
