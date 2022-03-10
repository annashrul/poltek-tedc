<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Ormawa extends CI_Controller
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
        $this->table = "organization";
    }

   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'ormawa';
        $data['title'] = 'Ormawa';
        $data['page'] = $function;
        $data['content'] = $function;
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }

    public function read($page=1){
        $where = '';
        if (isset($_POST['any']) && $_POST['any'] != null && $_POST['any'] != '') {
            $where .="organization_name LIKE '%" .$_POST['any'] ."%'";
        }
        $table = "view_organization";
        $pagin = $this->M_crud->myPagination($table,'organization_id',$where,5,5);
        $output = '';
        $read_data = $this->M_crud->read_data($table,'*',$where,'organization_id desc',null,$pagin['perPage'],$pagin['start']);
        $output .= /** @lang text */ '
        <thead>
        <tr>
            <th width="1%">No</th>
            <th width="1%" class="text-center">#</th>
            <th>Nama</th>
            <th width="1%">Jurusan</th>
            <th width="1%">Link</th>
            <th width="1%" class="text-center">Gambar</th>
        </tr>
        </thead>
        <tbody>
        ';
        $no = $pagin['start']+1;
        if ($read_data != null) {
            foreach ($read_data as $row) {
                $output .=
                '<tr>
                    <td align="center">'.$no++ .'</td>
                    <td align="center">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-position">
                            <li><a href="#!" onclick="edit(\'' .$row['organization_id'] .'\')">Edit</a></li>
                            <li><a href="#!" onclick="hapus(\'' .$row['organization_id'] .'\')">Delete</a></li>
                        </ul>
                    </div>
                    </td>
                    <td>' .$row['organization_name'] .'</td>
                    <td>' .$row['vocational_name'] .'</td>
                    <td><a href="' .$row['organization_link'] .'">' .$row['organization_link'] .'</a></td>
                    <td class="text-center">
                        <div class="inbox-item-img"><img style="height:30px;width:30px" src="' .base_url().$row['organization_image'] .'" class="img-circle" ></div>
                    </td>
                </tr>
                ';
            }
        } else {
            $output .='<tr><td colspan="8" class="text-center">Tidak ada data</td></tr>';
        }
        $output .='</tbody>';
        $result = [
            'pagination_link' => $pagin['pagination_link'],
            'result_table' => $output,
        ];
        echo json_encode($result);
    }
   
    public function simpan(){
        $response = ["status"=>false];
        $this->db->trans_begin();
        $data = [
            'name' => $_POST['name'],
            'id_vocational' => $_POST['id_vocational'],
            'link' => $_POST['link'],
            'desc' => $_POST['deskripsi'],
        ];
        if($_FILES['file_upload']['name'] !=""){
            $data["image"] = $this->M_crud->configUploads("organisasi",$_POST['file_uploaded'],$_FILES['file_upload'],'file_upload');
        }
        
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
        $get_id = $this->M_crud->get_data($this->table,'*',"id='" . $_POST['id'] . "'");
        unlink($get_id['image']);
        $where = ['id' => $_POST['id']];
        $result = $this->M_crud->delete_data($this->table, $where);
        echo json_encode(['status' => $result]);
    }
    public function check_column(){
        $where = "name='" . $_POST['name'] . "'";
        $_POST['param'] == 'edit'? ($where .= " AND name <>'" . $_POST['name'] . "'") : null;
        $isExist = $this->M_crud->get_data($this->table,'name',$where);
        echo $isExist == null ? 'true' : 'false';
    }
    public function get_option(){
        $where = null;
        if(isset($_POST["any"])){
            $where.="id='".$_POST['any']."'";
        }
        $read = $this->M_crud->read_data($this->table,'*',$where,'name ASC');
        $output = '';
        $output .= '<option value="">Pilih</option>';
        if ($read != null) {
            foreach ($read as $row) {
                $output .='<option value="' .$row['id'] .'">' .$row['name'] .'</option>';
            }
        }
        echo json_encode(['output' => $output]);
    }

    
   
}