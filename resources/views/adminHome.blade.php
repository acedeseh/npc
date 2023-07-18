@include('templates.header')  
@include('templates.sidebar')
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
        <h3 class="card-title"></h3> <a href="{{ route('add.user') }}" class="btn float-right btn-xs btn btn-primary">Tambah User</a>
      </div>
      <div class="card-body">
      
<div class="row mb-3">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="" name="key" >
  <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
        <a class="btn btn-outline-danger" >Reset</a>
  </div>
</div>

</div>
</div>
  </form>
        <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th style="width: 150px">Action</th>
                  </tr>
                  {{-- @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><button>Edit</button></td>
                  </tr>
                  @endforeach --}}
                </thead>
              </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection
@extends('templates.footer')