@include('templates.header')  @include('templates.sidebarAdmin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Halaman Edit User</h1>
            </div>
          </div>
        </div>
      </section>

<section  class="content">
        <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Karyawan</h3></div>
                            <!-- /.card-header -->
                            <!-- form start -->
                        <form method="POST" action="{{ route('update.routineadd', $routineadd->id) }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Kegiatan</label>
                                    <input type="text" name="NRP" class="form-control" value="{{ $routineadd->name }}" placeholder="Masukan Nama Kegiatan" required>
                                </div>
                            </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@extends('templates.footer')