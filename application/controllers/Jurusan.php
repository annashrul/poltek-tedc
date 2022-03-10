<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

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

	public function index(){
        $search=$this->input->get('q', TRUE);
		$data['site'] = $this->site;
        $function = 'jurusan';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Jurusan';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $data['side_berita'] = $this->M_crud->read_data('view_information','*',$where,'information_id desc',null,6);
        $data['category'] = $this->M_crud->read_data('view_information_category','*','type_name="Berita"','category_id desc',null,6);

        $this->load->view('fo/component/index', $data);
    }
    public function get($jurusan){
        $data['site'] = $this->site;
        $function = 'jurusan';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['datum'] = $this->M_crud->get_data('view_vocational','*','vocational_slug="'.$jurusan.'"');
        $data['title'] =$data['datum']['vocational_name'];
        $data['deskripsi'] =  $data['datum']['program_name'];
        $this->load->view('fo/component/index', $data);
    }
}
