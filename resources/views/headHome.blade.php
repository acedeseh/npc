@include('templates.header')  
@include('templates.sidebarHead')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Utama (Head)</h1>
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
                  <p>Total Karyawan</p>
                  @php
                  // Hitung jumlah karyawan dengan peran "User"
                  $totalUsers = \App\Models\User::where('role', 'User')->count();
                  @endphp
                  <h3>{{ $totalUsers }}</h3>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
                <a href="/head" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">WELCOME !</h3>
        </div>
        <div class="card-body">
          Selamat datang di halaman New Project Monitoring !

        </div>

        <div class="card-body">
        Standardization Project Monitoring ini memililki ciri khas untuk mengukur secara generalist.   
        Alat ukur ini dapat mengukur lebih akurat dengan mempertimbangkan pekerjaan-perkerjaan yang bersifat Routine, Project, dan Incidental
        yaitu pekerjaan yang diluar job desk atau perkerjaan tidak terencanakan sebelumnya.

        </div>
        <section class="content">
          <div class="row">
            <div class="col-sm-12">
            </div>
          </div>
          <!-- Default box -->
    
          <div class="card">
            <div class="card-header">
              <div class="btn-group float-right">
              <button class="btn float-left btn-s btn btn-warning"> Buat Laporan</button>
              </div>
            </div>
            <div class="card-body">
    
              <form>
                <div class="row mb-3">
                  <div class="col-lg-6">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="" name="key">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                        <a class="btn btn-outline-danger">Reset</a>
                      </div>
                    </div>
    
                  </div>
                </div>
              </form>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">NRP</th>
                    <th>Nama Karyawan</th>
                    <th>Total Productivity</th>
                    <th>status</th>
                    <th style="width: 150px">Action</th>
                  <tr>
                </thead>
                <tbody>
                  @foreach ($karyawanData as $karyawan)
                    @php
                      // Ambil nilai total presentase dari array berdasarkan NRP karyawan
                      $presentase = floatval(str_replace('%', '', $karyawanPersentase[$karyawan->NRP]));
                      $status = '';
    
                      // Tentukan status berdasarkan total presentase
                      if ($presentase > 100) {
                          $status = 'PRODUCTIVE';
                          $statusClass = 'bg-success';
                      } elseif ($presentase > 115) {
                          $status = 'OVER PRODUCTIVE';
                          $statusClass = 'bg-warning';
                      } else {
                          $status = 'LESS PRODUCTIVE';
                          $statusClass = 'bg-danger';
                      }
                    @endphp
                  <tr class="{{ $statusClass }}">
                      <td>{{$karyawan->NRP}}</td>
                      <td>{{ $karyawan->name }}</td>
                      <td>{{ $karyawanPersentase[$karyawan->NRP] }}</td>
                      <td>{{ $status }}</td>
                      <td>
                        <a href="{{ route('detail.kegiatan', ['NRP' => $karyawan->NRP]) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
      </div>
      <!-- /.card -->
      <div class="card">
        <img src="https://media.licdn.com/dms/image/C561BAQFwQbb9f-GLxw/company-background_10000/0/1597394072182?e=1689818400&v=beta&t=zfxchH8eAw8cus_2pS_DjFnyEsVjQT1MA1DWLdHbvGA" alt="">
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@extends('templates.footer')