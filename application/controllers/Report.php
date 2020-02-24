<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->library('form_validation');
    }

    public function index()

    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hari']  = $this->Report_model->obatReport();
        $data['awal'] = $this->Report_model->getLaporan();
        $data['query'] = $this->Report_model->queryBaru();


        $tmp = [];
        foreach ($data['query'] as $val) {
            $tmp[$val['tanggal']][$val['id_obat']] = $val['total_outbox'];
        }
        $data['query'] = $tmp;

        // var_dump($data['query']);
        // die();

        $this->load->view('report/index', $data);
    }
    public function month()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['test']  = $this->Report_model->queryOutbox();
        $data['coba']  = $this->Report_model->getLaporan();

        $this->load->view('report/index', $data);
    }
}
