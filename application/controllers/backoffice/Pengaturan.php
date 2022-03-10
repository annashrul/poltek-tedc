<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Pengaturan extends CI_Controller
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

   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'pengaturan';
        $data['title'] = 'Pengaturan';
        $data['page'] = $function;
        $data['content'] = $function;
        $data["result"] = $this->M_crud->get_data("site","*");
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }

    public function simpan(){
        $data=array(
            "id"=>$_POST["id"],
            "name"=>$_POST["name"],
            "email"=>$_POST["email"],
            "phone"=>$_POST["phone"],
            "address"=>$_POST["address"],
            "facebook"=>$_POST["facebook"],
            "twitter"=>$_POST["twitter"],
            "instagram"=>$_POST["instagram"],
        );
        if($_FILES['file_upload']['name'] !=""){
            $data["logo"] = $this->M_crud->configUploads("section",$_POST['file_uploaded'],$_FILES['file_upload']);
        }
       
        $update = $this->M_crud->update_data("site",$data,"id='" . $_POST['id'] . "'");
        $response = ['status' => $update];
        echo json_encode($response);
    }

   
}