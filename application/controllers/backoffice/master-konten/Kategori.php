<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Kategori extends CI_Controller
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
        $this->table = "information_category";
    }

    
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'Kategori';
        $data['title'] = 'kategori';
        $data['page'] = $function;
        $data['content'] = $function;
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }

    public function read($type){
        $where = "type_name='".$type."'";
        $table = "view_information_category";
        $read_data = $this->M_crud->read_data($table,'*',$where,'category_id desc');
        $output='
            <div class="row">
                <div class="checkbox checkbox-warning checkbox-circle">
                    <input id="checkbox11" type="checkbox" disabled checked>
                    <label for="checkbox11" style="width:100%">
                        <small style="font-weight:bold" onclick="loadData(\'event\',\'' .''.'\')">lihat semua </small> 
                    </label>
                </div>
            </div>
        ';

        foreach($read_data as $row){
            $output.='
                <div class="row">
                    <div class="checkbox checkbox-warning checkbox-circle" id="'.$row['category_name'].'">
                        <input id="checkbox11" type="checkbox" disabled checked>
                        <label for="checkbox11" style="width:100%">
                            <small style="font-weight:bold" onclick="loadData(\'event\',\'' .$row['category_name'] .'\')">'.$row["category_name"].'</small> 
                            <span class="label label-primary" style="float:right;margin-left:1px" onclick="hapus_category(\'' .$row['category_id'] .'\')"><i class="fa fa-close"></i></span>
                            <span class="label label-primary" style="float:right" onclick="edit_category(\'' .$row['category_id'] .'\')"><i class="fa fa-pencil"></i></span>
                        </label>
                    </div>
                </div>
            ';
        }
        echo json_encode(array("output"=>$output));
    }
   
    public function simpan(){
        $response = ["status"=>false];
        $this->db->trans_begin();
        $data = [
            'name' => $_POST['name'],
            'slug' => url_title($_POST['name'], 'dash', true),
            'id_information_type' => $_POST['type_id'],
        ];
        
        if ($_POST['param'] == 'add') {
            $this->M_crud->create_data($this->table,$data);
        } else {
            $update = $this->M_crud->update_data($this->table,$data,"id='" . $_POST['id'] . "'");
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            echo json_encode(['status' => false]);
        } else {
            $this->db->trans_commit();
            echo json_encode(['status' => true]);
        }
    }
    public function edit(){
        $get_data = $this->M_crud->get_data($this->table,'*',"id='" . $_POST['id'] . "'");
        $result = [];
        if ($get_data != null) {
            $result['status'] = true;
            $result['res_data'] = $get_data;
        } else {
            $result['status'] = false;
        }

        echo json_encode($result);
    }
    public function hapus(){
        $where = ['id' => $_POST['id']];
        $result = $this->M_crud->delete_data($this->table, $where);
        echo json_encode(['status' => $result]);
    }
    public function check_column(){
        $where = "type_name='".$_POST['type_name']."' AND category_name='" . $_POST['name'] . "'";
        $_POST['param'] == 'edit'? ($where .= " AND category_name <>'" . $_POST['name'] . "'") : null;
        $isExist = $this->M_crud->get_data("view_information_category",'category_name',$where);
        echo $isExist == null ? 'true' : 'false';
    }
    public function get_option(){
        $where = "type_name='".$_POST['type']."'";
        $read = $this->M_crud->read_data("view_information_category",'*',$where,'category_name ASC');
        $output = '';
        $output .= '<option value="">Pilih</option>';
        if ($read != null) {
            foreach ($read as $row) {
                $output .='<option value="' .$row['category_id'] .'">' .$row['category_name'] .'</option>';
            }
        }
        echo json_encode(['output' => $output]);
    }

    
   
}