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
            <h1>Halaman Kegiatan Rutin</h1>
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
                <h3>{{$JumlahKegiatanRoutine}}</h3>
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
          <h2 class="card-title">Routine</h2>
        </div>
        <div class="card-body">
            Routine adalah Bagian mengisi data untuk kegiatan rutin yang dilakukan oleh karyawan, Maksud dari kegiatan Rutin disini adalah kegiatan yang bisa saja berulang setiap Hari, Minggu, Bulan, Ataupun Tahunan
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

              @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
              @endif

              <a href= "{{ route('add.routine') }}" class="btn float btn-s btn-primary">Tambah Kegiatan</a>

              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Periode</th>
                        <th>Proses Time</th>
                        <th>Frequency</th>
                        <th>Quantity Plan</th>
                        <th>Quantity Actual</th>
                        <th>Bentuk</th>
                        <th>Total Persentase</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                    @foreach ($routine as $routines)
                    @if ($routines->NRP == $logged_in_nrp)
                    <tr>
                        <td>{{ $routines->name }}</td>
                        <td>{{ $routines->period }}</td>
                        <td>{{ $routines->processtime }}</td>
                        <td>{{ $routines->frequency }}</td>
                        <td>{{ $routines->quantity_plan }}</td>
                        <td>{{ $routines->quantity_actual }}</td>
                        <td>{{ $routines->type }}</td>
                        <td>{{($routines->processtime * $routines->quantity_actual) / ($routines->processtime * $routines ->quantity_plan) * 100}} </td>
                        <td>
                        <a href= "{{ route('edit.routine', ['name' => $routines->name]) }}" class="btn float-left btn-s btn btn-warning">Edit</a>
              
              <!-- Tombol Delete -->
              <form action="{{ route('delete.routine', ['id' => $routines->id]) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn float-right btn-s btn btn-danger">Delete</button>
            </form>
          </td>         
    </tr>
    @endif
    @endforeach
                </thead>
                <tbody>
                    </tr>
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