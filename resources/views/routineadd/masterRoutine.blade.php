@include('templates.header')  @include('templates.sidebarAdmin')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Halaman Master Data Kegiatan Rutin</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <!-- Default box -->

    <div class="card">
      <div class="card-header">
        <h3  class="card-title"></h3> <a href= "{{ route('add.routineadd') }}" class="btn float-right btn-xs btn btn-primary">Tambah Master Data Kegiatan</a>
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
                    <th>Nama Kegiatan</th>
                    <th style="width: 150px">Action</th>
                  </tr>
                  @foreach ($routineadd as $routineadds)
                  <tr>
                    <td>{{$routineadds->name}}</td>
                    <td>
                        <a href="{{ route('edit.routineadd', $routineadds->id) }}" class="btn float-right btn-s btn btn-warning">Edit</a>
  
                        <form method="POST" action="{{ route('delete.routineadd', $routineadds->id) }}" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn float-left btn-s btn btn-danger">Delete</button>
                      </form>
                    </td>
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