<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_crud extends CI_Model
{

    public function checkStatus($col){
        $status="";
        if ($col == '0') {
            $status ='<img style="height:20px;" src="' .base_url() .'assets/images/status-Y.png' .'"/>';
        } else {
            $status ='<img style="height:20px;" src="' .base_url() .'assets/images/status-T.png' .'"/>';
        }
        return $status;
    }
    public function configUploads($folder,$post,$files,$name="file_upload"){
        $path = 'uploads/'.$folder;
        $manipulasi["allowed_types"] ="*";
        $manipulasi['upload_path']      = './'.$path;
        $manipulasi['maintain_ratio']   = true;
        $manipulasi['width']         	= 500;
        $manipulasi['max_size'] 		= 5120;
        $manipulasi['encrypt_name']     = TRUE;
        $manipulasi['overwrite']            = true;
        $manipulasi['max_size']             = 10024;
        $manipulasi['max_width']            = 6000;
        $manipulasi['max_height']           = 6000;
        $manipulasi['remove_spaces'] = TRUE;

        $this->load->library('image_lib', $manipulasi);
        $this->image_lib->resize();
        $this->load->library('upload', $manipulasi);
        if($files['name']!=null) {
            if ($this->upload->do_upload($name)) {
                $manipulasi = array('upload_data' => $this->upload->data());
                if($post!=null||$post!=''){
                    unlink($post);
                    return $path . '/' . $manipulasi['upload_data']['file_name'];

                }
                return $path . '/' . $manipulasi['upload_data']['file_name'];
            }
            else{
                return array('error' => $this->upload->display_errors());
            }
        }
        else{
            return "";
        }
    }
     public function configUpload($folder,$post){
        $this->db->trans_begin();
        $path = 'assets/upload/'.$folder;
        $config['upload_path'] = './' . $path;
        $config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
        $config['max_size'] = 5120;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $input_file = ['1' => 'file_upload'];
        $valid = true;
        foreach ($input_file as $row) {
            if (!$this->upload->do_upload($row) && $_FILES[$row]['name'] != null) {
                $file[$row]['file_name'] = null;
                $file[$row] = $this->upload->data();
                $valid = false;
                $data['error_' . $row] = $this->upload->display_errors();
                break;
            } else {
                $file[$row] = $this->upload->data();
                $data[$row] = $file;
                if ($file[$row]['file_name'] != null) {
                    $manipulasi['image_library'] = 'gd2';
                    $manipulasi['source_image'] = $file[$row]['full_path'];
                    $manipulasi['maintain_ratio'] = true;
                    $manipulasi['width'] = 500;
                    $manipulasi['remove_spaces'] = TRUE;
                    $manipulasi['encrypt_name'] = TRUE;
                    $this->load->library('image_lib', $manipulasi);
                    $this->image_lib->resize();
                }
            }
        }
        $data="";
        if ($_FILES['file_upload']['name'] != null) {
            $data = $_FILES['file_upload']['name'] != null? $path . '/' . $file['file_upload']['file_name']: null;
            if ( $post != null || $post != '') {
                unlink($post);
            }
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
           return false;
        } else {
            $this->db->trans_commit();
            return $data;
        }
        
    }

    public function myPagination($table, $field, $where, $page,$uri=6)
    {
        $count = $this->M_crud->count_data($table, $field, $where);
        $config = [];
        $config['base_url'] = 'javascript:void(0)';
        $config['total_rows'] = $count;
        $config['per_page'] = $page;
        $config['uri_segment'] = $uri;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='javascript:void(0)'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $hal = $this->uri->segment($uri);
        return $data = [
            'start' => ($hal - 1) * $config['per_page'],
            'perPage' => $config['per_page'],
            'pagination_link' => $this->pagination->create_links(),
        ];
    }

    public function paginationFO($table, $field, $where,$perpage,$uri,$halaman){
        $count = $this->M_crud->count_data($table, $field, $where);
        $config = [];
        $config['base_url'] = base_url().$halaman;
        $config['total_rows'] = $count;
        $config['per_page'] = $perpage;
        $config['num_links'] = 1;
        $config['uri_segment'] = $uri;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $hal = $this->uri->segment($uri)!==null?$this->uri->segment($uri):1;
        return [
            'start' => ($hal - 1) * $config['per_page'],
            'perPage' => $config['per_page'],
            'pagination_link' => $this->pagination->create_links(),
        ];
    }

    public function count_data_join(
        $table,
        $field,
        $table_join,
        $on,
        $where = null,
        $order = null,
        $group = null,
        $limit_sum = 0,
        $limit_from = 0,
        $having = null,
        $distinct = ''
    ) {
        $col = explode('.', $field);
        if (count($col) > 1) {
            $alias = $col[1];
        } else {
            $alias = $field;
        }
        $this->db->select(
            'COUNT(' . $distinct . ' ' . $field . ') AS ' . $alias . ''
        );
        $this->db->from($table);
        if (is_array($table_join) && is_array($on)) {
            $i = 0;
            foreach ($table_join as $row) {
                if (is_array($row)) {
                    $this->db->join($row['table'], $on[$i], $row['type']);
                } else {
                    $this->db->join($row, $on[$i]);
                }
                $i++;
            }
        } else {
            $this->db->join($table_join, $on);
        }
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($having != null) {
            $this->db->having($having);
        }
        if ($limit_sum != 0) {
            $this->db->limit($limit_sum, $limit_from);
        }
        $data = $this->db->get();
        foreach ($data->result_array() as $row);
        return $row[$alias];
    }

    public function count_data(
        $table,
        $field,
        $where = null,
        $order = null,
        $group = null,
        $limit_sum = 0,
        $limit_from = 0,
        $having = null,
        $distinct = ''
    ) {
        $col = explode('.', $field);
        if (count($col) > 1) {
            $alias = $col[1];
        } else {
            $alias = $field;
        }
        $this->db->select(
            'COUNT(' . $distinct . ' ' . $field . ') AS ' . $alias . ''
        );
        $this->db->from($table);
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($having != null) {
            $this->db->having($having);
        }
        if ($limit_sum != 0) {
            $this->db->limit($limit_sum, $limit_from);
        }
        $data = $this->db->get();
        foreach ($data->result_array() as $row);
        return $row[$alias];
    }

    public function count_join_data(
        $table,
        $field,
        $table_join,
        $on,
        $where = null,
        $order = null,
        $group = null,
        $having = null
    ) {
        $this->db->select($field);
        $this->db->from($table);
        if (is_array($table_join) && is_array($on)) {
            $i = 0;
            foreach ($table_join as $row) {
                if (is_array($row)) {
                    $this->db->join($row['table'], $on[$i], $row['type']);
                } else {
                    $this->db->join($row, $on[$i]);
                }
                $i++;
            }
        } else {
            $this->db->join($table_join, $on);
        }
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($having != null) {
            $this->db->having($having);
        }
        $data = $this->db->get();
        return $data->num_rows();
    }

    public function join_data(
        $table,
        $field,
        $table_join,
        $on,
        $where = null,
        $order = null,
        $group = null,
        $limit_sum = 0,
        $limit_from = 0,
        $having = null
    ) {
        $this->db->select($field);
        $this->db->from($table);
        if (is_array($table_join) && is_array($on)) {
            $i = 0;
            foreach ($table_join as $row) {
                if (is_array($row)) {
                    $this->db->join($row['table'], $on[$i], $row['type']);
                } else {
                    $this->db->join($row, $on[$i]);
                }
                $i++;
            }
        } else {
            $this->db->join($table_join, $on);
        }
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($having != null) {
            $this->db->having($having);
        }
        if ($limit_sum != 0) {
            $this->db->limit($limit_sum, $limit_from);
        }
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_join_data(
        $table,
        $field,
        $table_join,
        $on,
        $where = null,
        $order = null,
        $group = null,
        $limit_sum = 0,
        $limit_from = 0,
        $having = null
    ) {
        $this->db->select($field);
        $this->db->from($table);
        if (is_array($table_join) && is_array($on)) {
            $i = 0;
            foreach ($table_join as $row) {
                if (is_array($row)) {
                    $this->db->join($row['table'], $on[$i], $row['type']);
                } else {
                    $this->db->join($row, $on[$i]);
                }
                $i++;
            }
        } else {
            $this->db->join($table_join, $on);
        }
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($having != null) {
            $this->db->having($having);
        }
        if ($limit_sum != 0) {
            $this->db->limit($limit_sum, $limit_from);
        }
        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row);
            return $row;
        } else {
            return null;
        }
    }

    public function get_data(
        $table,
        $field,
        $where = null,
        $order = null,
        $group = null,
        $limit_sum = 0,
        $limit_from = 0
    ) {
        $this->db->select($field);
        $this->db->from($table);
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($limit_sum != 0) {
            $this->db->limit($limit_sum, $limit_from);
        }
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row);
            return $row;
        } else {
            return null;
        }
    }

    public function create_data($tabel, $data)
    {
        $data = $this->db->insert($tabel, $data);
        return $data;
    }

    public function count_read_data(
        $table,
        $field,
        $where = null,
        $order = null,
        $group = null,
        $having = null
    ) {
        $this->db->select($field);
        $this->db->from($table);
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($having != null) {
            $this->db->having($having);
        }
        $data = $this->db->get();
        return $data->num_rows();
    }

    public function read_data(
        $table,
        $field,
        $where = null,
        $order = null,
        $group = null,
        $limit_sum = 0,
        $limit_from = 0,
        $having = null
    ) {
        $this->db->select($field);
        $this->db->from($table);
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($group != null) {
            $this->db->group_by($group);
        }
        if ($having != null) {
            $this->db->having($having);
        }
        if ($limit_sum != 0) {
            $this->db->limit($limit_sum, $limit_from);
        }
        $data = $this->db->get();
        return $data->result_array();
    }

    public function update_data($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $data;
    }

    public function delete_data($tabel, $where)
    {
        $data = $this->db->delete($tabel, $where);
        return $data;
    }

    public function check_data($column, $table, $condition)
    {
        $this->db->select($column);
        $this->db->from($table);
        $this->db->where($condition);

        return $this->db->get()->num_rows();
        /*if ($this->db->get()->row() != '') {
            return true;
        }else {
            return false;
        }*/
    }
}