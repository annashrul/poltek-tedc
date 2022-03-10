<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Jurusan extends CI_Controller
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
        $this->table = "vocational";
    }

   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'jurusan';
        $data['title'] = 'Jurusan';
        $data['page'] = $function;
        $data['content'] = $function;
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }

    public function read($page=1){
        $where = "vocational_name != '-'";
        if (isset($_POST['any'])) {
            $where .="AND vocational_name LIKE '%" .$_POST['any'] ."%'";
        }
        $table = "view_vocational";
        $pagin = $this->M_crud->myPagination($table,'vocational_id',$where,5,5);
        $output = '';
        $read_data = $this->M_crud->read_data($table,'*',$where,'vocational_id desc',null,$pagin['perPage'],$pagin['start']);
        $output .= /** @lang text */ '
        <thead>
        <tr>
            <th width="1%" class="text-center">No</th>
            <th width="1%" class="text-center">#</th>
            <th>Nama</th>
            <th width="1%">Program</th>
            <th width="1%">SK</th>
            <th width="1%">Telepon</th>
            <th width="1%">Email</th>
            <th width="1%">Website</th>
            <th width="1%">Tanggal Berdiri</th>
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
                            <li><a href="#!" onclick="edit(\'' .$row['vocational_id'] .'\')">Edit</a></li>
                            <li><a href="#!" onclick="hapus(\'' .$row['vocational_id'] .'\')">Delete</a></li>
                        </ul>
                    </div>
                    </td>
                    <td>' .$row['vocational_name'] .' | '.$row['akreditasi'].'</td>
                    <td>' .$row['program_name'] .'</td>
                    <td>' .$row['sk'] .'</td>
                    <td>' .$row['phone'] .'</td>
                    <td>' .$row['email'] .'</td>
                    <td>' .$row['vocational_link'] .'</td>
                    <td>' .$row['tgl_berdiri'] .'</td>
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
    public function check_column(){
        $where = "name='" . $_POST['name'] . "'";
        $_POST['param'] == 'edit'? ($where .= " AND name <>'" . $_POST['name'] . "'") : null;
        $isExist = $this->M_crud->get_data($this->table,'name',$where);
        echo $isExist == null ? 'true' : 'false';
    }
    public function simpan(){
        $response = [];
        $data = [
            'id_program' => $_POST['id_program'],
            'name' => $_POST['name'],
            'akreditasi' => $_POST['akreditasi'],
            'sk' => $_POST['sk'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'link' => $_POST['website'],
            'tgl_berdiri' => $_POST['tgl_berdiri'],
            'visi' => $_POST['visi'],
            'misi' => $_POST['misi'],
            'deskripsi' => $_POST['deskripsi'],
            'kompetensi' => $_POST['kompetensi'],
        ];
        $response = [];
        if ($_POST['param'] == 'add') {
            $insert   = $this->M_crud->create_data($this->table,$data);
            $response['status']=$insert;
        } else {
            $update=$this->M_crud->update_data($this->table,$data,"id='" . $_POST['id'] . "'");
            $response['status']=$update;
        }
        echo json_encode($response);
        
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
        $delete_data = $this->M_crud->delete_data($this->table,"id = '" . $_POST['id'] . "'");
        echo json_encode(['status' => $delete_data]);
    }

    public function get_option(){
        $where = null;
        if(isset($_POST["id"]) && $_POST["id"]!=null){
            $where.="id_program='".$_POST['id']."'";
        }
        $read = $this->M_crud->read_data($this->table,'*',$where,'name ASC');
        $output = '';
        if ($read!=null) {
            foreach ($read as $row) {
                $output .='<option value="' .$row['id'] .'">' .$row['name'] .'</option>';
            }
        }
         else {
            $output .= '<option value="">Pilih</option>';
        }
        echo json_encode(['output' => $output,"id"=>$_POST["id"]]);
    }
   
}