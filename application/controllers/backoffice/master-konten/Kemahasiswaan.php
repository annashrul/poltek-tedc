<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Kemahasiswaan extends CI_Controller
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
        $this->table = "information";
    }

   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'kemahasiswaan';
        $data['title'] = 'Kemahasiswaan';
        $data['page'] = $function;
        $data['content'] = $function;
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }
    
    public function read($page=1){
        $where = "type_name='Kemahasiswaan'";
        if (isset($_POST['any']) && $_POST['any'] != null && $_POST['any'] != '') {
            $where .=" AND category_name LIKE '%" .$_POST['any'] ."%' OR type_name LIKE '%" .$_POST['any'] ."%' OR information_title LIKE '%" .$_POST['any'] ."%'";
        }
        $table = 'view_information';
        $pagin = $this->M_crud->myPagination($table,'information_id',$where,5,5);
        $output = '';
        $read_data = $this->M_crud->read_data($table,'*', $where,'information_id desc',null,$pagin['perPage'], $pagin['start']
        );
        
        $no = 1;
        if ($read_data != null) {
            foreach ($read_data as $row) {
                $desc=$row["information_desc"];
                if(strlen($desc)>100){
                    $desc=substr($desc,0,100)." ....";
                }
                $status="Aktif";
                if($row["information_status"]==1){$status="Tidak Aktif";}
                $output .='
                    <article class="postcard light blue">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="'.base_url().$row["information_image"].'" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title blue"><a href="#">'.$row["information_title"].'</a></h1>
                            <ul class="postcard__tagbox">
                                <li class="tag__item play"> <a href="#">'.$row["category_name"].'</a></li>
                                <li class="tag__item play"> <a href="#">'.$status.'</a></li>
                            </ul>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i>'.date("m/d/Y h:i:s A T",strtotime($row["information_created_at"])).' 
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">'.strip_tags($desc).'</div>
                            
                            <ul class="postcard__tagbox">
                                <button class="btn btn-primary btn-sm" onclick="edit(\'' .$row['information_id'] .'\')">Edit</button> &nbsp;
                                <button class="btn btn-primary btn-sm" onclick="hapus(\'' .$row['information_id'] .'\')">Hapus</button>
                            </ul>
                        </div>
                    </article>
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
            $new_data = [
                'title' => $_POST['title'],
                'desc' => $_POST['desc'],
                'status' => $_POST['status'],
                'id_information_category' => 17,
                'id_user' => $this->id,
                'slug' => url_title($_POST['title'], 'dash', true),
            ];
        if($_FILES['file_upload']['name'] !=""){
            $new_data["image"] = $this->M_crud->configUploads("kemahasiswaan",$_POST['file_uploaded'],$_FILES['file_upload'],'file_upload');
        }
            
        if ($_POST['param'] == 'add') {
            $this->M_crud->create_data('information', $new_data);
        } else {
            $id = $_POST['id'];
            $this->M_crud->update_data('information',$new_data,"id='" . $id . "'");
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