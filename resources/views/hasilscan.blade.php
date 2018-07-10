@extends('adminlte::layouts.app')

@section('main-content')

  <h4 style="color:#807e7d;"> 
       <b> DATA HASIL SCAN</b> </h4><br>
<?php use App\Models\Peserta; ?>    
<!--     <div class="form-group col-xs-12">
      <select name="bidang" class="form-control" id="change-dashboard">
        <option value="{{ url('/') }}">Rekayasa</option>
        <option value="{{ url('/') }}">Tata Niaga</option>
      </select>
    </div> -->
    <div class="box-body pull-right">
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
          @if($errors->any())
          <h4>{{$errors->first()}}</h4>
          @endif
          <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('post') }}
            <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}" style="display: inline-block;">
              <button type="button" class="btn btn-file btn-flat" style="background-color: grey; color:white">Import Txt
                <input type="file" name="file"></button>
                <span class="help-block text-danger">{{ $errors->first('file') }}</span>
            </div>
            <div class="form-actions" style="display: inline-block;">
              <button type="submit" class="btn btn-flat" data-dismiss="modal"><i class="fa fa-check"></i></button>
            </div>
          </form>
    </div>

    <!-- /.form-group -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <!-- <div class="box" style="overflow-x: auto"> -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Tipe Soal</th>
                  <th>Jawaban</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php use App\Scan; ?>
                @if($scans == "kosong")

                  <tr>
                    <td><center></td></center>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                  </tr>
                @else
                @foreach($pisahs as $key => $pisah)
                <tr>
                  <td><center></td></center>
                  <td>{{$pisah[1]}}</td>
                  <td>{{$pisah[0]}}</td>
                  <td>{{$pisah[2]}}</td>
                  <td></td>
                  <td><center><button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#{{$key}}"><i class="fa fa-eye"></i></button></center></td>
                </tr>
                <div class="modal fade" id="{{$key}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    
                    <?php
                      $i = 0;

                      $peserta = Peserta::select('nama_peserta', 'no_peserta', 'id_peserta')
                      ->get();
                      
                      // dd($percent);
                      $tepat = [];
                      
                      foreach($peserta as $id => $psrt) {
                        similar_text($psrt->nama_peserta, $pisah[0], $percent);
                        $tepat[$id] = [$percent, $psrt->no_peserta, $psrt->nama_peserta];
                      }
                      rsort($tepat);
                    ?>
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" align="center">Hasil Validasi</h4>
                      </div>
                      <div class="modal-body overflow-hidden">
                        <div class="row">
                          <div class="col-xs-12 box-table">
                            <div class="col-xs-3">
                              <b>No Peserta</b>
                            </div>
                            <div class="col-xs-9">
                              {{$pisahs[$key][1]}}
                            </div>
                          </div>
                          <div class="col-xs-12 box-table">
                            <div class="col-xs-3">
                              <b>Nama Peserta</b>
                            </div>
                            <div class="col-xs-9">
                              {{$pisahs[$key][0]}}
                            </div>
                            <br><br>
                            <div class="col-xs-12">
                            <p>Mungkin maksud Anda :</p>
                            </div>
                          </div>
                          @for($k=0; $k<3; $k++)
                          <div class="col-xs-12 box-table">
                            <div class="col-xs-1"></div>
                            <div class="col-xs-2"> {{$tepat[$k][1]}} </div>
                            <div class="col-xs-6"> {{$tepat[$k][2]}} </div>
                            <div class="col-xs-3"> <input type="radio" id="optionsRadios1"> </div>
                          </div>
                          @endfor
                          
                        </div>
                      </div>
                      <div class="box-footer">
                        <button type="submit" name="submit" value="create" class="btn btn-info pull-right">Validasi</button>
                        {{ csrf_field() }}
                      </div>
                    </div>
                  </div>
                </div> 
                @endforeach
                @endif
                </tbody>
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
