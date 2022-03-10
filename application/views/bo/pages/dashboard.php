<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<style>
    #chart{z-index:-10;}
    .bg-info{background-color: #000000!important;color#fff!important;}
    .bx-shadow{padding: 10px;}
</style>
<?php
$getTahun = $this->db->query("SELECT YEAR(date_visitor) AS 'thn' FROM visitor  GROUP BY DATE_FORMAT(date_visitor,'%y') ORDER BY YEAR(date_visitor) DESC")->result();
?>
<!-----------------------------------ORIGINAL------------------------------------->

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="ion-stats-bars"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter" id="totalDosen"><?=$guru['total']?></span>
                        Total Dosen
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="ion-stats-bars"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter" id="totalJurusan"><?=$jurusan['total']?></span>
                        Total Jurusan
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="ion-stats-bars"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter" id="totalOrganisasi"><?=$organisasi['total']?></span>
                        Total Organisasi
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <select name="tahun" id="tahun" class="form-control" onchange="handleYear()">
                            <option value="">Pilih Tahun</option>
                            <?php foreach($getTahun as $row):?>
                                <option value="<?=$row->thn?>"><?=$row->thn?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="bulan" id="bulan" class="form-control" onchange='handleMonth()'></select>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div id="container_hari" class="col-md-12" style="padding: 0px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <select name="tahun" id="filter" class="form-control" onchange="load_month()">
                    <?php foreach($getTahun as $row):?>
                        <option value="<?=$row->thn?>"><?=$row->thn?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div id="container_bulan" class="col-md-12"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div id="container_tahun"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div id="device"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="result-table">
                    </table>
                </div>
                <div id="pagination_link" class="text-right"></div>


            </div>
        </div>
    </div>
</div>

<script>
    var setting = "<?=$site['name']?>";

    $(document).ready(function(){
        handleMonth();
        load_month();
        filter_by_year();
        handleYear();
        load_device();
        load_data(1, {});
    }).on("click", ".pagination li a", function(event) {
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        var any = $("#any").val();
        if(page!==undefined) load_data(page, {any:any});
    });
    function load_data(page, data = {}) {
        _ajax("readLog/" + page, data, function (res) {
            $("#result-table").html(res.result_table);
            $("#pagination_link").html(res.pagination_link);
        });
    }


    function load_device() {
        _ajax('read/browser', null, function (res) {
            Highcharts.chart('device', {
                chart: {type: 'column', options3d: {enabled: true, alpha: 10, beta: 0, depth: 70}, zoomType: 'xy'},
                title: {text: 'Grafik Browser Pengunjung'},
                subtitle: {text: '<a href="<?=base_url()?>">' + setting + '</a>'},
                plotOptions: {column: {depth: 25}},
                credits: {enabled: false},
                xAxis: {categories: res.perangkat, labels: {skew3d: true, style: {fontSize: '10px'}}},
                yAxis: {title: {text: null}, scrollbar: {enabled: true, showFull: false}},
                series: [{name: 'Browser', data: res.jumlah}]
            });
        });
    }


    function handleYear(){
        var thn     = $("#tahun").val();
        if(thn===""){
            $("#bulan").prop("readonly",true);
        }else {
            $("#bulan").prop("readonly", false);
            var filter = {"tahun": thn}
            _ajax('read/month',filter,function(res){
                var optId = res.grafik
                var html = "";
                html += "<option value=''>Pilih Bulan</option>";
                for (var i = 0; i < optId.length; i++) {
                    html += "<option value='" + optId[i].valbulan + "'>" + optId[i].bulan + "</option>";
                }
                $("#bulan").html(html);
            })

        }
    }



    function handleMonth() {
        var thn = $("#tahun").val();
        var bln = $("#bulan").val();
        var filter = {"tahun": thn, "bulan": bln}
        _ajax('read/hari', filter, function (res) {
            Highcharts.chart('container_hari', {
                chart: {type: 'column', options3d: {enabled: true, alpha: 10, beta: 0, depth: 70}, zoomType: 'xy'},
                title: {text: 'Grafik Pengunjung Perhari'},
                subtitle: {text: '<a href="<?=base_url()?>">' + setting + '</a>'},
                plotOptions: {column: {depth: 25}},
                credits: {enabled: false},
                xAxis: {categories: res.tgl, labels: {skew3d: true, style: {fontSize: '10px'}}},
                yAxis: {title: {text: null}, scrollbar: {enabled: true, showFull: true}},
                series: [{name: 'Visitor', data: res.jumlah}]
            });
        })
    }

    function load_month() {
        var param = $("#filter").val();
        var filter = {"tahun" : param}
        _ajax('read/month',filter,function(res){
            Highcharts.chart('container_bulan', {
                chart: {type: 'spline', options3d: {enabled: true, alpha: 10, beta: 0, depth: 70}, zoomType: 'xy'},
                title: {text: 'Grafik Pengunjung Perbulan'},
                subtitle: {text: '<a href="<?=base_url()?>">' + setting + '</a>'},
                plotOptions: {column: {depth: 25}},
                credits: {enabled: false},
                xAxis: {categories: res.bln, labels: {skew3d: true, style: {fontSize: '10px'}}},
                yAxis: {title: {text: null}, scrollbar: {enabled: true, showFull: false}},
                series: [{name: 'Visitor', data: res.jml}]
            });
        })
    }


    function filter_by_year() {
        _ajax("read/year",null,function(res){
            Highcharts.chart('container_tahun', {
                chart       : { type: 'area',options3d: {enabled: true, alpha: 10,beta: 0,depth: 70},zoomType: 'xy'},
                title       : { text: 'Grafik Pengunjung Pertahun'},
                subtitle    : { text: '<a href="<?=base_url()?>">'+setting+'</a>'},
                plotOptions : {
                    area: {
                        marker    : {
                            enabled : false,symbol: 'circle',radius: 2,
                            states  : {hover : {enabled: true}}
                        }
                    }
                },
                credits     : { enabled: false},
                xAxis       : { categories: res.year,labels    : {skew3d: true,style : {fontSize: '10px'}}},
                yAxis       : { title: {text: null}},
                series      : [{name: 'Visitor',data: res.total}]
            });
        })

    }


</script>
