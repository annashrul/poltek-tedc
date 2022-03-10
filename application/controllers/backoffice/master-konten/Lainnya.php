<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Lainnya extends CI_Controller
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
        $this->table = "section";
    }
    
   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'lainnya';
        $data['title'] = 'Lainnya';
        $data['page'] = $function;
        $data['content'] = $function;
        $data["result"]=$this->M_crud->read_data($this->table,"*","type!='background'");
        $data["background"]=$this->M_crud->read_data($this->table,"*","type='background'");
        $this->load->view('bo/layout/index', $data);
    }
    public function read(){
        $result=$this->M_crud->get_data($this->table,"*","id='".$_POST['id']."'");
        echo json_encode($result);
    }

    public function simpanBackground(){
        $name=$this->M_crud->read_data($this->table,"*","type='background'");;
        $update=false;
        foreach ($name as $val){
            $label = strtolower(str_replace(' ','_',$val['title']));
            if($_FILES[$label]['name'] !=""){
                $img=$this->M_crud->configUploads("background",$_POST[$label.'ed'],$_FILES[$label],$label);
                $field = array("image"=>$img);
                $update = $this->M_crud->update_data($this->table,$field,"id='" . $val['id'] . "'");
            }
        }

        if($update){
            echo '<script>alert("data berhasil disimpan");window.location.href="'.base_url().'backoffice/master-konten/lainnya'.'"</script>';
        }
        else{
            echo '<script>alert("data gagal disimpan");</script>';
        }
    }

    public function simpan(){
        $data=[
            "desc"=>$_POST['desc'],
            "title"=>$_POST['title'],
        ];
        if($_FILES['file_upload'.$_POST["id"]]['name'] !=""){
            $data["image"] = $this->M_crud->configUploads("lainnya",$_POST['file_uploaded'.$_POST["id"]],$_FILES['file_upload'.$_POST["id"]],"file_upload".$_POST["id"]);
        }
        $update = $this->M_crud->update_data($this->table,$data,"id='" . $_POST['id'] . "'");
        if($update){
            echo '<script>alert("data berhasil disimpan");window.location.href="'.base_url().'backoffice/master-konten/lainnya'.'"</script>';
        }
        else{
            echo '<script>alert("data gagal disimpan");</script>';
        }

    }

   
   
}