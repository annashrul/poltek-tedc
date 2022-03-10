<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Bo extends CI_Controller
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
    public function informasi($action = null, $page = 1)
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
            $table = 'view_information';
            $pagin = $this->M_crud->myPagination(
                $table,
                'information_id',
                $where,
                1
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
				<th>Kategori</th>
				<th>Tipe</th>
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
						<td>' .
                        $no++ .
                        '</td>
						<td>
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Aksi
								<span class="fa fa-caret-down"></span>
							</button>
							<ul class="dropdown-menu dropdown-position">
									<li><a href="#!" onclick="edit(\'' .
                        $row['information_id'] .
                        '\')">Edit</a></li>
									<li><a href="#!" onclick="hapus(\'' .
                        $row['information_id'] .
                        '\')">Delete</a></li>
							</ul>
						</div>
						</td>
                        <td>' .
                        $row['information_title'] .
                        '</td>
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
        }
    }
    public function kategoriInformasi($action = null, $page = 1)
    {
        if ($action == 'get_data') {
            $where = '';
            $table = 'view_information_category';
            $pagin = $this->M_crud->myPagination(
                $table,
                'category_id',
                $where,
                1
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
				<th>Tipe</th>
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
						<td>' .
                        $no++ .
                        '</td>
						<td>
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Aksi
								<span class="fa fa-caret-down"></span>
							</button>
							<ul class="dropdown-menu dropdown-position">
									<li><a href="#!" onclick="edit(\'' .
                        $row['category_id'] .
                        '\')">Edit</a></li>
									<li><a href="#!" onclick="hapus(\'' .
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
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Aksi
								<span class="fa fa-caret-down"></span>
							</button>
							<ul class="dropdown-menu dropdown-position">
									<li><a href="#!" onclick="edit(\'' .
                        $row['id'] .
                        '\')">Edit</a></li>
									<li><a href="#!" onclick="hapus(\'' .
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
            $insert = $this->M_crud->create_data($table, [
                'name' => $_POST['name'],
            ]);
            $response = ['status' => true, 'data' => $_POST['name']];
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
        }
    }
}
