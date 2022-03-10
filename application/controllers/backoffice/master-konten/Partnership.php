<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Partnership extends CI_Controller
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
        $this->table = "slider";
        $this->where = "mitra";
    }

   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'partnership';
        $data['title'] = 'Partnership';
        $data['page'] = $function;
        $data['content'] = $function;
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }

    public function read($page=1){
        $where = "type='".$this->where."'";
        if (isset($_POST['any']) && $_POST['any'] != null && $_POST['any'] != '') {
            $where .="AND title LIKE '%" .$_POST['any'] ."%'";
        }
        $table = $this->table;
        $pagin = $this->M_crud->myPagination($table,'id',$where,12,5);
        $output = '';
        $read_data = $this->M_crud->read_data($table,'*',$where,'id desc',null,$pagin['perPage'],$pagin['start']);
        $no = $pagin['start']+1;
        if ($read_data != null) {
            foreach ($read_data as $row) {
                $output .=
                '
                <div class="col-sm-6 col-lg-3 col-md-4 webdesign illustrator">
                    <div class="gal-detail thumb">
                        <a href="'.base_url().$row['image'].'" class="image-popup" title="Screenshot-1">
                            <img src="'.base_url().$row['image'].'" class="thumb-img" alt="work-thumbnail">
                        </a>
                        <h4><a href="#!" onclick="hapus(\'' .$row['id'] .'\')">Hapus</a></h4>
                    </div>
                </div>
                
                ';
            }
        }
        $result = [
            'pagination_link' => $pagin['pagination_link'],
            'result_table' => $output,
        ];
        echo json_encode($result);
    }  
   
    public function simpan(){
        $this->db->trans_begin();
        $response = ["status"=>false];
        $data = [
            'title' => $_POST['title'],
            'desc' => "-",
            'type' => $this->where,
        ];
        if($_FILES['file_upload']['name'] !=""){
            $data["image"] = $this->M_crud->configUploads("mitra",$_POST['file_uploaded'],$_FILES['file_upload'],'file_upload');
        }
        if ($_POST['param'] == 'add') {
            $this->M_crud->create_data($this->table,$data);
        } else {
            $this->M_crud->update_data($this->table,$data,"id='" . $_POST['id'] . "'");
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
   
}