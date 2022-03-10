<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->output->set_header(
            'Cache-Control: no-store, no-cache, max-age=0, post-check=0, pre-check=0'
        );
        $this->site = $this->M_crud->get_data('site', '*');
        $this->id = $this->session->id_user;
		$this->f1 = $this->M_crud->get_data('section','*','id=4','id desc');
		$this->f2 = $this->M_crud->get_data('section','*','id=5','id desc');
		$this->f3 = $this->M_crud->get_data('section','*','id=6','id desc');
		$this->d3 = $this->M_crud->read_data('vocational','*','id_program=1','created_at asc');
		$this->d4 = $this->M_crud->read_data('vocational','*','id_program=4','created_at asc');
    }
    public function getUserAgent(){
        $this->load->library('user_agent');
        $user_ip = $_SERVER['REMOTE_ADDR'];
//        $user_ip = file_get_contents('https://api.ipify.org');
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Other';
        }

        $cek_ip = $this->M_crud->read_data("visitor", "COUNT(ip_visitor) AS jml", array("ip_visitor" => $user_ip));
        $isExist = $cek_ip[0]['jml'];
        if ($isExist == 0) {
            $this->M_crud->create_data("visitor", array(
                "ip_visitor" => $user_ip,
                "browser_visitor" => $agent,
                "platform" => $this->agent->platform(),
                "full_info" => $_SERVER['HTTP_USER_AGENT'],

            ));
        }
        return;
    }

	public function index(){
        $this->getUserAgent();
		$data['site'] = $this->site;
        $function = 'home';
        $data['title'] = 'Beranda';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['slider'] = $this->M_crud->read_data('slider','*','type="slider"','id desc');
		$data['video'] = $this->M_crud->read_data('slider','*','type="video"','id desc');
		$data['mitra'] = $this->M_crud->read_data('slider','*','type="mitra"','id desc');
		$data['sejarah'] = $this->M_crud->get_data('section','*','id=1','id desc');
		$data['sc_testimoni'] = $this->M_crud->get_data('section','*','id=2','id desc');
		$data['sc_mitra'] = $this->M_crud->get_data('section','*','id=3','id desc');
		$data['testimoni'] = $this->M_crud->read_data('v_testi','*','','id desc');
		$data['berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"  and information_status=1','information_id desc',null,6);
        $this->load->view('fo/component/index', $data);

	}
}
