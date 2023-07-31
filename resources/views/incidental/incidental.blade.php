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
            <h1>Halaman Kegiatan Incidental</h1>
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
              <a href="{{ route('show.project') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <p>Total Kegiatan Incidental</p>
                <h3>{{$JumlahKegiatanIncidental}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-calendar"></i>
              </div>
              <a href="{{ route('show.incidental') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
          <h2 class="card-title">Incidental</h2>
        </div>
        <div class="card-body">
            Incidental adalah Bagian mengisi data untuk Kegiatan yang bersifat Incidental yang dilakukan oleh karyawan.
          </div>

        <section class="content">
          <div class="row">
            <div class="col-sm-12">
            </div>
          </div>
          <!-- Default box -->
    
          <div class="card">
            <div class="card-header">
              <div class="btn-group float">
                <div class="card">
                </div>
            <div class="card-body">
            <div class="container-fluid">

              @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
              @endif

              <a href= "{{ route('add.incidental') }}" class="btn float btn-s btn-primary">Tambah Kegiatan</a>

              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Periode</th>
                        <th>Proses Time</th>
                        <th>Total Persentase</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                    @foreach ($incidental as $incidentals)
                    @if ($incidentals->NRP == $logged_in_nrp)
                    <tr>
                        <td>{{ $incidentals->name }}</td>
                        <td>{{ $incidentals->period }}</td>
                        <td>{{ $incidentals->processtime }}</td>
                        <td> 
                          @php
                          $totalPersentase = 0;
                          if ($incidentals->period == 'Weekly') {
                              $totalPersentase = (48 * $incidentals->processtime * 10 / 503);
                          } elseif ($incidentals->period == 'Monthly') {
                              $totalPersentase = (12 * $incidentals->processtime * 10 / 503);
                          } elseif ($incidentals->period == 'Yearly') {
                              $totalPersentase = (1 * $incidentals->processtime * 10 / 503);
                          } elseif ($incidentals->period == 'Daily') {
                              $totalPersentase = (233 * $incidentals->processtime * 10 / 503);
                          }
                          
                          $totalPersentase = number_format($totalPersentase, 2); // Ubah ke format persentase dengan 2 angka desimal
                          echo $totalPersentase . '%';
                          @endphp
                        </td>
                        <td>
                        <a href= "{{ route('edit.incidental', ['name' => $incidentals->name]) }}" class="btn float-left btn-s btn btn-warning">Edit</a>
              
              <!-- Tombol Delete -->
              <form action="{{ route('delete.incidental', ['id' => $incidentals->id]) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn float-right btn-s btn btn-danger">Delete</button>
            </form>
          </td>         
    </tr>
    @endif
    @endforeach
    
    @if ($JumlahKegiatanIncidental > 0)
    @php
    $rataRataTotalPersentase = $totalPersentase / $JumlahKegiatanIncidental;
    @endphp
    <tr>
        <th colspan="3">Total Persentase</th>
        <th colspan="2">
            {{ number_format($rataRataTotalPersentase, 2) . '%' }}
        </th>
    </tr>
    @endif
    </thead>
    <tbody>
    </tr>
    </table>
    </div>
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