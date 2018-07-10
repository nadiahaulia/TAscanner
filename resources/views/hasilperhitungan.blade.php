@extends('adminlte::layouts.app')

@section('main-content')

  <h4 style="color:#807e7d;"> 
       <b> DATA HASIL PERHITUNGAN</b> </h4><br>
    
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
                  <th>Bidang</th>
                  <th>Jumlah Benar</th>
                  <th>Jumlah Salah</th>
                  <th>Jumlah Kosong</th>
                  <th>Total Hasil</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php use App\Scan; ?>
                @if($hasil == "kosong")

                  <tr>
                    <td><center></td></center>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                  </tr>
                @else
                @foreach($hasil as $hasils)
                <tr>
                  <td><center>{{$hasils->id_peserta}}</td></center>
                  <td>{{$hasils->no_peserta}}</td>
                  <td>{{$hasils->nama_peserta}}</td>
                  <td>{{$hasils->nama_bidang_jurusan}}</td>
                  <td> {{$hasils->jmlh_benar}}</td>
                  <td> {{$hasils->jmlh_salah}}</td>
                  <td> {{$hasils->jmlh_kosong}}</td>
                  <td> {{$hasils->total_score}}</td>
                  <td><center><button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#{{$hasils->id_peserta}}"><i class="fa fa-eye"></i></button></center></td>
                </tr>
                <?php 
                          $hsl = Scan::select('*')
                          ->where('id_peserta', $hasils->id_peserta)
                          ->first();
                          // dd($hasils->id_peserta);
                            // array_push($ts, explode(";",$hsl->scan_teks));

                          $pisah = explode(";", $hsl->scan_teks);
                          $nama = $pisah[0];
                          $no = $pisah[1];
                          $tipe = $pisah[2];
                          $jwbn = $pisah[3];
                          $m = 0;
                          ?>
                            <?php  $jwbn = str_split($jwbn); ?>
                <div class="modal fade" id="{{$hasils->id_peserta}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" align="center">Jawaban</h4>
                      </div>
                      <div class="modal-body overflow-hidden">
                        <div class="row">
                          <div class="col-xs-12 box-table">
                            <div class="col-xs-3">
                              <b>No Peserta</b>
                            </div>
                            <div class="col-xs-9">
                              {{$hasils->no_peserta}}
                            </div>
                          </div>
                          <div class="col-xs-12 box-table">
                            <div class="col-xs-3">
                              <b>Nama Peserta</b>
                            </div>
                            <div class="col-xs-9">
                              {{$hasils->nama_peserta}}
                            </div>
                          </div>
                          <div class="col-xs-12 box-table">
                            <div class="col-xs-3">
                              <b>Tipe Soal</b>
                            </div>
                            <div class="col-xs-9">
                              {{$tipe}}
                            </div>
                          </div>
                          <hr><hr><br>
                          <div class="col-xs-12 box-table">
                            <?php $i=1; ?>
                            @for($a=1;$a<=4;$a++)
                            <div class="col-xs-3">
                              @while($i>0) 
                                <?php
                                  if(count($scans) == 0)
                                {
                                  $jwbn[$i-1] = "";
                                }
                               ?>
                                  <div style="padding:10px;" >{{ $i }}<?php echo ". " . " " ?>{{ $jwbn[$i-1] }}</div>
                            
                                <?php if($i++%(25*$a)==0) break; ?>
                              
                              @endwhile
                            </div>
                            @endfor
                          </div>

                        </div>
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
