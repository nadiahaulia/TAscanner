  <!-- daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

       

      <?php
        use App\Tahun;
        use Illuminate\Support\Facades\URL;

        $daftartahun = Tahun::select('tahun')->orderBy('tahun')
        ->get();
        $tahunsekarang = Tahun::select('tahun')->orderBy('tahun', 'desc')->first();
        $ts = $tahunsekarang->tahun;
        $url = url()->current();
        $halaman = strpos(url()->current(), 'kelolaprodi') || strpos(url()->current(), 'kelolakuncijawaban');
      ?>
        @if($halaman == false)
        <div class="form-group" style="padding: 30px 10px 0px 10px; border-radius: 50%;">
          <select class="form-control select2" style="width: 100%;" onchange="pindahtahun(this.options[this.selectedIndex].value);">
            <option>Tahun</option>
            @foreach($daftartahun as $dftrthn)
            <option value="{{ $dftrthn->tahun }}">{{ $dftrthn->tahun }}</option>
            @endforeach
          </select>
        </div>
        @endif
        
         <script type="text/javascript">
          function pindahtahun(pilihan)
          {
            var url = "<?php echo $url ?>";
            var tahuns = "<?php echo $ts ?>";
            var tahun = url.split("/");
            console.log(pilihan == tahuns);
            if(pilihan == tahuns)
            {
                if(!isNaN(tahun[4]))
                {
                     // console.log(tahun[4]);
                     window.location = url.substring(0, url.length-4);
                }
                else if(url == "http://127.0.0.1:8000")
                {
                    window.location = url;
                }
                else
                {
                     window.location = url;
                }
            }
            else if(!isNaN(tahun[4]))
            {
                 // console.log(tahun[4]);
                 window.location = url.substring(0, url.length-4) + pilihan;
            }
            else if(url == "http://127.0.0.1:8000")
            {
                window.location = url + '/grafik/' + pilihan;
            }
            else if(tahun[4] == null || isNaN(tahun[4]))
            {
                // console.log(url.split("/"));
                window.location = url + '/' + pilihan;
            }
            
          }
        </script>
<!-- 
        <div class="form-group">
          <label>Tahun</label>
            <select class="form-control">
              <option>2013</option>
              <option>2014</option>
              <option>2015</option>
              <option>2016</option>
              <option>2017</option>
            </select>
        </div> -->

        <!-- Sidebar Menu -->
        <br>
        <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li ><a href="/" style="font-size: 10pt;"><i class="fa fa-bar-chart-o"></i> Dashboard Grafik</a></li>                
                <li><a href="/dashboardranking" style="font-size: 10pt;"><i class="fa fa-star"></i> Dashboard Perangkingan</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Data</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="/datapeserta" style="font-size: 10pt;"><i class="fa fa-user"></i> Data Peserta</a></li>
                <li><a href="/datahasilscan" style="font-size: 10pt;"><i class="fa fa-calculator"></i> Data Hasil Scan</a></li>
                <li><a href="/datahasil" style="font-size: 10pt;"><i class="fa fa-calculator"></i> Data Hasil Perhitungan</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Form</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="/kelolaprodi" style="font-size: 10pt;"><i class="fa fa-circle-o"></i> Kelola Prodi</a></li>
                <li><a href="kelolakuncijawaban" style="font-size: 10pt;"><i class="fa fa-circle-o"></i> Kelola Kunci Jawaban</a></li>
                <!-- <li><a href="#" style="font-size: 10pt;"><i class="fa fa-circle-o"></i> Kelola Pengawas</a></li> -->
              </ul>
            </li>
           
        </ul><!-- /.sidebar-menu -->
          <style type="text/css">
            .margin {
              position: fixed;
              bottom: 0px;
              left: 0px;
              width: 230px;
            }
          </style>
            <!-- <div class="btn-group pull-right">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Tahun <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">2013</a></li>
                <li><a href="#">2014</a></li>
              </ul>
            </div> -->

            

    </section>
    <!-- /.sidebar -->
</aside>