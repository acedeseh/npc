@include('templates.header')  @include('templates.sidebarAdmin')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Halaman Admin User</h1>
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
              <h3>{{ $jumlahKaryawan }}</h3>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="kelas/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
               <p>Total Head Divison</p>
               <h3>{{ $jumlahHead }}</h3>
            </div>
            <div class="icon">
            <i class="fas fa-user"></i>
            </div>
            <a href="dosen/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Default box -->

    <div class="card">
      <div class="card-header">
        <h3  class="card-title"></h3> <a href= "{{ route('add.user') }}" class="btn float-right btn-xs btn btn-primary">Tambah User</a>
      </div>
      <div class="card-body">

        <form method="GET" action="{{ route('search.user') }}">
          <div class="row mb-3">
            <div class="col-lg-6">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="" name="key" value="{{ request('key') }}">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                  <button class="btn btn-outline-danger" type="submit" formaction="{{ route('reset.user') }}">Reset</button>
                </div>
              </div>
            </div>
          </div>
        </form>

        @if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
</div>
@endif

        <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    
                    <th style="width: 150px">Action</th>
                  </tr>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{$user->NRP}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role }}</td>
                    <td>
                      <a href="{{ route('edit.user', $user->id) }}" class="btn float-right btn-s btn btn-warning">Edit</a>

                      <form method="POST" action="{{ route('delete.user', $user->id) }}" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn float-left btn-s btn btn-danger">Delete</button>
                      </form>
                  </tr>
                  @endforeach
                </thead>
              </table>
      </div>
      <div class="card">
        <img src="https://media.licdn.com/dms/image/C561BAQFwQbb9f-GLxw/company-background_10000/0/1597394072182?e=1689818400&v=beta&t=zfxchH8eAw8cus_2pS_DjFnyEsVjQT1MA1DWLdHbvGA" alt="">
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection
@extends('templates.footer')