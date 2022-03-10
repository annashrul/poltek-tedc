<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->output->set_header(
            'Cache-Control: no-store, no-cache, max-age=0, post-check=0, pre-check=0'
        );
        $this->id = $this->session->id;
    }
    public function index()
    {
        if($this->id!=null||$this->id!=""){
            redirect("backoffice/dashboard");
        }
        $this->load->view('bo/pages/auth');
    }
    public function login()
    {
        $getData=$this->M_crud->get_data("user","*","username='".$_POST['username']."'");

        if($getData==null){
            $response = array("status"=>false,"message"=>"username tidak ditemukan","data"=>$getData);
        }
        else{
            $password = $getData["password"];
            if(base64_decode($password) != $_POST['password']){
                $response = array("status"=>false,"message"=>"password tidak sesuai");
            }
            else{
                $response = array("status"=>true,"message"=>"data ditemukan");
                $this->session->set_userdata("id",$getData["id"]);
                $this->session->set_userdata("username",$getData["username"]);
                $this->session->set_userdata("name",$getData["name"]);
            }
        }
        echo json_encode($response);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("backoffice/auth");
    }
   
}