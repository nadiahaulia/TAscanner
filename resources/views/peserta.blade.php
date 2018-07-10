@extends('adminlte::layouts.app')

@section('main-content')

<h4 style="color:#807e7d;"> 
    <b> DATA PESERTA</b> </h4>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            
            <div class="box-body">
              <table class="table table-bordered table-striped example2">
                <thead>

                <tr>
                  <th>No</th>
                  <th>No Peserta</th>
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th>Pilihan 1</th>
                  <th>Pilihan 2</th>
                  <th>Pilihan 3</th>
                </tr>
                </thead>
                <tbody>
                 @for($i=1; $i<=$jumlah;$i++)
            @foreach($pilihan[$i] as $pilih)
                <tr>
                  <td>{{$pilih->id_peserta}}</td>
                  <td>{{$pilih->no_peserta}}</td>
                  <td>{{$pilih->nama_peserta}}</td>
                  <td> {{$pilih->keterangan}}</td>
                  <td>{{$pilih->pilihan_1}}</td>
                  <td>{{$pilih->pilihan_2}}</td>
                  <td>{{$pilih->pilihan_3}}</td>
                </tr>
                @endforeach
            @endfor
              </table>
              
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection