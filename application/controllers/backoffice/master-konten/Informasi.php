<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->output->set_header(
            'Cache-Control: no-store, no-cache, max-age=0, post-check=0, pre-check=0'
        );
        $this->site = $this->M_crud->get_data('site', '*');
        // var_dump($this->site);die();
        // $this->level 	= (int)$this->session->userdata("level");
        $this->id = $this->session->id_user;
        // $this->akses 	= $this->m_website->user_access_data($this->level);
        // if($this->session->username==""){
        // 	redirect('home');
        // }
    }

    public function dashboard($action = null)
    {
        $data['site'] = $this->site;
        $function = 'dashboard';
        $data['title'] = 'Dashboard';
        $data['page'] = $function;
        $data['content'] = $function;
        $this->load->view('bo/layout/index', $data);
    }
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'informasi';
        $data['title'] = 'Informasi';
        $data['page'] = $function;
        $data['content'] = $function;
        $table = 'informasi_type';
        $where = '';
        $this->load->view('bo/layout/index', $data);
    }
    public function daftarInformasi($action = null, $page = 1)
    {
        if ($action == 'get_data') {
            $where = '';
            $where = '';
            if (isset($_POST['any'])) {
                $where .=
                    "category_name LIKE '%" .
                    $_POST['any'] .
                    "%' OR type_name LIKE '%" .
                    $_POST['any'] .
                    "%' OR information_title LIKE '%" .
                    $_POST['any'] .
                    "%'";
            }
            $table = 'view_information';
            $pagin = $this->M_crud->myPagination(
                $table,
                'information_id',
                $where,
                10
            );
            $output = '';
            $read_data = $this->M_crud->read_data(
                $table,
                '*',
                $where,
                'information_id desc',
                null,
                $pagin['perPage'],
                $pagin['start']
            );
            $output .= /** @lang text */ '
			<thead>
			<tr>
				<th width="1%">No</th>
				<th width="1%" class="text-center">#</th>
				<th>Judul</th>
				<th width="1%">Jenis</th>
				<th width="1%">Kategori</th>
				<th width="1%">Status</th>
				<th>Tanggal</th>
			</tr>
			</thead>
			<tbody>
			';
            $no = 1;
            if ($read_data != null) {
                foreach ($read_data as $row) {
                    $status = '';
                    if ($row['information_status'] == '0') {
                        $status =
                            '<img style="height:20px;" src="' .
                            base_url() .
                            'assets/images/status-Y.png' .
                            '"/>';
                    } else {
                        $status =
                            '<img src="' .
                            base_url() .
                            'assets/images/status-T.png' .
                            '"/>';
                    }
                    $output .=
                        '
					<tr>
						<td align="center">' .$no++ .'</td>
						<td align="center">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-position">
                                    <li><a href="#!" onclick="editInformasi(\'' .$row['information_id'] .'\')">Edit</a></li>
                                    <li><a href="#!" onclick="hapusInformasi(\'' .$row['information_id'] .'\')">Delete</a></li>
                                </ul>
                            </div>
						</td>
                        <td><a target="blank" href="' .base_url() .'">' .$row['information_title'] .'</a></td>
                        <td>' .$row['type_name'] . '</td>
                        <td>' .$row['category_name'] .'</td>
                        <td class="text-center">' .$this->M_crud->checkStatus($row['information_status']) .'</td>
                        <td>' .$row['information_created_at'] .'</td>
					</tr>
					';
                }
            } else {
                $output .=
                    /** @lang text */
                    '
				<tr>
						<td colspan="8" class="text-center">Tidak ada data</td>
				</tr>
				';
            }
            $output .=
                /** @lang text */
                '</tbody>';

            $result = [
                'pagination_link' => $pagin['pagination_link'],
                'result_table' => $output,
            ];
            echo json_encode($result);
        } elseif ($action == 'simpan') {
            $this->db->trans_begin();
            $new_data = [
                'title' => $_POST['title'],
                'desc' => $_POST['desc'],
                'status' => $_POST['status'],
                'id_information_category' => $_POST['id_information_category'],
                'id_user' => 1,
                'slug' => url_title($_POST['title'], 'dash', true),
                "image" => $this->M_crud->configUpload("informasi",$_POST['file_uploaded'])
            ];
            

            if ($_POST['param'] == 'add') {
                $this->M_crud->create_data('information', $new_data);
            } else {
                $id = $_POST['id'];
                $this->M_crud->update_data(
                    'information',
                    $new_data,
                    "id='" . $id . "'"
                );
            }

            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                echo json_encode(['status' => false]);
            } else {
                $this->db->trans_commit();
                echo json_encode(['status' => true]);
            }
        } elseif ($action == 'edit') {
            $get_data = $this->M_crud->get_data(
                'view_information',
                '*',
                "information_id='" . $_POST['id'] . "'"
            );
            $result = [];
            if ($get_data != null) {
                $result['status'] = true;
                $result['res_data'] = $get_data;
            } else {
                $result['status'] = false;
            }

            echo json_encode($result);
        } elseif ($action == 'hapus') {
            $get_id = $this->M_crud->get_data(
                'information',
                '*',
                "id='" . $_POST['id'] . "'"
            );
            unlink($get_id['image']);
            $where = ['id' => $_POST['id']];
            $result = $this->M_crud->delete_data('information', $where);
            echo json_encode(['status' => $result]);
        }
    }
    public function kategoriInformasi($action = null, $page = 1)
    {
        $table = 'view_information_category';
        if ($action == 'get_data') {
            $where = '';
            if (isset($_POST['any'])) {
                $where .=
                    "category_name LIKE '%" .
                    $_POST['any'] .
                    "%' OR type_name LIKE '%" .
                    $_POST['any'] .
                    "%'";
            }

            $pagin = $this->M_crud->myPagination(
                $table,
                'category_id',
                $where,
                10
            );
            $output = '';
            $read_data = $this->M_crud->read_data(
                $table,
                '*',
                $where,
                'category_id desc',
                null,
                $pagin['perPage'],
                $pagin['start']
            );
            $output .= /** @lang text */ '
			<thead>
			<tr>
				<th width="1%">No</th>
				<th width="1%" class="text-center">#</th>
				<th>Kategori</th>
				<th>Jenis</th>
			</tr>
			</thead>
			<tbody>
			';
            $no = $pagin['start']+1;
            if ($read_data != null) {
                foreach ($read_data as $row) {
                    $output .=
                        '
					<tr>
						<td align="center">' .
                        $no++ .
                        '</td>
						<td align="center">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
								<span class="fa fa-caret-down"></span>
							</button>
							<ul class="dropdown-menu dropdown-position">
									<li><a href="#!" onclick="editKategori(\'' .
                        $row['category_id'] .
                        '\')">Edit</a></li>
									<li><a href="#!" onclick="hapusKategori(\'' .
                        $row['category_id'] .
                        '\')">Delete</a></li>
							</ul>
						</div>
						</td>
						<td>' .
                        $row['category_name'] .
                        '</td>
                        <td>' .
                        $row['type_name'] .
                        '</td>
					</tr>
					';
                }
            } else {
                $output .=
                    /** @lang text */
                    '
				<tr>
						<td colspan="8" class="text-center">Tidak ada data</td>
				</tr>
				';
            }
            $output .=
                /** @lang text */
                '</tbody>';

            $result = [
                'pagination_link' => $pagin['pagination_link'],
                'result_table' => $output,
            ];
            echo json_encode($result);
        } elseif ($action == 'isExist') {
            $where = "name='" . $_POST['name'] . "'";
            $_POST['param'] == 'edit'
                ? ($where .= " AND name <>'" . $_POST['name'] . "'")
                : null;
            $isExist = $this->M_crud->get_data(
                'information_category',
                'name',
                $where
            );
            echo $isExist == null ? 'true' : 'false';
        } elseif ($action == 'simpan') {
            $response = [];
            $data = [
                'id_information_type' => $_POST['type_id'],
                'name' => $_POST['name'],
            ];
            if ($_POST['param'] == 'add') {
                $response = [];
                $insert = $this->M_crud->create_data(
                    'information_category',
                    $data
                );
                $response = ['status' => $insert];
            } else {
                $update = $this->M_crud->update_data(
                    'information_category',
                    $data,
                    "id='" . $_POST['id'] . "'"
                );
                $response = ['status' => $update];
            }
            echo json_encode($response);
        } elseif ($action == 'edit') {
            $get_data = $this->M_crud->get_data(
                'information_category',
                '*',
                "id='" . $_POST['id'] . "'"
            );
            $result = [];
            if ($get_data != null) {
                $result['status'] = true;
                $result['res_data'] = $get_data;
            } else {
                $result['status'] = false;
            }

            echo json_encode($result);
        } elseif ($action == 'hapus') {
            $delete_data = $this->M_crud->delete_data(
                'information_category',
                "id = '" . $_POST['id'] . "'"
            );
            echo json_encode(['status' => $delete_data]);
        } elseif ($action == 'get_all_by_type') {
            $read = $this->M_crud->read_data(
                'information_category',
                '*',
                "id_information_type='" . $_POST['type_id'] . "'",
                'name ASC'
            );
            $output = '<option value="">Pilih</option>';
            if ($read != null) {
                foreach ($read as $row) {
                    $output .=
                        '<option value="' .
                        $row['id'] .
                        '">' .
                        $row['name'] .
                        '</option>';
                }
            }
            echo json_encode(['output' => $output]);
        }
    }
    public function jenisInformasi($action = null, $page = 1)
    {
        $table = 'information_type';
        if ($action == 'get_data') {
            $where = '';
            if (isset($_POST['any'])) {
                $where .= "name LIKE '%" . $_POST['any'] . "%'";
            }
            $pagin = $this->M_crud->myPagination($table, 'id', $where, 10);
            $output = '';
            $read_data = $this->M_crud->read_data(
                $table,
                '*',
                $where,
                'id desc',
                null,
                $pagin['perPage'],
                $pagin['start']
            );
            $output .= /** @lang text */ '
			<thead>
			<tr>
				<th width="1%" class="text-center">No</th>
				<th width="1%" class="text-center">#</th>
				<th>Nama</th>
			</tr>
			</thead>
			<tbody>
			';
            $no = 1;
            if ($read_data != null) {
                foreach ($read_data as $row) {
                    $output .=
                        '
					<tr>
						<td class="text-center">' .
                        $no++ .
                        '</td>
						<td class="text-center">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
								<span class="fa fa-caret-down"></span>
							</button>
							<ul class="dropdown-menu dropdown-position">
									<li><a href="#!" onclick="editJenis(\'' .
                        $row['id'] .
                        '\')">Edit</a></li>
									<li><a href="#!" onclick="hapusJenis(\'' .
                        $row['id'] .
                        '\')">Delete</a></li>
							</ul>
						</div>
						</td>
						<td>' .
                        $row['name'] .
                        '</td>
					</tr>
					';
                }
            } else {
                $output .=
                    /** @lang text */
                    '
				<tr>
						<td colspan="8" class="text-center">Tidak ada data</td>
				</tr>
				';
            }
            $output .=
                /** @lang text */
                '</tbody>';

            $result = [
                'pagination_link' => $pagin['pagination_link'],
                'result_table' => $output,
            ];
            echo json_encode($result);
        } elseif ($action == 'isExist') {
            $where = "name='" . $_POST['name'] . "'";
            $_POST['param'] == 'edit'
                ? ($where .= " AND name <>'" . $_POST['name'] . "'")
                : null;
            $isExist = $this->M_crud->get_data($table, 'name', $where);
            echo $isExist == null ? 'true' : 'false';
        } elseif ($action == 'simpan') {
            $data = [
                'name' => $_POST['name'],
            ];
            $response = [];
            if ($_POST['param'] == 'add') {
                $insert = $this->M_crud->create_data($table, $data);
                $response = ['status' => true, 'method' => $_POST['param']];
            } else {
                $this->M_crud->update_data(
                    $table,
                    $data,
                    "id='" . $_POST['id'] . "'"
                );
                $response = ['status' => true, 'method' => $_POST];
            }

            echo json_encode($response);
        } elseif ($action == 'edit') {
            $get_data = $this->M_crud->get_data(
                $table,
                '*',
                "id='" . $_POST['id'] . "'"
            );
            $result = [];
            if ($get_data != null) {
                $result['status'] = true;
                $result['res_data'] = $get_data;
            } else {
                $result['status'] = false;
            }

            echo json_encode($result);
        } elseif ($action == 'hapus') {
            $delete_data = $this->M_crud->delete_data(
                $table,
                "id = '" . $_POST['id'] . "'"
            );
            echo json_encode(['status' => $delete_data]);
        } elseif ($action == 'get_all') {
            $read = $this->M_crud->read_data($table, '*', null, 'name ASC');
            $output = '<option value="">Pilih</option>';
            if ($read != null) {
                foreach ($read as $row) {
                    $output .=
                        '<option value="' .
                        $row['id'] .
                        '">' .
                        $row['name'] .
                        '</option>';
                }
            }
            echo json_encode(['output' => $output]);
        }
    }
}