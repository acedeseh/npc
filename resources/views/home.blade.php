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
                <a href="kelas/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
        Standardization Productivity ini memililki ciri khas untuk mengukur secara generalist.   
        Alat ukur ini dapat mengukur lebih akurat dengan mempertimbangkan pekerjaan-perkerjaan yang bersifat incidental, 
        yaitu pekerjaan yang diluar job desk atau perkerjaan tidak terencanakan sebelumnya.

        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@extends('templates.footer')