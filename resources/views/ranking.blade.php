@extends('adminlte::layouts.app')

@section('main-content')

<?php
use App\Models\Prodi;
use App\Models\Peserta;
use App\Models\Ranking;
?>

<style type="text/css">
	.content {
		padding: 25px;
	}
</style>

<h4 style="color:#807e7d; margin-bottom: 2em"> 
	<b> DASHBOARD PERANGKINGAN</b></h4>
	<?php
        use App\Tahun;
        use Illuminate\Support\Facades\URL;

        $tahunsekarang = Tahun::select('tahun')->orderBy('tahun', 'desc')->first();
        $ts = $tahunsekarang->tahun;
        $url = url()->current(); 
        $teks = explode("/",$url); 
      ?>
	@if(count($teks) <= 4)
	<div class="row">
		<div class="col-md-3">
			<a href="/dashboardrankings" style="color: black;"><button type="submit" action="" class="btn btn-flat col-xs-12 ajax" > <strong>Perangkingan</strong> </button></a>
		</div>
		<div class="col-md-3">
			 <button type="submit" class="btn btn-flat col-xs-12 green-main-color font-white" data-toggle="modal" data-target="#cadangan"> <strong>Cadangan</strong> </button>
		</div>
	</div>
	@endif
		
          <!-- <div class="rw col-xs-12 col-lg-1" style="float: right;padding: 0;">
              <button type="submit" class="btn btn-flat col-xs-12 green-main-color font-white"> <i class="fa fa-trash-o"></i>  </button>
          </div> -->
    <br>
        <div class="modal fade" id="cadangan">
          	<form method="post" action="/cadangan">
          		<div class="modal-dialog">
            		<div class="modal-content">
              			<div class="modal-header" style="background: #3c8dbc !important">
                			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  			<span aria-hidden="true">&times;</span></button>
                			<h4 class="modal-title" style="color: #fff">Cadangan</h4>
              			</div>
              			<div class="modal-body" style="padding: 3em; background: #eee">
                			<p>Peserta Cadangan</p>
                			<input type="text" name="cadangan" style="width: 100%; color: #000; text-align: center;" placeholder="Jumlah Cadangan">
              			</div>
              			<div class="modal-footer" style="background: #3c8dbc !important">
                			<input type="hidden" name="id" value="cadangan" >
                			<button type="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9">Submit</button>
                			{{ csrf_field() }}
                			<div class="clearfix"></div>
              			</div>
            		</div>
          		</div>
          	</form>
        </div>

	    @foreach($jrsn as $jurusan)
        <div class="row">
        	<div class="col-md-12">	
		        <div class="box box-widget">
		            <div class="box-header with-border bg-light-blue" style="padding: 15px">
		            	<h3 class="box-title">{{$jurusan->nama_jurusan}}</h3>
		            	<div class="box-tools pull-right">
		            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		              	</div>
		            </div> <!-- /.box-header -->
		           <?php $programstudi = Prodi::select('id_prodi', 'nama_prodi')
				    		->where('id_jurusan', $jurusan->id_jurusan)
				    		->orderby('id_prodi')
							->get();
				    ?>

		            <div class="box-body">
		              	<div class="nav-tabs-custom">
		                	<ul class="nav nav-tabs">
		                	<?php $i = 1; ?>
		                	@foreach($programstudi as $prodi)
		                		@if($i == 1)
		                  		<li class="active" style="width: 15%; height: 100%;"><a href=<?php echo '#'.$prodi->id_prodi; ?> data-toggle="tab">{{$prodi->nama_prodi}}</a></li>
		                  		@else
		                  		<li style="width: 15%; height: auto;"><a href=<?php echo '#'.$prodi->id_prodi; ?> data-toggle="tab">{{$prodi->nama_prodi}}</a></li>
		                  		@endif
		                  		<?php $i++; ?>
		                  	@endforeach
		                	</ul>
		                	
							<?php $n = 1; ?>
		                	<div class="box-body border-radius-none">
		                  		<div class="tab-content">
		                  			@foreach($programstudi as $prodi)
										@if($n == 1)
										<div class="tab-pane active" id=<?php echo $prodi->id_prodi; ?>>
		                    				<center style="margin-top: 1.5em"><b style="text-transform: uppercase;">{{$prodi->nama_prodi}}</b></center>
		                    				<div class="box-body">
						          				<table class="table table-bordered table-striped examples">
							        				<thead>
								      					<tr>
							    	    					<th>No</th>
							            					<th>No Peserta</th>
												            <th>Nama Peserta</th>
												            <th>Total Nilai</th>
												            <th>Keterangan</th>
												          </tr>
											        </thead>
											        <tbody>
												        <?php $m = 1; 
												        if(count($teks)<=4)
												        {
												        	$dapat = Peserta::select('no_peserta', 'nama_peserta', 'total_score', 'keterangan')
															->join('ranking', 'peserta.id_peserta', 'ranking.id_peserta')
															->join('hasil_perhitungan', 'peserta.id_peserta', 'hasil_perhitungan.id_peserta')
															->where('id_prodi', $prodi->id_prodi)
															->whereIn('keterangan', ['Lulus', 'Cadangan'])
															// ->whereIn('peserta.id_peserta', ${'sdhdpt'. $n++})
															->orderby('total_score', 'desc')
															->get();
													    }
													    else
													    {
													    	$dapat = Peserta::select('no_peserta', 'nama_peserta', 'total_score', 'keterangan')
															->join('ranking', 'peserta.id_peserta', 'ranking.id_peserta')
															->join('hasil_perhitungan', 'peserta.id_peserta', 'hasil_perhitungan.id_peserta')
															->where('id_prodi', $prodi->id_prodi)
															->whereIn('keterangan', ['Lulus', 'Cadangan'])
															->whereYear('peserta.created_at', $teks[4])
															// ->whereIn('peserta.id_peserta', ${'sdhdpt'. $n++})
															->orderby('total_score', 'desc')
															->get();
													    }
												        
														$hasil = array();
														foreach($dapat as $dapats)
															{
																array_push($hasil, $dapats->nama_peserta);
															}
												        ?>
								        				@foreach($dapat as $dapats)
								            				<tr>
												        	  <td>{{$m++}}</td>
												              <td>{{$dapats->no_peserta}}</td>
												              <td>{{$dapats->nama_peserta}}</td>
												              <td>{{$dapats->total_score}}</td>
												              <td>{{$dapats->keterangan}}</td>
												            </tr>
								        				@endforeach
							        				</tbody>
							      				</table>
							    			</div>
						    			</div>
						    			@else 
						    			<div class="tab-pane" id=<?php echo $prodi->id_prodi; ?>>
		                    				<center style="margin-top: 1.5em"><b style="text-transform: uppercase;">{{$prodi->nama_prodi}}</b></center>
		                    				<div class="box-body">
						          				<table class="table table-bordered table-striped examples">
							        				<thead>
								      					<tr>
							    	    					<th>No</th>
							            					<th>No Peserta</th>
												            <th>Nama Peserta</th>
												            <th>Total Nilai</th>
												            <th>Keterangan</th>
												          </tr>
											        </thead>
											        <tbody>
												        <?php $m = 1; 
												        $dapat = Peserta::select('no_peserta', 'nama_peserta', 'total_score', 'keterangan')
														->join('ranking', 'peserta.id_peserta', 'ranking.id_peserta')
														->join('hasil_perhitungan', 'peserta.id_peserta', 'hasil_perhitungan.id_peserta')
														->where('id_prodi', $prodi->id_prodi)
														->whereIn('keterangan', ['Lulus', 'Cadangan'])
														// ->whereIn('peserta.id_peserta', ${'sdhdpt'. $n++})
														->orderby('total_score', 'desc')
														->get();
														$hasil = array();
														foreach($dapat as $dapats)
															{
																array_push($hasil, $dapats->nama_peserta);
															}
												        ?>
								        				@foreach($dapat as $dapats)
								            				<tr>
												        	  <td>{{$m++}}</td>
												              <td>{{$dapats->no_peserta}}</td>
												              <td>{{$dapats->nama_peserta}}</td>
												              <td>{{$dapats->total_score}}</td>
												              <td>{{$dapats->keterangan}}</td>
												            </tr>
								        				@endforeach
							        				</tbody>
							      				</table>
							    			</div>
						    			</div>
						    			@endif
						    			<?php $n++; ?>
						        	@endforeach
						        </div>
		                	</div>
		              	</div> <!-- nav tab -->
		            </div>
		            <!-- /.box-body -->

		        </div>
		    </div>
        </div>
        @endforeach
        <!-- /.box -->



@endsection