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
            <h1>Halaman Detail Kegiatan {{ $karyawan->name }}</h1>
            <h2>(NRP: {{ $karyawan->NRP }})</h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        </div>
        <section class="content">
          <div class="row">
            <div class="col-sm-12">
            </div>
          </div>
          <!-- Default box -->
            <div class="card-body">
              <H2>Kegiatan Rutin</H2>
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
                  <tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($routineKegiatan as $routines)
                    <td>{{ $routines->name }}</td>
                    <td>{{ $routines->period }}</td>
                    <td>{{ $routines->processtime }}</td>
                    <td>{{ $routines->frequency }}</td>
                    <td>{{ $routines->quantity_plan }}</td>
                    <td>{{ $routines->quantity_actual }}</td>
                    <td>{{ $routines->type }}</td>
                    <td>{{ number_format(($routines->processtime * $routines->quantity_actual) / ($routines->processtime * $routines->quantity_plan) * 100, 2) }} </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
      </div>

      <div class="card">
        <div class="card-header">
        </div>
        <section class="content">
          <div class="row">
            <div class="col-sm-12">
            </div>
          </div>
          <!-- Default box -->
            <div class="card-body">
              <H2>Kegiatan Project</H2>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Kegiatan</th>
                    <th>Periode</th>
                    <th>Proses Time</th>
                    <th>Total Persentase</th>
                  <tr>
                </thead>
                <tbody>
                    @foreach ($projectKegiatan as $projects)
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
                        @endforeach
                  </tr>
              </tbody>
              </table>
            </div>
      </div>

      <div class="card">
        <div class="card-header">
        </div>
        <section class="content">
          <div class="row">
            <div class="col-sm-12">
            </div>
          </div>
          <!-- Default box -->
            <div class="card-body">
              <H2>Kegiatan Incidental</H2>
              <table class="table table-bordered">
                <thead>
                  <tr>
                        <th>Nama Kegiatan</th>
                        <th>Periode</th>
                        <th>Proses Time</th>
                        <th>Total Persentase</th>
                  <tr>
                </thead>
                <tbody>
                    @foreach ($incidentalKegiatan as $incidentals)
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