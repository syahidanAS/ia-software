<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_admin');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
    }
    public function index()
    {
        if ($this->session->userdata('status') == 'login') {
            redirect('Admin/dashboard');
        }
        $this->load->view('admin/login_view');
    }
    public function login_process()
    {
        $sID = $this->input->post("sID");
        $where = array(
            'pin' => $sID
        );
        $cek = $this->M_admin->checking('admin_pin', $where)->num_rows();
        if ($cek > 0) {
            $data_session = array(
                'pin' => $sID,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            // redirect("Dashboard_admin");
            redirect(base_url('Admin/dashboard'));
        } else {
            $this->session->set_flashdata("fail", '<div class="btn btn-danger">PIN SALAH!</div>');
            redirect("Login");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
