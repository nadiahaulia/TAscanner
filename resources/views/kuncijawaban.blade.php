@extends('adminlte::layouts.app')

@section('main-content')
<?php
use Illuminate\Support\Facades\Input;
use App\Models\Kunci;
?>
 <section class="content">
      <div class="row">
        
        <div class="col-md-7">
			<div class="box box-info">
	            <div class="box-header with-border">
	               <span class="info-box-icon" style="background-color: white"><i class="fa fa-key"></i></span>
	              <div class="info-box-content">
	                <span class="info-box-number" style="margin-top: 30px; font-style: bold"><h3>Input Kunci Jawaban</h3></span>
	              </div>
	              <div class="pull-right box-tools">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> 
	              </div>
	            </div>
	            <div class="box-body pad">
	            	<form action="/kelolakj" method="post">

					<div class="pull-left col-xs-12 col-lg-6">
						<select class="form-control kategori" name="id_bidang">
							<option value="0">- Kategori -</option>
							<option value="1" {{ (old('id_bidang') == '1') ? 'selected' : '' }}>Rekayasa</option>
							<option value="2" {{ (old('id_bidang') == '2') ? 'selected' : '' }}>Tata Niaga</option>
						</select>
					</div>
					<div class="col-xs-12 col-lg-6">
						<select class="form-control tipe" id="filter-tipe" name="tipe_soal">
							<option value="0">- Tipe -</option>
							<option value="A" {{ (old('tipe_soal') == 'A') ? 'selected' : '' }}>A</option>
							<option value="B" {{ (old('tipe_soal') == 'B') ? 'selected' : '' }}>B</option>
							<option value="C" {{ (old('tipe_soal') == 'C') ? 'selected' : '' }}>C</option>
							<option value="D" {{ (old('tipe_soal') == 'D') ? 'selected' : '' }}>D</option>
						</select>
					</div>
					<br><br><hr>


	                 
	                 <div class="row">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	                 	<?php for($i = 0; $i <= 3; $i++) {
	                 			echo
					            '<div class="col-md-3">
	                 		<div class="form-group">
	                 		<table>
					            <thead>
					            		<tr>
					            			<th></th>' ?>
					            			<?php echo '<th>'?> A <?php echo '</th>'?>
					            			<?php echo '<th>'?> B <?php echo '</th>'?>
					            			<?php echo '<th>'?> C <?php echo '</th>'?>
					            			<?php echo '<th>'?> D <?php echo '</th>'?>
					            			<?php echo '<th>'?> E <?php echo '</th>'?>
					            		<?php echo '</tr>
					            	</thead>
					            	<tbody>'?>
					            	<?php 


					            	for($j = 1; $j <=25; $j++){
					            		echo '<tr>'?>
					            			<?php echo '<td style="padding:3px">' . ($j+($i*25)) . '</td>'?>
					            			<?php echo '<td style="padding:3px"><input type="radio" name="' . ($j+($i*25)) . '" id="optionsRadios1" value="A"'?> {{ (old(($j+($i*25))) == 'A') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . ($j+($i*25)) . '" id="optionsRadios1" value="B"'?> {{ (old(($j+($i*25))) == 'B') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . ($j+($i*25)) . '" id="optionsRadios1" value="C"'?> {{ (old(($j+($i*25))) == 'C') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . ($j+($i*25)) . '" id="optionsRadios1" value="D"'?> {{ (old(($j+($i*25))) == 'D') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . ($j+($i*25)) . '" id="optionsRadios1" value="E"'?> {{ (old(($j+($i*25))) == 'E') ? 'checked' : '' }} <?php echo '></td>
					            		</tr>' ?>
					            			     
					            		<?php } ?>
					            	<?php echo'</tbody>
					            </table>
			            	
			            	</div>
	                 	</div>' ?>
	                 	<?php } ?>
	                 	
	                 </div>
	                 

	                <div class="box-footer">
	                  <button type="submit" name="submit" value="create" class="btn btn-info pull-right">Submit</button>
	                  {{ csrf_field() }}
	                </div>
	             </form>
	            </div>
          	</div>
        </div>
        <div class="col-xs-5">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tataniaga" data-toggle="tab">Tata Niaga</a></li>
              <li><a href="#rekayasa" data-toggle="tab">Rekayasa</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Kunci Jawaban</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="tataniaga" style="position: relative; height: 300px;">
	            <div class="box-body">
	              <table id="example1" class="table table-bordered table-striped text-center">
	                <thead>
	                <tr>
	                  <th >No</th>
	                  <th>Tipe Soal</th>
	                  <th>Aksi</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php for($n = 1; $n <=4; $n++){
	                	$tipe = array("A", "B", "C", "D");
	                	echo '
	                <tr>
	                  <td>'. $n . '</td>
	                  <td>'. $tipe[$n-1] . '</td>
	                  	<td style="white-space: nowrap;"> 
	                    <button type="submit" name="'. $tipe[$n-1] .'" id="2" class="btn btn-info" data-toggle="modal" data-target="#modal-lihat'.$n.'"><i class="fa fa-eye"></i></button>

	                    <button type="submit" name="edit" id="search-btn" class="btn btn-success" data-toggle="modal" data-target="#modal-edit'.$n.'"><i class="fa fa-edit"></i></button>
	                    
	                    <button type="submit" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus'.$n.'"><i class="ion-ios-trash"></i></button>

	                  </td>
	                </tr>'?>
	                <?php } ?>
	                </tbody>
	              </table>
	          	</div>
	          <!-- /.box -->
              </div>
              <div class="chart tab-pane" id="rekayasa" style="position: relative; height: 300px;">
              	<div class="box-body">
	              <table id="example1" class="table table-bordered table-striped text-center">
	                <thead>
	                <tr>
	                  <th >No</th>
	                  <th>Tipe Soal</th>
	                  <th>Aksi</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php for($r = 1; $r <=4; $r++){
	                	$tipe = array("A", "B", "C", "D");
	                	echo '
	                <tr>
	                  <td>'. $r . '</td>
	                  <td>'. $tipe[$r-1] . '</td>
	                  	<td style="white-space: nowrap;"> 
	                    <button type="submit" name="'. $tipe[$r-1] .'" id="2" class="btn btn-info" data-toggle="modal" data-target="#modal'.$r.'"><i class="fa fa-eye"></i></button>

	                    <button type="submit" name="edit" id="search-btn" class="btn btn-success" data-toggle="modal" data-target="#modal-ubah'.$r.'"><i class="fa fa-edit"></i></button>
	                    
	                    <button type="submit" name="hapus" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete'.$r.'"><i class="ion-ios-trash"></i></button>

	                  </td>
	                </tr>'?>
	                <?php } ?>
	                </tbody>
	              </table>
	          	</div>
	          <!-- /.box -->
              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

    </div>
<?php for($n = 1; $n <=4; $n++){ ?>
<?php $i=1;	?>
<div class="modal fade" id="modal-lihat{{ $n }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Kunci Jawaban Tata Niaga</h4>
          </div>
            <div class="modal-body overflow-hidden">
              <div class="row">
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <h3><b>TIPE {{ $tipe[$n-1] }}</b></h3>
                    <?php
               				$plh=$tipe[$n-1];
                    	
                    	$kuncii = Kunci::select('kunci_jwbn')
		    		->where('tipe_soal', $plh)
		    		->where('id_bidang', '2')
					->get();

					?>
					@foreach($kuncii as $kunciis)
						<?php  $kjwbn = str_split($kunciis->kunci_jwbn); ?>
                    @endforeach
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                
                  @for($a=1;$a<=4;$a++)
                  <div class="col-xs-3">
                    <table>
  					@while($i>0)
  						<?php
  							if(count($kuncii) == 0)
							{
								$kjwbn[$i-1] = "";
							}
  						?>
                    	<tr>
                    		<td style="padding:10px">{{ $i }}</td>
                    		<td style="padding:10px">{{ $kjwbn[$i-1] }}</td>
                    	</tr>
                  
                    	<?php if($i++%(25*$a)==0) break; ?>
                    
                    @endwhile
                    </table>
                  </div>
                  @endfor
                  
                </div>
              </div>
            
            </div>
      </div>
  </div>
</div>
<?php } ?>

<?php for($n = 1; $n <=4; $n++){ ?>
<div class="modal fade" id="modal-edit{{ $n }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Kunci Jawaban</h4>
          </div>
            <div class="modal-body overflow-hidden">
            <?php 
	                 	$plh=$tipe[$n-1];
                    	
                    	$kuncii = Kunci::select('id_kuncijwbn','kunci_jwbn')
			    		->where('tipe_soal', $plh)
			    		->where('id_bidang', '2')
						->get();
	                 	$z = 1; ?>

	                 	@foreach($kuncii as $kunciis)
						<?php  $kjwbn = str_split($kunciis->kunci_jwbn); ?>
                    	
                <form method="POST" action="/kelolakj/{{ $kunciis->id_kuncijwbn }}">
                @endforeach
	                <!-- <input type="text" class="form-control" name="judul" placeholder="Judul" width="50%"><br> -->
	                <div class="row">
	                 

	                 	<?php
	                 	for($i = 0; $i <= 3; $i++) {
	                 			echo
					            '<div class="col-md-3">
	                 		<div class="form-group">
	                 		<table>
					            <thead>
					            		<tr>
					            			<th></th>' ?>
					            			<?php echo '<th>'?> A <?php echo '</th>'?>
					            			<?php echo '<th>'?> B <?php echo '</th>'?>
					            			<?php echo '<th>'?> C <?php echo '</th>'?>
					            			<?php echo '<th>'?> D <?php echo '</th>'?>
					            			<?php echo '<th>'?> E <?php echo '</th>'?>
					            		<?php echo '</tr>
					            	</thead>
					            	<tbody>';
					            	
					            	?>
					            	@while($z>0)

					            	<?php 
					            		if(count($kuncii) == 0)
							{
								$kjwbn[$z-1] = "";
							}
					            		echo '<tr>'?>
					            			<?php echo '<td style="padding:3px">' . $z . '</td>'?>
					            			<?php echo '<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="A"'?> {{ ($kjwbn[$z-1] == 'A') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="B"'?> {{ ($kjwbn[$z-1] == 'B') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="C"'?> {{ ($kjwbn[$z-1] == 'C') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="D"'?> {{ ($kjwbn[$z-1] == 'D') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="E"'?> {{ ($kjwbn[$z-1] == 'E') ? 'checked' : '' }} <?php echo '></td>
					            		</tr>' ?>
					            		
					            		<?php if($z++%(25*($i+1))==0) break; ?>
					            		@endwhile
					            	<?php echo'</tbody>
					            </table>
			            	
			            	</div>
	                 	</div>' ?>
	                 	<?php } ?>
	                </div>
	                 

	                <div class="box-footer">
	                  <!-- <button type="submit" class="btn btn-info pull-right">Submit</button> -->
	                  <input type="submit" name="edit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="Ubah">
	                  {{ csrf_field() }}
	                  <input type="hidden" name="_method"  value="put">
	                </div>
	             </form>
	             
            </div>
      </div>
  </div>
</div>
<?php } ?>

<?php for($n = 1; $n <=4; $n++){ ?>
<div class="modal fade" id="modal-hapus{{$n}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus </h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
				<!-- <button type="button" class="btn btn-primary">Ya</button> -->
				<?php 
	                 	$plh=$tipe[$n-1];
                    	
                    	$kuncii = Kunci::select('id_kuncijwbn','kunci_jwbn')
			    		->where('tipe_soal', $plh)
			    		->where('id_bidang', '2')
						->get();
	                 	$z = 1; ?>

	                 	@foreach($kuncii as $kunciis)
						<?php  $kjwbn = str_split($kunciis->kunci_jwbn); ?>
                    	
                <form method="POST" action="/kelolakj/{{ $kunciis->id_kuncijwbn }}">
                @endforeach
					<input type="submit" name="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="hapus">
					{{ csrf_field() }}
					<input type="hidden" name="_method"  value="delete">
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php } ?>

<?php for($r = 1; $r <=4; $r++){ ?>
<?php $i=1;	?>
<div class="modal fade" id="modal{{ $r }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Kunci Jawaban Rekayasa</h4>
          </div>
            <div class="modal-body overflow-hidden">
              <div class="row">
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <h3><b>TIPE {{ $tipe[$r-1] }}</b></h3>
                    <?php
               				$plh=$tipe[$r-1];
                    	
                    	$kuncii = Kunci::select('kunci_jwbn')
		    		->where('tipe_soal', $plh)
		    		->where('id_bidang', '1')
					->get();
					
					?>					
					@foreach($kuncii as $kunciis)
						<?php  $kjwbn = str_split($kunciis->kunci_jwbn); ?>
                    @endforeach
                    
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                
                  @for($a=1;$a<=4;$a++)
                  <div class="col-xs-3">
                    <table>
               		
                   
  					@while($i>0)
  						<?php
  							if(count($kuncii) == 0)
							{
								$kjwbn[$i-1] = "";
							}
  						?>
                    	<tr>
                    		<td style="padding:10px">{{ $i }}</td>
                    		<td style="padding:10px">{{ $kjwbn[$i-1] }}</td>
                    	</tr>
                  
                    	<?php if($i++%(25*$a)==0) break; ?>
                    
                    @endwhile
                    </table>
                  </div>
                  @endfor
                  
                </div>
              </div>
            
            </div>
      </div>
  </div>
</div>
<?php } ?>

<?php for($r = 1; $r <=4; $r++){ ?>
<div class="modal fade" id="modal-ubah{{ $r }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Kunci Jawaban</h4>
          </div>
            <div class="modal-body overflow-hidden">
                <?php 
	                 	$plh=$tipe[$r-1];
                    	
                    	$kuncii = Kunci::select('id_kuncijwbn','kunci_jwbn')
			    		->where('tipe_soal', $plh)
			    		->where('id_bidang', '1')
						->get();
	                 	$z = 1; ?>

	                 	@foreach($kuncii as $kunciis)
						<?php  $kjwbn = str_split($kunciis->kunci_jwbn); ?>
                <form method="POST" action="/kelolakj/{{ $kunciis->id_kuncijwbn }}">
                @endforeach
	                <div class="row">

	                 	<?php
	                 	for($i = 0; $i <= 3; $i++) {
	                 			echo
					            '<div class="col-md-3">
	                 		<div class="form-group">
	                 		<table>
					            <thead>
					            		<tr>
					            			<th></th>' ?>
					            			<?php echo '<th>'?> A <?php echo '</th>'?>
					            			<?php echo '<th>'?> B <?php echo '</th>'?>
					            			<?php echo '<th>'?> C <?php echo '</th>'?>
					            			<?php echo '<th>'?> D <?php echo '</th>'?>
					            			<?php echo '<th>'?> E <?php echo '</th>'?>
					            		<?php echo '</tr>
					            	</thead>
					            	<tbody>';
					            	
					            	?>
					            	@while($z>0)

					            	<?php 
					            		if(count($kuncii) == 0)
							{
								$kjwbn[$z-1] = "";
							}
					            		echo '<tr>'?>
					            			<?php echo '<td style="padding:3px">' . $z . '</td>'?>
					            			<?php echo '<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="A"'?> {{ ($kjwbn[$z-1] == 'A') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="B"'?> {{ ($kjwbn[$z-1] == 'B') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="C"'?> {{ ($kjwbn[$z-1] == 'C') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="D"'?> {{ ($kjwbn[$z-1] == 'D') ? 'checked' : '' }} <?php echo '></td>
					            			<td style="padding:3px"><input type="radio" name="' . $z . '" id="optionsRadios1" value="E"'?> {{ ($kjwbn[$z-1] == 'E') ? 'checked' : '' }} <?php echo '></td>
					            		</tr>' ?>
					            		
					            		<?php if($z++%(25*($i+1))==0) break; ?>
					            		@endwhile
					            	<?php echo'</tbody>
					            </table>
			            	
			            	</div>
	                 	</div>' ?>
	                 	<?php } ?>
	                </div>
	                 

	                <div class="box-footer">
	                  <input type="submit" name="edit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="Ubah">
	                  {{ csrf_field() }}
	                  <input type="hidden" name="_method"  value="put">
	                </div>
	             </form>
            </div>
      </div>
  </div>
</div>
<?php } ?>

<?php for($r = 1; $r <=4; $r++){ ?>
<div class="modal fade" id="modal-delete{{$r}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus </h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
				<!-- <button type="button" class="btn btn-primary">Ya</button> -->
				<?php 
	                 	$plh=$tipe[$r-1];
                    	
                    	$kuncii = Kunci::select('id_kuncijwbn','kunci_jwbn')
			    		->where('tipe_soal', $plh)
			    		->where('id_bidang', '1')
						->get();
	                 	$z = 1; ?>

	                 	@foreach($kuncii as $kunciis)
						<?php  $kjwbn = str_split($kunciis->kunci_jwbn); ?>
                    	
                <form method="POST" action="/kelolakj/{{ $kunciis->id_kuncijwbn }}">
                @endforeach
					<input type="submit" name="submit" class="btn btn-fill pull-right" style="background-color: #dfe6e9" value="hapus">
					{{ csrf_field() }}
					<input type="hidden" name="_method"  value="delete">
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php } ?>


</section>


@endsection