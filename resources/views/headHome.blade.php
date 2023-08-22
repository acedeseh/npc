@include('templates.header')
@include('templates.sidebarHead')
@section('content')
<!DOCTYPE html>
<html>
<head>
  <!-- Beberapa elemen <meta>, <link>, dan lainnya mungkin ada di sini -->
</head>
<body>
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
        <!-- Default box -->
        <div class="card-body">
          <table class="sortable table table-bordered display" id="Table_Head">
            <thead>
              <tr>
                <th class="sortable" data-sort="nrp">NRP <i class="fas fa-sort"></i></th>
                <th class="sortable" data-sort="name">Nama Karyawan <i class="fas fa-sort"></i></th>
                <th class="sortable" data-sort="total">Total Productivity <i class="fas fa-sort"></i></th>
                <th>Status</th>
                <th style="width: 150px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($karyawanData as $karyawan)
                @php
                  // Ambil nilai total presentase dari array berdasarkan NRP karyawan
                  $presentase = floatval(str_replace('%', '', $karyawanPersentase[$karyawan->NRP]));
                  $status = '';

                  // Tentukan status berdasarkan total presentase
                  if ($presentase > 115) {
                    $status = 'OVER PRODUCTIVE';
                    $statusClass = 'bg-warning';
                  } elseif ($presentase > 100) {
                    $status = 'PRODUCTIVE';
                    $statusClass = 'bg-success';
                  } else {
                    $status = 'LESS PRODUCTIVE';
                    $statusClass = 'bg-danger';
                  }
                @endphp
                <tr class="{{ $statusClass }}">
                  <td class="sortable" data-sort="nrp" >{{ $karyawan->NRP }}</td>
                  <td class="sortable" data-sort="name" >{{ $karyawan->name }}</td>
                  <td class="sortable" data-sort="total" >{{ $karyawanPersentase[$karyawan->NRP] }}</td>
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
        <img src="https://media.licdn.com/dms/image/C561BAQFwQbb9f-GLxw/company-background_10000/0/1597394072182?e=1692957600&v=beta&t=Xvnng3HX1poTj4i9uAXSpFJaf-gcZSSQdDvV0MsbFuA" alt="">
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

<!-- Skrip JavaScript untuk penyortiran -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  var lastSortBy = ""; // Menyimpan kolom terakhir yang diurutkan
  var ascending = true; // Menyimpan status urutan ascending/descending

  $(".sortable").click(function() {
        const sortBy = $(this).data("sort");
    if (lastSortBy === sortBy) {
      ascending = !ascending; // Balik urutan jika kolom sama dengan yang terakhir diurutkan
    } else {
      ascending = true; // Set urutan ke ascending jika kolom berbeda dengan yang terakhir diurutkan
    }
    sortTable(sortBy);
    lastSortBy = sortBy; // Simpan kolom terakhir yang diurutkan
  });

  function sortTable(sortBy) {
    const table = $("#Table_Head");
    const rows = table.find("tbody tr").get();

    rows.sort(function(a, b) {
      const aValue = $(a).find(`td[data-sort='${sortBy}']`).text();
      const bValue = $(b).find(`td[data-sort='${sortBy}']`).text();

      let compareResult = 0;
      if (sortBy === 'name') {
        compareResult = aValue.localeCompare(bValue);
      } else if (sortBy === 'total') {
        const aValueNumeric = parseFloat(aValue.replace(',', '').replace(' ', '')); // Remove commas from numeric value
        const bValueNumeric = parseFloat(bValue.replace(',', '').replace(' ', '')); // Remove commas from numeric value
        compareResult = bValueNumeric - aValueNumeric;
        // ...
      } else if (sortBy === 'nrp') {
        const aValueNumeric = parseInt(aValue); // Parse as integer
        const bValueNumeric = parseInt(bValue); // Parse as integer
        compareResult = bValueNumeric - aValueNumeric;

      } else {
        compareResult = aValue.localeCompare(bValue);
      }

      return ascending ? compareResult : -compareResult; // Balik urutan jika descending
    });

    table.find("tbody").empty().append(rows);
  }
});
</script>

<!-- Gaya CSS untuk penyortiran -->
<style>
.sortable {
  cursor: pointer;
}
</style>

</body>
</html>

@extends('templates.footer')
