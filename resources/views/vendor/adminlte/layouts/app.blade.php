<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="../../../img/logopnj.png">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <link rel="stylesheet" src="../../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../plugins/pace/pace.min.css">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue-light fixed sidebar-mini" id="padding-absolute">
<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
<!-- @section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show -->


<!-- Data Tables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


<!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/core.js') }}"></script>


<!--     <script async="" src="{{ asset('plugins/bar_chart/analytics.js.download') }}"></script>
    <script src="{{ asset('plugins/bar_chart/Chart.bundle.js.download')}}"></script>
    <script src="{{ asset('plugins/bar_chart/utils.js.download') }}"></script> -->

@if(Route::currentRouteName() == 'ranking')
    <!-- PACE -->
<script src="../../plugins/pace/pace.min.js"></script>
<script type="text/javascript">
          // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
    </script>
@endif
@if(Route::currentRouteName() == 'perhitungan')
    <!-- PACE -->
<script src="../../plugins/pace/pace.min.js"></script>
<script type="text/javascript">
          // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
    </script>
@endif
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      } );

    </script>
    </script>

    <script>
      $(function () {
      $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
    $('.examples').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
      
    </script>

    <script>
  $(function () {
    $('.example2').DataTable({

      lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                dom: 'Bfrtip',
                buttons: [
                    'pageLength',
            {
                    extend: 'copyHtml5',
                    title: 'data export'
            },

            {
                    extend: 'excelHtml5',
                    title: 'data export'
            },

            {
                    extend: 'csvHtml5',
                    title: 'data export'
            },

            {
                extend: 'pdfHtml5',
                title: 'data export'
            },

                // 'colvis',

                ],
    })
  })
</script>
@if(Route::currentRouteName() == 'grafik')
<?php
$url = url()->current();
?>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>
<script type="text/javascript">
function charts (namachart , jurusan, namaprod, peminat, lulus, tdklulus, cadangan, sma, smk, lain){
var naprod = namaprod;
var label = [];
var url = "<?php echo $url ?>";
var tahuns = "";
if(url.includes('grafik'))
{
    tahuns = "Tahun " + url.substring(29,33);
}
else
{
    tahuns = "Tahun " + "<?php echo $tahunsekarang ?>";
}

for(var a = 0; a < naprod.length; a++)
{    label.push({"label": naprod[a]}); }

var total_peminat = peminat;
var valueP = [];
for(var a = 0; a < total_peminat.length; a++)
{    valueP.push({"value": total_peminat[a]}); }

var total_lulus = lulus;
var valueL = [];
for(var a = 0; a < total_lulus.length; a++)
{    valueL.push({"value": total_lulus[a]}); }

var total_tdklulus = tdklulus;
var valueT = [];
for(var a = 0; a < total_tdklulus.length; a++)
{    valueT.push({"value": total_tdklulus[a]}); }

var total_cadangan = cadangan;
var valueC = [];
for(var a = 0; a < total_cadangan.length; a++)
{    valueC.push({"value": total_cadangan[a]}); }

var total_sma = sma;
var valueSMA = [];
for(var a = 0; a < total_sma.length; a++)
{    valueSMA.push({"value": total_sma[a]}); }

var total_smk = smk;
var valueSMK = [];
for(var a = 0; a < total_smk.length; a++)
{    valueSMK.push({"value": total_smk[a]}); }

var total_lain = lain;
var valuelain = [];
for(var a = 0; a < total_lain.length; a++)
{    valuelain.push({"value": total_lain[a]}); }
    
    FusionCharts.ready(function(){
    var chart = new FusionCharts({
    type: 'mscolumn2d',
    renderAt: namachart,
    width: '100%',
    height: '350',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "exportenabled": "1",
            "exportMode": "server",
            "caption": "Data UMPN Jurusan " + jurusan,
            "subcaption": tahuns,
            "xAxisName": "Program Studi",
            "yAxisName": "Peserta",
            "numberSuffix": " ",
            "paletteColors": "#60a3bc,#4a69bd,#e55039,#f6b93b,#7f8c8d,#34495e,#27ae60",
            "showValues": "0",
            "errorBarColor": "666666",
            "bgColor": "#ffffff",
            "showBorder": "0",
            "showCanvasBorder": "0",
            "usePlotGradientColor": "0",
            "showXAxisLine": "1",
            "axisLineAlpha": "25",
            "legendBorderAlpha": "0",
            "legendShadow": "0",
            "legendBgAlpha": "0",
            "showShadow": "0",
            "showAlternateHgridColor": "0",
            "showHoverEffect": "1",
            "rotateValues": "1"
        },
        "categories": [{
            "category": label
        }],
        "dataset": [{
                "seriesname": "Peminat", "data": valueP
            },
            {   "seriesname": "Lolos", "data": valueL },
            {   "seriesname": "Tidak Lolos", "data": valueT },
            {   "seriesname": "Cadangan", "data": valueC },
            {   "seriesname": "SMA", "data": valueSMA },
            {   "seriesname": "SMK", "data": valueSMK },
            {   "seriesname": "Yang Lain", "data": valuelain }
        ]
    }
});
    chart.render();
    });
}
charts('canvasts', 'Teknik Sipil',  <?php echo json_encode($naprod1); ?>, <?php echo json_encode($total_peminat1); ?>, <?php echo json_encode($lulus1); ?>, <?php echo json_encode($tdklulus1); ?>, <?php echo json_encode($cadangan1); ?>, <?php echo json_encode($sma1); ?>, <?php echo json_encode($smk1); ?>, <?php echo json_encode($lain1); ?>);
charts('canvastm', 'Teknik Mesin',   <?php echo json_encode($naprod2); ?>, <?php echo json_encode($total_peminat2); ?>, <?php echo json_encode($lulus2); ?>, <?php echo json_encode($tdklulus2); ?>, <?php echo json_encode($cadangan2); ?>, <?php echo json_encode($sma2); ?>, <?php echo json_encode($smk2); ?>, <?php echo json_encode($lain2); ?>);
charts('canvaste', 'Teknik Elektro',   <?php echo json_encode($naprod3); ?>, <?php echo json_encode($total_peminat3); ?>, <?php echo json_encode($lulus3); ?>, <?php echo json_encode($tdklulus3); ?>, <?php echo json_encode($cadangan3); ?>, <?php echo json_encode($sma3); ?>, <?php echo json_encode($smk3); ?>, <?php echo json_encode($lain3); ?>);
charts('canvastik', 'Teknik Informatika dan Komputer',   <?php echo json_encode($naprod4); ?>, <?php echo json_encode($total_peminat4); ?>, <?php echo json_encode($lulus4); ?>, <?php echo json_encode($tdklulus4); ?>, <?php echo json_encode($cadangan4); ?>, <?php echo json_encode($sma4); ?>, <?php echo json_encode($smk4); ?>, <?php echo json_encode($lain4); ?>);
charts('canvasak', 'Akuntansi',   <?php echo json_encode($naprod5); ?>, <?php echo json_encode($total_peminat5); ?>, <?php echo json_encode($lulus5); ?>, <?php echo json_encode($tdklulus5); ?>, <?php echo json_encode($cadangan5); ?>, <?php echo json_encode($sma5); ?>, <?php echo json_encode($smk5); ?>, <?php echo json_encode($lain5); ?>);
charts('canvasan', 'Administrasi Niaga',   <?php echo json_encode($naprod6); ?>, <?php echo json_encode($total_peminat6); ?>, <?php echo json_encode($lulus6); ?>, <?php echo json_encode($tdklulus6); ?>, <?php echo json_encode($cadangan6); ?>, <?php echo json_encode($sma6); ?>, <?php echo json_encode($smk6); ?>, <?php echo json_encode($lain6); ?>);
charts('canvastgp1', 'Teknik Grafika dan Penerbitan',   <?php echo json_encode($naprod7); ?>, <?php echo json_encode($total_peminat7); ?>, <?php echo json_encode($lulus7); ?>, <?php echo json_encode($tdklulus7); ?>, <?php echo json_encode($cadangan7); ?>, <?php echo json_encode($sma7); ?>, <?php echo json_encode($smk7); ?>, <?php echo json_encode($lain7); ?>);
charts('canvastgp2', 'Teknik Grafika dan Penerbitan',   <?php echo json_encode($naprod8); ?>, <?php echo json_encode($total_peminat8); ?>, <?php echo json_encode($lulus8); ?>, <?php echo json_encode($tdklulus8); ?>, <?php echo json_encode($cadangan8); ?>, <?php echo json_encode($sma8); ?>, <?php echo json_encode($smk8); ?>, <?php echo json_encode($lain8); ?>);
</script>
@endif

</body>
</html>
