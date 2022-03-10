<?php
/**
 * Created by PhpStorm.
 * User: annashrulyusuf
 * Date: 2/16/2022
 * Time: 2:43 AM
 */

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->output->set_header(
            'Cache-Control: no-store, no-cache, max-age=0, post-check=0, pre-check=0'
        );
        $this->site = $this->M_crud->get_data('site', '*');
        $this->id = $this->session->id;
        if($this->id==null||$this->id==""){
            redirect("backoffice/auth/logout");
        }
    }

    public function index(){
        $data['site'] = $this->site;
        $function = 'profile';
        $data['title'] = 'Profile';
        $data['page'] = $function;
        $data['content'] = $function;
        $data["result"] = $this->M_crud->get_data("user","*","id='".$this->id."'");
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }

    public function simpan(){
        $data=array(
            "username" => $_POST['username'],

        );
        if($_POST['password']!=""){
            $data=array("password" => base64_encode($_POST['password']));
        }
        $update = $this->M_crud->update_data("user",$data,"id='" . $this->id . "'");

        $response = ['status' => $update];
        echo json_encode($response);
    }

}