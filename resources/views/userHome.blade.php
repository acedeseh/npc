@include('templates.header')  
@include('templates.sidebar')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Utama</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p>Total Kegiatan Routine</p>
                </div>
                <div class="icon">
                  <i class="fas fa-university"></i>
                </div>
                <a href="{{ route('show.routine') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                   <p>Total Project</p>
                </div>
                <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="dosen/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <p>Total Kegiatan Incidental</p>
                </div>
                <div class="icon">
                  <i class="fas fa-calendar"></i>
                </div>
                <a href="jadwal/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
             </div>
             <div class="col-lg-3 col-6">
              <!-- small box -->
            <!-- ./col -->
          </div>
        </div>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">WELCOME !</h3>
        </div>
        <div class="card-body">
          Selamat datang di halaman Productivity Calculator!
        </div>

        <div class="card-body">
       <p class=""> Aplikasi Project and Productivity Monitoring ini memililki ciri khas untuk memantau projek yang sedang dikerjakan serta mengukur produktivitas karyawan.    
        Alat ukur ini dapat mengukur lebih akurat dengan mempertimbangkan pekerjaan-perkerjaan yang bersifat incidental, 
        yaitu pekerjaan yang diluar job desk atau perkerjaan tidak terencanakan sebelumnya.
       </p>
        </div>
      </div>

      <div class="card">
        <img src="https://media.licdn.com/dms/image/C561BAQFwQbb9f-GLxw/company-background_10000/0/1597394072182?e=1689818400&v=beta&t=zfxchH8eAw8cus_2pS_DjFnyEsVjQT1MA1DWLdHbvGA" alt="">
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@extends('templates.footer')