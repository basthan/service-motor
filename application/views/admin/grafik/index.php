<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   
 <!--js google chart-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
</head>
<body>
<script type="text/javascript">
       //load package
       google.load('visualization', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$nama_barang}', {$harga}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Grafik Harga Barang"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>


    </script><br>
<script type="text/javascript">
       //load package
       google.load('visualization2', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$nama_barang}', {$stok}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization2')).
                draw(data, {title:"Grafik Stok Barang"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>


    </script><br>
<script type="text/javascript">
       //load package
       google.load('visualization3', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data2;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$nama_barang}', {$terjual}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization3')).
                draw(data, {title:"Grafik Pembelian Barang"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>


    </script><br>
<script type="text/javascript">
       //load package
       google.load('visualization4', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data3;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$nama_mekanik}', {$jumlah_dipakai}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization4')).
                draw(data, {title:"Grafik Penggunaan Mekanik"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>


    </script><br>
<script type="text/javascript">
       //load package
       google.load('visualization5', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data4;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$nama_jasa}', {$penggunaan}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization5')).
                draw(data, {title:"Grafik Penggunaan Jasa"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>


    </script><br>
<script type="text/javascript">
       //load package
       google.load('visualization6', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data5;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$merek}', {$jumlah_merek}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization6')).
                draw(data, {title:"Grafik Penggunaan Merek Motor"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>


    </script><br>
    <script type="text/javascript">
       //load package
       google.load('visualization7', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data6;
    //get number of rows returned
    $num_results = $result->num_rows();
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$id_transaksi}', {$DateOnly}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization7')).
                draw(data, {title:"Grafik Transaksi Harian"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>


    </script><br>

<div id="container">
    <h1>Statistik Service Motor Promnet</h1>
    <div id="visualization"></div>
    <div id="visualization2"></div>
     <div id="visualization3"></div>
      <div id="visualization4"></div>
      <div id="visualization5"></div>
      <div id="visualization6"></div>
       <div id="visualization7"></div>
</div>
</body>
</html>