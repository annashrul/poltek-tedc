<?php
/**
 * Created by PhpStorm.
 * User: anash
 * Date: 12/03/2019
 * Time: 19.02
 */

class Dashboard extends CI_Controller
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
    }

   
    public function index()
    {
        $data['site'] = $this->site;
        $function = 'dashboard';
        $data['title'] = 'Dashboard';
        $data['page'] = $function;
        $data['content'] = $function;
        $data['guru']=$this->M_crud->get_data('lecturer','count(*) as total','status=0');
        $data['jurusan']=$this->M_crud->get_data('vocational','count(*) as total');
        $data['organisasi']=$this->M_crud->get_data('organization','count(*) as total');
        $this->load->view('bo/layout/index', $data);
    }

    public function readWidget($action=null){
        $response=[];
        if($action=='guru'){
            $response['total'] = count($this->M_crud->read_data('lecturer','*','status=0'));
        }
        elseif($action=='jurusan'){
            $response['total'] = count($this->M_crud->read_data('vocational','*'));
        }
        elseif($action=='organisasi'){
            $response['total'] = count($this->M_crud->read_data('organization','*'));
        }
        echo json_encode($response);
    }

    public function readLog($page=1){
        $where = "";
        $table = "visitor";
        $pagin = $this->M_crud->myPagination($table,'id_visitor',$where,10,4);
        $output = '';
        $read_data = $this->M_crud->read_data($table,'*',$where,'id_visitor desc',null,$pagin['perPage'],$pagin['start']);
        $output .= /** @lang text */ '
        <thead>
        <tr>
            <th width="1%">No</th>
            <th width="1%">Ip Address</th>
            <th width="1%">Browser</th>
            <th width="1%">Platform</th>
            <th>Info</th>
            <th width="1%">Tanggal</th>
        </tr>
        </thead>
        <tbody>
        ';
        $no = $pagin['start']+1;
        if ($read_data != null) {
            foreach ($read_data as $row) {
                $platform=$row['platform']!=null?$row['platform']:"-";
                $fullInfo=$row['full_info']!=null?$row['full_info']:"-";
                $output .=
                    '<tr>
                    <td align="center">'.$no++ .'</td>
                    <td>' .$row['ip_visitor'] .'</td>
                    <td>' .$row['browser_visitor'] .'</td>
                    <td>' .$platform .'</td>
                    <td>' .$fullInfo .'</td>
                    <td>' .$row['date_visitor'] .'</td>

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

    public function read($action){
        $table='visitor';
        if($action == 'year'){
            $grafik 	= $this->M_crud->read_data(
                $table, "YEAR(date_$table) AS 'year', COUNT(ip_$table) AS total",
                null, null,"YEAR(date_$table)"
            );
            foreach($grafik as $row){
                $year[] 	= $row['year'];
                $total[] = (float)$row['total'];
            }
            echo json_encode(array("year"=>$year,"total"=>$total));
        }
        elseif($action == "month") {
            $where 		= null;
            $year 	= $this->input->post("tahun");
            $year_now = "YEAR(date_$table)=YEAR(NOW())";
            $year_req = "YEAR(date_$table)='$year'";
            $where 		.= $year == null ? $year_now : $year_req;
            $grafik 	= $this->M_crud->read_data(
                $table, "DATE_FORMAT(date_$table,'%m') AS valbulan,date_$table,YEAR(date_$table) AS 'thn', MONTH(date_$table) AS 'bln', COUNT(ip_$table) AS jml,
					CONCAT(
						CASE MONTH(date_$table)
						WHEN 1 THEN 'Januari' WHEN 2 THEN 'Februari' WHEN 3 THEN 'Maret' WHEN 4 THEN 'April' WHEN 5 THEN 'Mei' WHEN 6 THEN 'Juni'
					 	WHEN 7 THEN 'Juli' WHEN 8 THEN 'Agustus' WHEN 9 THEN 'September' WHEN 10 THEN 'Oktober' WHEN 11 THEN 'November' WHEN 12
					 	THEN 'Desember' END
					) AS bulan
				",
                $where, null,"MONTH(date_$table)"
            );
            foreach($grafik as $row){
                $month[] = $row['bulan'];
                $value[] = (float)$row['jml'];
            }
            $data = array(
                "bln" => $month,
                "jml" => $value,
                'grafik' => $grafik
            );
            echo json_encode($data);
        }
        elseif($action=='hari') {
            $where = null;
            $tahun = $this->input->post("tahun");
            $bulan = $this->input->post("bulan");
            if($tahun && $bulan){
                $where.= "YEAR(date_$table)='$tahun' AND MONTH(date_$table)='$bulan'";
            }else{
                $where.="YEAR(date_$table)=YEAR(NOW()) AND MONTH(date_$table)=MONTH(NOW())";
            }
            $day=array();
            $tgl=array();
            $val=array();
            $grafik = $this->M_crud->read_data(
                $table, "
				YEAR(date_$table) AS tahun, COUNT(ip_$table) AS jumlah_ip,date_$table,
  				CONCAT(
					CASE DAYOFWEEK(date_$table)
					WHEN 1 THEN 'Minggu' WHEN 2 THEN 'Senin' WHEN 3 THEN 'Selasa' WHEN 4 THEN 'Rabu' WHEN 5 THEN 'Kamis' WHEN 6 THEN 'Jumat' WHEN 7 THEN 'Sabtu' END
				) AS hari,
				CONCAT(
					CASE MONTH(date_$table)
					WHEN 1 THEN 'Januari' WHEN 2 THEN 'Februari' WHEN 3 THEN 'Maret' WHEN 4 THEN 'April' WHEN 5 THEN 'Mei' WHEN 6 THEN 'Juni' WHEN 7 THEN 'Juli' WHEN 8
					THEN 'Agustus'
					WHEN 9 THEN 'September' WHEN 10 THEN 'Oktober' WHEN 11 THEN 'November' WHEN 12 THEN 'Desember' END
				) AS bulan
				",
                $where, null,"DAY(date_$table)"
            );
            foreach ($grafik as $row) {
                $day[] = $row['hari'];
                $tgl[] = date("d-m-y",strtotime($row["date_$table"]));
                $val[] = (float)$row['jumlah_ip'];
            }
            $data = array(
                "hari" 		=> $day,
                "jumlah" 	=> $val,
                "tgl" 		=> $tgl,
                "grafik" 	=> $grafik
            );
            echo json_encode($data);
        }
        elseif ($action == 'browser'){
            $grafik = $this->M_crud->read_data(
                $table,"browser_$table AS browser,COUNT(browser_$table) AS total_device",
                null,null,"browser_$table"
            );
            foreach($grafik as $row){
                $jumlah[] 	= (float)$row['total_device'];
                $perangkat[]= $row['browser'];
            }
            $data 	= array(
                "perangkat"=>$perangkat,"jumlah"=>$jumlah
            );
            echo json_encode($data);
        }
    }

   
}