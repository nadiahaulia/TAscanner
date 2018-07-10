@extends('adminlte::layouts.app')

@section('main-content')
	<h4 style="color:#807e7d;"> 
       <b> DASHBOARD GRAFIK </b></h4> 

	<!-- BAR CHART -->
  <div class="box box-widget">
    <div class="box-header with-border bg-light-blue" style="padding: 15px">
      <h3 class="box-title">REKAYASA</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div> <!-- /.box-header -->

    <div class="box-body">        
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
              <li class="active"><a href="#ts" data-toggle="tab">TS</a></li>              
              <li><a href="#tm" data-toggle="tab">TM</a></li>
              <li><a href="#te" data-toggle="tab">TE</a></li>
              <li><a href="#tik" data-toggle="tab">TIK</a></li>
              <li><a href="#tgp" data-toggle="tab">TGP</a></li>
        </ul>
        <div class="box-body border-radius-none">
          <div class="tab-content">
            

            <div class="tab-pane active" id="ts">
              <b>Teknik Sipil</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvasts"></div>
                </div>
                <div class="col-md-1"></div>
            </div>



            <div class="tab-pane" id="tm">
              <b>Teknik Mesin</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvastm"></div>
                </div>
                <div class="col-md-1"></div>
            </div>



            <div class="tab-pane" id="te">
              <b>Teknik Elektro</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvaste"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="tab-pane" id="tik">
              <b>Teknik Informatika dan Komputer</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvastik"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="tab-pane" id="tgp">
              <b>Teknik Grafika dan Penerbitan</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvastgp1"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

          </div><!-- /.tab-content -->
        </div><!--box body-->
      </div><!-- nav-tabs-custom -->
    </div><!-- /.box-body -->
  </div>

    <div class="box box-widget">
    <div class="box-header with-border bg-light-blue" style="padding: 15px">
      <h3 class="box-title">TATA NIAGA</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div> <!-- /.box-header -->

    <div class="box-body">        
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
              <li class="active"><a href="#ak" data-toggle="tab">AK</a></li>
              <li><a href="#an" data-toggle="tab">AN</a></li>
              <li><a href="#tgp2" data-toggle="tab">TGP</a></li>
        </ul>
        <div class="box-body border-radius-none">
          <div class="tab-content">
            <div class="tab-pane active" id="ak">
              <b>Akuntansi</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvasak"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="tab-pane" id="an">
              <b>Administrasi Niaga</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvasan"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="tab-pane" id="tgp2">
              <b>Teknik Grafika dan Penerbitan</b>
              <div class="line-height-box-body"></div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div id="canvastgp2"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

          </div><!-- /.tab-content -->
        </div><!--box body-->
      </div><!-- nav-tabs-custom -->
    </div><!-- /.box-body -->
  </div>


@endsection