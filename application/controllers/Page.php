<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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

	public function profile(){
		$data['site'] = $this->site;
        $function = 'page';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['profil'] = $this->M_crud->get_data('section','*','id=7','id desc');
        $data['title'] = $data['profil']['title'];
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $this->load->view('fo/component/index', $data);
	}

    public function sejarah(){
		$data['site'] = $this->site;
        $function = 'page';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['profil'] = $this->M_crud->get_data('section','*','id=1','id desc');
        $data['title'] = $data['profil']['title'];
        $data['deskripsi'] ='';
        $this->load->view('fo/component/index', $data);
	}

    public function struktur(){
		$data['site'] = $this->site;
        $function = 'page';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['profil'] = $this->M_crud->get_data('section','*','id=8','id desc');
        $data['title'] = $data['profil']['title'];
        $data['deskripsi'] ='';
        $this->load->view('fo/component/index', $data);
	}

    public function jabatan_struktural(){
		$data['site'] = $this->site;
        $function = 'page';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['profil'] = $this->M_crud->get_data('section','*','id=9','id desc');
        $data['title'] = $data['profil']['title'];
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $this->load->view('fo/component/index', $data);
	}

    public function fasilitas(){
		$data['site'] = $this->site;
        $function = 'fasilitas';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Fasilitas';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $pagin = $this->M_crud->paginationFO(
            'view_facility',
            'facility_id',
            '',
            18,
            3,
            'page/fasilitas'
        );
        $data['datum'] = $this->M_crud->read_data('view_facility','*','','facility_id desc',null,$pagin['perPage'],$pagin['start']);
        $data['pagination_link'] = $pagin['pagination_link'];

        $this->load->view('fo/component/index', $data);
	}

    public function kalender_akademik(){
		$data['site'] = $this->site;
        $function = 'page';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['profil'] = $this->M_crud->get_data('section','*','id=11','id desc');
        $data['title'] = $data['profil']['title'];
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $this->load->view('fo/component/index', $data);
	}

    public function ormawa(){
		$data['site'] = $this->site;
        $function = 'ormawa';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['datum'] = $this->M_crud->get_data('view_organization','*',null,'organization_id desc');
        $data['title'] = 'Organisasi Mahasiswa';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $this->load->view('fo/component/index', $data);
	}

    

    public function tracer_study(){
		$data['site'] = $this->site;
        $function = 'page';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
		$data['profil'] = $this->M_crud->get_data('section','*','id=13','id desc');
        $data['title'] = $data['profil']['title'];
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $this->load->view('fo/component/index', $data);
	}

    public function kemahasiswaan(){
		$data['site'] = $this->site;
        $function = 'kemahasiswaan';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Agenda Kemahasiswaan';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $data['berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"  and information_status=1','information_id desc',null,5);
        $pagin = $this->M_crud->paginationFO(
            'view_information',
            'information_id',
            'type_name="Kemahasiswaan"',
            4,
            3,
            'page/kemahasiswaan'
        );
        $data['side_berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"','information_id desc',null,3);

        $data['datum'] = $this->M_crud->read_data('view_information','*','type_name="Kemahasiswaan"','information_id desc',null,$pagin['perPage'],$pagin['start']);
        $data['pagination_link'] = $pagin['pagination_link'];

        $this->load->view('fo/component/index', $data);
	}

    public function karir(){
		$data['site'] = $this->site;
        $function = 'kemahasiswaan';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Pusat Karir';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $data['berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"  and information_status=1','information_id desc',null,5);
        $pagin = $this->M_crud->paginationFO(
            'view_information',
            'information_id',
            'type_name="Karir"',
            4,
            3,
            'page/karir'
        );
        $data['side_berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"','information_id desc',null,3);

        $data['datum'] = $this->M_crud->read_data('view_information','*','type_name="Karir"','information_id desc',null,$pagin['perPage'],$pagin['start']);
        $data['pagination_link'] = $pagin['pagination_link'];

        // ( $table,$field,$where = null,$order = null,$group = null,$limit_sum = 0,$limit_from = 0,$having )

        $this->load->view('fo/component/index', $data);
	}

    public function beasiswa(){
		$data['site'] = $this->site;
        $function = 'kemahasiswaan';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Pusat Karir';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $data['berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"  and information_status=1','information_id desc',null,5);
        $pagin = $this->M_crud->paginationFO(
            'view_information',
            'information_id',
            'type_name="Beasiswa"',
            4,
            3,
            'page/beasiswa'
        );
        $data['side_berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"','information_id desc',null,3);

        $data['datum'] = $this->M_crud->read_data('view_information','*','type_name="Beasiswa"','information_id desc',null,$pagin['perPage'],$pagin['start']);
        $data['pagination_link'] = $pagin['pagination_link'];

        $this->load->view('fo/component/index', $data);
	}

    public function download(){
		$data['site'] = $this->site;
        $function = 'download';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Download';
        $data['deskripsi'] ='';
        $pagin = $this->M_crud->paginationFO(
            'view_information',
            'information_id',
            'type_name="Files"',
            4,
            3,
            'page/Files'
        );
        $data['datum'] = $this->M_crud->read_data('view_information','*','type_name="Files"  and information_status=1','information_id desc',null,$pagin['perPage'],$pagin['start']);
        $data['pagination_link'] = $pagin['pagination_link'];

        $this->load->view('fo/component/index', $data);
	}

    public function dosen(){
		$data['site'] = $this->site;
        $function = 'dosen';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Dosen';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $pagin = $this->M_crud->paginationFO(
            'view_lecturer',
            'lecturer_id',
            'lecturer_status=1',
            4,
            3,
            'page/dosen'
        );
        $data['datum'] = $this->M_crud->read_data('view_lecturer','*','lecturer_status=\'1\'','lecturer_id desc',null,$pagin['perPage'],$pagin['start']);
        $data['pagination_link'] = $pagin['pagination_link'];

        $this->load->view('fo/component/index', $data);
	}
    
    public function program_studi(){
		$data['site'] = $this->site;
        $function = 'program_studi';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['title'] = 'Program Studi';
        $data['deskripsi'] ='Politeknik TEDC Bandung';
        $data['datum'] = $this->M_crud->read_data('view_vocational','*',null,'program_id desc, vocational_id asc');

        $this->load->view('fo/component/index', $data);
	}

    public function detail($slug){
		$data['site'] = $this->site;
        $function = 'kemahasiswaan-detail';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['f1'] = $this->f1;
        $data['f2'] = $this->f2;
        $data['f3'] = $this->f3;
        $data['d3'] = $this->d3;
        $data['d4'] = $this->d4;
        $data['side_berita'] = $this->M_crud->read_data('view_information','*','type_name="Berita"','information_id desc',null,3);
        $data['datum'] = $this->M_crud->get_data('view_information','*','information_slug="'.$slug.'"');
        $data['title'] = $data['datum']['information_title'];
        $data['deskripsi'] ='';

        $this->load->view('fo/component/index', $data);
	}
    
}
