@extends('adminlte::layouts.app')

@section('main-content')

<h4 style="color:#807e7d;"> <b> REKAYASA</b> </h4> 

<!-- PRODUCT LIST -->
<div class="row">
	@foreach($programstudi as @prodi)
	<div class="col-md-4">
		<div class="box box-primary">
	       	<div class="box-header with-border bg-blue">
			    <span class="info-box-icon" style="background: transparent;"><img src="../../img/logohme.png"></span>
	              <div class="info-box-content">
	                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>{{ $prodi->nama_jurusan}}</h3></span>
	              </div>
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
	              </div>
		    </div>  <!-- /.box-header -->
		    <div class="box-body" style="overflow-y: scroll; overflow-x: hidden; max-height: 450px;">
			    <ul class="products-list product-list-in-box">
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           	<div class="modal fade" id="modal-edit">
						  <div class="modal-dialog">
						      <div class="modal-content">
						          <div class="modal-header green-background-main-color">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						              <span aria-hidden="true">&times;</span></button>
						              <h4 class="modal-title" align="center">Ubah Teknik Komputer Jaringan</h4>
						          </div>
						            <div class="modal-body">
						              <form method="POST" action="http://127.0.0.1:8000/apotek/87" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="q5LVdSkLsNkbYxmnn1kC7Fbxo7kEr8yyQnqMuNP5">

						                <div class="form-group">
						                  <label for="exampleInputPassword1">Nama Prodi</label>
						                  <input type="text" class="form-control" name="nama_tempat" value="Teknik Komputer dan Jaringan">
						                </div> 

						                <div class="row">
							           		<div class="col-md-1"></div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
								            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota" value="150"><br>Kuota
						           				</div>
						           			</div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
								            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota" value="70"><br>Min Score
						           				</div>
						           			</div>
						           			<div class="col-md-1"></div>
							           	</div>
						                
						                <div class="modal-footer">
						                <input name="_method" type="hidden" value="PUT">
						                <button type="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9">Submit</button>
						                <div class="clearfix"></div>
						              </div>


						              </form>
						              </div>

						      </div>
						  </div>
						</div>
			           
			        </li>

			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>
			       
				            <!--<div class="col-md-6">

					          <div class="small-box bg-blue" style="width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>Kuota
					            </div>
					          </div>
					        </div>
					        <div class="col-lg-6 col-xs-6">

					          <div class="small-box" style="background-color: #d63031; width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>
					              <span style="color:white">Min Score</span>
					            </div>
					          </div>
					        </div>-->

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
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
				            <form method="POST" action="http://127.0.0.1:8000/apotek/87" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="q5LVdSkLsNkbYxmnn1kC7Fbxo7kEr8yyQnqMuNP5">
				                <div class="form-group">
				                  <input type="text" class="form-control" id="judul" name="prodi" placeholder="Program Studi">
				                </div> 
				                <div class="row">
					           		<div class="col-md-1"></div>
				           			<div class="col-md-5">
				           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
						            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota"><br>Kuota
				           				</div>
				           			</div>
				           			<div class="col-md-5">
				           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
						            		<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota"><br>Min Score
				           				</div>
				           			</div>
								    <div class="col-md-1"></div>
								</div>
								                
								<div class="modal-footer">
								    <input name="_method" type="hidden" value="PUT">
								    <button type="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9">Submit</button>
								    <div class="clearfix"></div>
							    </div>
							</form>
						</div>

					</div>
				  </div>
			</div>

	  	</div>    <!-- /.box -->
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
	       	<div class="box-header with-border bg-blue">
			    <span class="info-box-icon" style="background: transparent;"><img src="../../img/logohme.png"></span>
	              <div class="info-box-content">
	                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>Teknik Elektro</h3></span>
	              </div>
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
	              </div>
		    </div>  <!-- /.box-header -->
		    <div class="box-body" style="overflow-y: scroll; overflow-x: hidden; max-height: 450px;">
			    <ul class="products-list product-list-in-box">
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           	<div class="modal fade" id="modal-edit">
						  <div class="modal-dialog">
						      <div class="modal-content">
						          <div class="modal-header green-background-main-color">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						              <span aria-hidden="true">&times;</span></button>
						              <h4 class="modal-title" align="center">Ubah Teknik Komputer Jaringan</h4>
						          </div>
						            <div class="modal-body">
						              <form method="POST" action="http://127.0.0.1:8000/apotek/87" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="q5LVdSkLsNkbYxmnn1kC7Fbxo7kEr8yyQnqMuNP5">

						                <div class="form-group">
						                  <label for="exampleInputPassword1">Nama Prodi</label>
						                  <input type="text" class="form-control" name="nama_tempat" value="Teknik Komputer dan Jaringan">
						                </div> 

						                <div class="row">
							           		<div class="col-md-1"></div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
								            			<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota" value="150"><br>Kuota
						           				</div>
						           			</div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
						           					<div style="text-align: center; padding:5px">
								            			<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota" value="70"><br>Min Score
								        			</div>
						           				</div>
						           			</div>
						           			<div class="col-md-1"></div>
							           	</div>

						                <div class="modal-footer">
						                <input name="_method" type="hidden" value="PUT">
						                <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
						                <div class="clearfix"></div>
						              </div>


						              </form>
						              </div>

						      </div>
						  </div>
						</div>
			           
			        </li>

			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>
			       
				            <!--<div class="col-md-6">

					          <div class="small-box bg-blue" style="width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>Kuota
					            </div>
					          </div>
					        </div>
					        <div class="col-lg-6 col-xs-6">

					          <div class="small-box" style="background-color: #d63031; width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>
					              <span style="color:white">Min Score</span>
					            </div>
					          </div>
					        </div>-->

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			    </ul>
		    </div> <!-- /.box-body -->
		    <div class="box-footer text-center">
		       <button type="button" class="btn" style="background-color: #dfe6e9">Tambah Program Studi
                </button>
		    </div>  <!-- /.box-footer -->
	  	</div>    <!-- /.box -->
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
	       	<div class="box-header with-border bg-blue">
			    <span class="info-box-icon" style="background: transparent;"><img src="../../img/logohme.png"></span>
	              <div class="info-box-content">
	                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>Teknik Elektro</h3></span>
	              </div>
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
	              </div>
		    </div>  <!-- /.box-header -->
		    <div class="box-body" style="overflow-y: scroll; overflow-x: hidden; max-height: 450px;">
			    <ul class="products-list product-list-in-box">
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           	<div class="modal fade" id="modal-edit">
						  <div class="modal-dialog">
						      <div class="modal-content">
						          <div class="modal-header green-background-main-color">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						              <span aria-hidden="true">&times;</span></button>
						              <h4 class="modal-title" align="center">Ubah Teknik Komputer Jaringan</h4>
						          </div>
						            <div class="modal-body">
						              <form method="POST" action="http://127.0.0.1:8000/apotek/87" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="q5LVdSkLsNkbYxmnn1kC7Fbxo7kEr8yyQnqMuNP5">

						                <div class="form-group">
						                  <label for="exampleInputPassword1">Nama Prodi</label>
						                  <input type="text" class="form-control" name="nama_tempat" value="Teknik Komputer dan Jaringan">
						                </div> 

						                <div class="row">
							           		<div class="col-md-1"></div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
								            			<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota" value="150"><br>Kuota
						           				</div>
						           			</div>
						           			<div class="col-md-5">
						           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
						           					<div style="text-align: center; padding:5px">
								            			<center><input style="text-align: center; padding-top: 5px;font-size: 12pt; background-color: transparent; width: 50%; color: white; border: none;" type="text" name="kuota" value="70"><br>Min Score
								        			</div>
						           				</div>
						           			</div>
						           			<div class="col-md-1"></div>
							           	</div>

						                <div class="modal-footer">
						                <input name="_method" type="hidden" value="PUT">
						                <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
						                <div class="clearfix"></div>
						              </div>


						              </form>
						              </div>

						      </div>
						  </div>
						</div>
			           
			        </li>

			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>
			       
				            <!--<div class="col-md-6">

					          <div class="small-box bg-blue" style="width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>Kuota
					            </div>
					          </div>
					        </div>
					        <div class="col-lg-6 col-xs-6">

					          <div class="small-box" style="background-color: #d63031; width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>
					              <span style="color:white">Min Score</span>
					            </div>
					          </div>
					        </div>-->

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">150</h4><h6>Kuota</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red"  style="width:75%; height: 60px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h4 style="color: white;line-height: 5px;margin-top: 10px;">70</h4><h6>Min Score</h6>
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			    </ul>
		    </div> <!-- /.box-body -->
		    <div class="box-footer text-center">
		       <button type="button" class="btn" style="background-color: #dfe6e9">Tambah Program Studi
                </button>
		    </div>  <!-- /.box-footer -->
	  	</div>    <!-- /.box -->
	</div>
