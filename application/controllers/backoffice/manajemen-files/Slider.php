<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->output->set_header(
            'Cache-Control: no-store, no-cache, max-age=0, post-check=0, pre-check=0'
        );
        $this->site = $this->M_crud->get_data('site', '*');
        $this->id = $this->session->id_user;
        $this->table = "slider";
    }

   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'slider';
        $data['title'] = 'Slider';
        $data['page'] = $function;
        $data['content'] = $function;
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }

    public function read($page=1){
        $where = '';
        if (isset($_POST['any'])) {
            $where .="title LIKE '%" .$_POST['any'] ."%' OR vocational_name LIKE '%" .$_POST['any'] ."%'";
        }
        $table = $this->table;
        $pagin = $this->M_crud->myPagination($table,'id',$where,5,5);
        $output = '';
        $read_data = $this->M_crud->read_data($table,'*',$where,'id desc',null,$pagin['perPage'],$pagin['start']);
        $output .= /** @lang text */ '
        <thead>
        <tr>
            <th width="1%">No</th>
            <th width="1%" class="text-center">#</th>
            <th width="1%">Judul</th>
            <th>Deskripsi</th>
            <th width="1%">Gambar</th>
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
                            <li><a href="#!" onclick="edit(\'' .$row['id'] .'\')">Edit</a></li>
                            <li><a href="#!" onclick="hapus(\'' .$row['id'] .'\')">Delete</a></li>
                        </ul>
                    </div>
                    </td>
                    <td>' .$row['title'] .'</td>
                    <td>' .$row['desc'] .'</td>
                    <td class="text-center">
                        <div class="inbox-item-img"><img style="height:30px;width:30px" src="' .base_url().$row['image'] .'" class="img-circle" ></div>
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
        $this->db->trans_begin();
        $response = ["status"=>false];
        $data = [
            'title' => $_POST['title'],
            'desc' => $_POST['desc'],
            'link' => $_POST['link'],
            'type' => "slider",
            "image"=>$this->M_crud->configUpload("slider",$_POST['file_uploaded'])
        ];
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