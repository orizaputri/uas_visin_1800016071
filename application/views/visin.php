<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Visin Google Charts</title>
<link rel="stylesheet" href="<?php echo base_url('vendor/uikit/css/'); ?>uikit.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Mengambil API visualisasi.
    google.charts.load('current', {'packages':['corechart']});
    //mengambil data dari variabel PHP
    var data_perpus=[];
    data_perpus['dataStr'] = '<?php echo $buku;?>';        
    data_perpus['dataArray'] = JSON.parse(data_perpus['dataStr']);   
	//menggambar grafik
	console.log(data_perpus)
    google.charts.setOnLoadCallback(function(){
        drawChart(data_perpus['dataArray'], 'area','grafik1'); 
		drawChart(data_perpus['dataArray'],'column','grafik2');
		drawChart(data_perpus['dataArray'],'bar','grafik3'); 
		drawChart(data_perpus['dataArray'],'line','grafik4');
    });
		console.log(data_perpus['dataArray']);
    // Menentukan data yang akan ditampilkan
    function drawChart(dataArray,type,container) {
        // Membuat data tabel yang sesuai dengan format google chart dari sumber data array javascript
        var data = new google.visualization.arrayToDataTable(dataArray,false);      
        // Tentukan pengaturan chart
        var options = {
            legend:'bottom',            
            titlePosition:'none',
            titleTextStyle:{fontSize:18},
            chartArea:{width:'80%',height:'70%'}                      
            };
        if(type == 'area')
        {
            var chart = new google.visualization.AreaChart(document.getElementById(container));
        }
        if(type == 'column')
        {
            var chart = new google.visualization.ColumnChart(document.getElementById(container));
        }
        if(type == 'bar')
        {
            var chart = new google.visualization.BarChart(document.getElementById(container));
        }
		if(type == 'line')
        {
            var chart = new google.visualization.LineChart(document.getElementById(container));
        }
        chart.draw(data, options);
    }
</script>
</head>
<body>
<div class="uk-flex uk-flex-column uk-flex-middle uk-flex-center uk-height-viewport" style="background-color:#ccc; height:300px;">
<div id="diagram-pie"></div>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="#">Analisis Data Perpustakaan di Banjarnegara Tahun 2020</a>
    </div>
</nav>
<div class="uk-container">
    <div class="uk-child-width-1-2@s" uk-grid uk-height-match="target: > div > .uk-card">    
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Perpustakaan Berdasarkan Kecamatan</h3>
                <div id="grafik1" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Perpustakaan Berdasarkan Desa</h3>
                <div id="grafik2" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Perpustakaan Berdasarkan Nama Perpustakaan</h3>
                <div id="grafik3" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Data Perpustakaan Berdasarkan Jumlah Buku</h3>
                <div id="grafik4" style="height:350px;"></div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url('vendor/uikit/js/'); ?>uikit.js"></script>
</body>
</html>
