@extends('adminlte::layouts.app')

@section('main-content')


<?php
use App\Models\Prodi;
?>

<div class="box">
	<div class="box-header with-border" style="padding: 15px">
      <h4 style="color:#807e7d;"> <b> REKAYASA</b> </h4> 
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div> <!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			 @foreach($jrsn1 as $jurusan1)
			<div class="col-md-4">
				<div class="box box-primary">
			       	<div class="box-header with-border bg-blue">
					    <span class="info-box-icon" style="background: transparent;"><i class="fa fa-university"></i></span>
			              <div class="info-box-content">
			                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>{{ $jurusan1->nama_jurusan}}</h3></span>
			              </div>
			              <div class="pull-right box-tools">
			                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
			              </div>
				    </div>  <!-- /.box-header -->
				    <?php
				    $programstudi1 = Prodi::select('id_prodi', 'nama_prodi', 'jmlh_kuota', 'min_score')
				    		->where('id_jurusan', $jurusan1->id_jurusan)
				    		->orderby('id_prodi')
							->get();
				    ?>

				    <div class="box-body" style="overflow-y: scroll; overflow-x: hidden; max-height: 450px;">
					    <ul class="products-list product-list-in-box">
					        @foreach($programstudi1 as $prodi1)
					        <li class="item">
					           <a href="javascript:void(0)" class="product-title">{{ $prodi1->nama_prodi}}
					            </a>

					           <button type="button" class="btn-xs btn-danger pull-right" data-toggle="modal" data-target="#modal-hapus{{$prodi1->id_prodi}}"><i class="ion-ios-trash"></i></button>
					           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit{{$prodi1->id_prodi}}"><i class="fa fa-edit"></i></button>

					           <br><br>

					           	<div class="row">
					           		<div class="col-md-1"></div>
				           			<div class="col-md-5">
				           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
				           					<div style="text-align: center; padding:5px">
						            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">{{ $prodi1->jmlh_kuota }}</h4><h6>Kuota</h6>
						        			</div>
				           				</div>
				           			</div>
				           			<div class="col-md-5">
				           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
				           					<div style="text-align: center; padding:5px">
						            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">{{ $prodi1->min_score }}</h4><h6>Min Score</h6>
						        			</div>
				           				</div>
				           			</div>
				           			<div class="col-md-1"></div>
					           	</div>

						        <div class="modal fade" id="modal-hapus{{$prodi1->id_prodi}}">
						          <div class="modal-dialog">
						            <div class="modal-content">
						              <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                  <span aria-hidden="true">&times;</span></button>
						                <h4 class="modal-title">Hapus {{ $prodi1->nama_prodi }}</h4>
						              </div>
						              <div class="modal-body">
						                <p>Apakah Anda yakin ingin menghapus Prodi {{ $prodi1->nama_prodi }}</p>
						              </div>
						              <div class="modal-footer">
						                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
						                <!-- <button type="button" class="btn btn-primary">Ya</button> -->
						                <form action="/prodi/{{$prodi1->id_prodi}}" method="post">
						                	<input type="submit" name="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="Hapus">
								        	{{ csrf_field() }}
								        	<input type="hidden" name="_method"  value="delete">
								        </form>
						              </div>
						            </div>
						            <!-- /.modal-content -->
						          </div>
						          <!-- /.modal-dialog -->
						        </div>
						        <!-- /.modal -->  

					           	<div class="modal fade" id="modal-edit{{$prodi1->id_prodi}}">
								  <div class="modal-dialog">
								      <div class="modal-content">
								          <div class="modal-header green-background-main-color">
								            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								              <span aria-hidden="true">&times;</span></button>
								              <h4 class="modal-title" align="center">Ubah {{ $prodi1->nama_prodi}}</h4>
								          </div>
								            <div class="modal-body">
								              <form method="post" action="/prodi/{{$prodi1->id_prodi}}">

								                <div class="form-group">
								                  <label for="exampleInputPassword1">Nama Prodi</label>
								                  <input type="text" class="form-control" name="nama_prodi" value="{{ $prodi1->nama_prodi}}">
								                </div> 

								                <div class="row">
									           		<div class="col-md-1"></div>
								           			<div class="col-md-5">
								           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
										            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="jmlh_kuota" value="{{ $prodi1->jmlh_kuota}}"><br>Kuota
								           				</div>
								           			</div>
								           			<div class="col-md-5">
								           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
										            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="min_score" value="{{ $prodi1->min_score }}"><br>Min Score
								           				</div>
								           			</div>
								           			<div class="col-md-1"></div>
									           	</div>
								                
								                <div class="modal-footer">
								                <input type="submit" name="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="Ubah">
								                {{ csrf_field() }}
								                <input type="hidden" name="_method"  value="put">
								              </div>


								              </form>
								              </div>

								      </div>
								  </div>
								</div>
					           
					        </li>
					        @endforeach
					    </ul>
				    </div> <!-- /.box-body -->

				    <div class="box-footer text-center">
				       <button type="button" class="btn" style="background-color: #dfe6e9" data-toggle="modal" data-target="#modal-tambah">Tambah Program Studi
		                </button>
				    </div>  <!-- /.box-footer -->

				    <div class="modal fade" id="modal-tambah">
						<div class="modal-dialog">
						    <div class="modal-content">
						        <div class="modal-header green-background-main-color">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						            <span aria-hidden="true">&times;</span></button>
						              <h4 class="modal-title" align="center">Tambah Program Studi</h4>
						        </div>
						        <div class="modal-body">
						            <form method="post" action="/tambahprodi">
						                <div class="form-group">
						                  <input type="text" class="form-control" id="judul" name="nama_prodi" placeholder="Program Studi">
						                </div> 
						                <div class="row">
							           		<div class="col-md-1"></div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
								            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="jmlh_kuota"><br>Kuota
						           				</div>
						           			</div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
								            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="min_score"><br>Min Score
						           				</div>
						           			</div>
										    <div class="col-md-1"></div>
										</div>
										                
										<div class="modal-footer">
											<input type="hidden" name="id" value= {{ $jurusan1->id_jurusan }} >
										    <button type="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9">Submit</button>
											{{ csrf_field() }}
										    <div class="clearfix"></div>
									    </div>
									</form>
								</div>

							</div>
						  </div>
					</div>

			  	</div>    <!-- /.box -->
			</div>
			@endforeach
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header with-border" style="padding: 15px">
      <h4 style="color:#807e7d;"> <b> TATA NIAGA</b> </h4>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div> <!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			 @foreach($jrsn2 as $jurusan2)
			<div class="col-md-4">
				<div class="box box-primary">
			       	<div class="box-header with-border bg-blue">
					    <span class="info-box-icon" style="background: transparent;"><i class="fa fa-university"></i></span>
			              <div class="info-box-content">
			                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>{{ $jurusan2->nama_jurusan}}</h3></span>
			              </div>
			              <div class="pull-right box-tools">
			                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
			              </div>
				    </div>  <!-- /.box-header -->
				    <?php
				    $programstudi2 = Prodi::select('id_prodi', 'nama_prodi', 'jmlh_kuota', 'min_score')
				    		->where('id_jurusan', $jurusan2->id_jurusan)
				    		->orderby('id_prodi')
							->get();
				    ?>

				    <div class="box-body" style="overflow-y: scroll; overflow-x: hidden; max-height: 450px;">
					    <ul class="products-list product-list-in-box">
					        @foreach($programstudi2 as $prodi2)
					        <li class="item">
					           <a href="javascript:void(0)" class="product-title">{{ $prodi2->nama_prodi}}
					            </a>

					           <button type="button" class="btn-xs btn-danger pull-right" data-toggle="modal" data-target="#modal-hapus{{$prodi2->id_prodi}}"><i class="ion-ios-trash"></i></button>
					           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit{{$prodi2->id_prodi}}"><i class="fa fa-edit"></i></button>

					           <br><br>

					           	<div class="row">
					           		<div class="col-md-1"></div>
				           			<div class="col-md-5">
				           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
				           					<div style="text-align: center; padding:5px">
						            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">{{ $prodi2->jmlh_kuota }}</h4><h6>Kuota</h6>
						        			</div>
				           				</div>
				           			</div>
				           			<div class="col-md-5">
				           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
				           					<div style="text-align: center; padding:5px">
						            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">{{ $prodi2->min_score }}</h4><h6>Min Score</h6>
						        			</div>
				           				</div>
				           			</div>
				           			<div class="col-md-1"></div>
					           	</div>

						        <div class="modal fade" id="modal-hapus{{$prodi2->id_prodi}}">
						          <div class="modal-dialog">
						            <div class="modal-content">
						              <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                  <span aria-hidden="true">&times;</span></button>
						                <h4 class="modal-title">Hapus {{ $prodi2->nama_prodi }}</h4>
						              </div>
						              <div class="modal-body">
						                <p>Apakah Anda yakin ingin menghapus Prodi {{ $prodi2->nama_prodi }}</p>
						              </div>
						              <div class="modal-footer">
						                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
						                <!-- <button type="button" class="btn btn-primary">Ya</button> -->
						                <form action="/prodi/{{$prodi2->id_prodi}}" method="post">
						                	<input type="submit" name="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="Hapus">
								        	{{ csrf_field() }}
								        	<input type="hidden" name="_method"  value="delete">
								        </form>
						              </div>
						            </div>
						            <!-- /.modal-content -->
						          </div>
						          <!-- /.modal-dialog -->
						        </div>
						        <!-- /.modal -->  

					           	<div class="modal fade" id="modal-edit{{$prodi2->id_prodi}}">
								  <div class="modal-dialog">
								      <div class="modal-content">
								          <div class="modal-header green-background-main-color">
								            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								              <span aria-hidden="true">&times;</span></button>
								              <h4 class="modal-title" align="center">Ubah {{ $prodi2->nama_prodi}}</h4>
								          </div>
								            <div class="modal-body">
								              <form method="post" action="/prodi/{{$prodi2->id_prodi}}">

								                <div class="form-group">
								                  <label for="exampleInputPassword1">Nama Prodi</label>
								                  <input type="text" class="form-control" name="nama_prodi" value="{{ $prodi2->nama_prodi}}">
								                </div> 

								                <div class="row">
									           		<div class="col-md-1"></div>
								           			<div class="col-md-5">
								           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
										            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="jmlh_kuota" value="{{ $prodi2->jmlh_kuota}}"><br>Kuota
								           				</div>
								           			</div>
								           			<div class="col-md-5">
								           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
										            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="min_score" value="{{ $prodi2->min_score }}"><br>Min Score
								           				</div>
								           			</div>
								           			<div class="col-md-1"></div>
									           	</div>
								                
								                <div class="modal-footer">
								                <input type="submit" name="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="Ubah">
								                {{ csrf_field() }}
								                <input type="hidden" name="_method"  value="put">
								              </div>


								              </form>
								              </div>

								      </div>
								  </div>
								</div>
					           
					        </li>
					        @endforeach
					    </ul>
				    </div> <!-- /.box-body -->

				    <div class="box-footer text-center">
				       <button type="button" class="btn" style="background-color: #dfe6e9" data-toggle="modal" data-target="#modal-tambah">Tambah Program Studi
		                </button>
				    </div>  <!-- /.box-footer -->

				    <div class="modal fade" id="modal-tambah">
						<div class="modal-dialog">
						    <div class="modal-content">
						        <div class="modal-header green-background-main-color">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						            <span aria-hidden="true">&times;</span></button>
						              <h4 class="modal-title" align="center">Tambah Program Studi</h4>
						        </div>
						        <div class="modal-body">
						            <form method="post" action="/tambahprodi">
						                <div class="form-group">
						                  <input type="text" class="form-control" id="judul" name="nama_prodi" placeholder="Program Studi">
						                </div> 
						                <div class="row">
							           		<div class="col-md-1"></div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
								            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="jmlh_kuota"><br>Kuota
						           				</div>
						           			</div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
								            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="min_score"><br>Min Score
						           				</div>
						           			</div>
										    <div class="col-md-1"></div>
										</div>
										                
										<div class="modal-footer">
											<input type="hidden" name="id" value= {{ $jurusan2->id_jurusan }} >
										    <button type="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9">Submit</button>
											{{ csrf_field() }}
										    <div class="clearfix"></div>
									    </div>
									</form>
								</div>

							</div>
						  </div>
					</div>

			  	</div>    <!-- /.box -->
			</div>
			@endforeach
		</div>
	</div>
</div>

@endsection