</div>

<h4 style="color:#807e7d;"> <b> TATA NIAGA</b> </h4>

<!-- PRODUCT LIST -->
<div class="row">
	<div class="col-md-4">
		<div class="box box-primary">
	       	<div class="box-header with-border bg-blue">
			    <span class="info-box-icon bg-blue"><i class="fa fa-key"></i></span>
	              <div class="info-box-content">
	                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>Akuntansi</h3></span>
	              </div>
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
	              </div>
		    </div>  <!-- /.box-header -->
		    <div class="box-body" style="overflow-y: scroll; overflow-x: hidden; max-height: 450px;">
			    <ul class="products-list product-list-in-box">
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>
			       
				            <!--<div class="col-md-6">

					          <div class="small-box bg-blue" style="width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>Kuota
					            </div>
					          </div>
					        </div>
					        <div class="col-lg-6 col-xs-6">

					          <div class="small-box" style="background-color: #d63031; width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>
					              <span style="color:white">Min Score</span>
					            </div>
					          </div>
					        </div>-->

			           
			        </li>

			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>
			       
				            <!--<div class="col-md-6">

					          <div class="small-box bg-blue" style="width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>Kuota
					            </div>
					          </div>
					        </div>
					        <div class="col-lg-6 col-xs-6">

					          <div class="small-box" style="background-color: #d63031; width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>
					              <span style="color:white">Min Score</span>
					            </div>
					          </div>
					        </div>-->

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			    </ul>
		    </div> <!-- /.box-body -->
		    <div class="box-footer text-center">
		       <button type="button" class="btn" style="background-color: #dfe6e9">Tambah Program Studi
                </button>
		    </div>  <!-- /.box-footer -->
	  	</div>    <!-- /.box -->
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
	       	<div class="box-header with-border bg-blue">
			    <span class="info-box-icon bg-blue"><i class="fa fa-key"></i></span>
	              <div class="info-box-content">
	                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>Akuntansi</h3></span>
	              </div>
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
	              </div>
		    </div>  <!-- /.box-header -->
		    <div class="box-body" style="overflow-y: scroll; overflow-x: hidden; max-height: 450px;">
			    <ul class="products-list product-list-in-box">
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>
			       
				            <!--<div class="col-md-6">

					          <div class="small-box bg-blue" style="width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>Kuota
					            </div>
					          </div>
					        </div>
					        <div class="col-lg-6 col-xs-6">

					          <div class="small-box" style="background-color: #d63031; width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>
					              <span style="color:white">Min Score</span>
					            </div>
					          </div>
					        </div>-->

			           
			        </li>

			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>
			       
				            <!--<div class="col-md-6">

					          <div class="small-box bg-blue" style="width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>Kuota
					            </div>
					          </div>
					        </div>
					        <div class="col-lg-6 col-xs-6">

					          <div class="small-box" style="background-color: #d63031; width:70%; height:auto;">
					            <div class="inner">
					              <h3 style="color: white">150</h3>
					              <span style="color:white">Min Score</span>
					            </div>
					          </div>
					        </div>-->

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			        <li class="item">
			           <a href="javascript:void(0)" class="product-title">Teknik Komputer dan Jaringan
			            </a>

			           <button type="submit" name="search" id="search-btn" class="btn-xs btn-primary pull-right" data-toggle="modal" data-target="#modal-edit-24"><i class="fa fa-edit"></i></button>
			           <br><br>

			           	<div class="row">
			           		<div class="col-md-1"></div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-blue" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">150</h3>Kuota
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-5">
		           				<div class="small-box bg-red" style="width:100%; height: 80px; padding: 5px" >
		           					<div style="text-align: center; padding:5px">
				            			<h3 style="color: white;line-height: 10px;margin-top: 20px;">70</h3>Min Score
				        			</div>
		           				</div>
		           			</div>
		           			<div class="col-md-1"></div>
			           	</div>

			           
			        </li>
			        <!-- /.item -->
			    </ul>
		    </div> <!-- /.box-body -->
		    <div class="box-footer text-center">
		       <button type="button" class="btn" style="background-color: #dfe6e9">Tambah Program Studi
                </button>
		    </div>  <!-- /.box-footer -->
	  	</div>    <!-- /.box -->
	</div>
</div>

@endsection