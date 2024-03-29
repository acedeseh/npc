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
            <h1>Halaman Kegiatan Project</h1>
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
                 <h3>{{$JumlahKegiatanProject}}</h3>
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
          <h2 class="card-title">Project</h2>
        </div>
        <div class="card-body">
            Routine adalah Bagian mengisi data untuk Project yang dilakukan oleh karyawan,
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

              <a href= "{{ route('add.project') }}" class="btn float btn-s btn-primary">Tambah Kegiatan</a>

              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Periode</th>
                        <th>Proses Time</th>
                        <th>Total Persentase</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($project as $projects)
                    @if ($projects->NRP == $logged_in_nrp)
                    <tr>
                        <td>{{ $projects->name }}</td>
                        <td>{{ $projects->period }}</td>
                        <td>{{ $projects->processtime }}</td>
                        <td> 
                          @php
                          $totalPersentase = 0;
                          if ($projects->period == 'Weekly') {
                              $totalPersentase = (48 * $projects->processtime * 10 / 838);
                          } elseif ($projects->period == 'Monthly') {
                              $totalPersentase = (12 * $projects->processtime * 10 / 838);
                          } elseif ($projects->period == 'Yearly') {
                              $totalPersentase = (1 * $projects->processtime * 10 / 838);
                          } elseif ($projects->period == 'Daily') {
                              $totalPersentase = (233 * $projects->processtime * 10 / 838);
                          }
                          
                          $totalPersentase = number_format($totalPersentase, 2);
                          echo $totalPersentase . '%';
                          @endphp
                        </td>
                        <td>
                        <a href= "{{ route('edit.project', ['name' => $projects->name]) }}" class="btn float-left btn-s btn btn-warning">Edit</a>
              
              <!-- Tombol Delete -->
              <form action="{{ route('delete.project', ['id' => $projects->id]) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn float-right btn-s btn btn-danger">Delete</button>
            </form>
          </td>         
         </tr>
         @endif
         @endforeach

         @if ($JumlahKegiatanProject > 0)
            @php
            $rataRataTotalPersentase = $totalPersentase / $JumlahKegiatanProject;
            @endphp
            <tr>
                <th colspan="3">Total Persentase</th>
                <th colspan="2">
                    {{ number_format($rataRataTotalPersentase, 2) . '%' }}
                </th>
            </tr>
        @endif
                </tbody>
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