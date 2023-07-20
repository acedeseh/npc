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
                        <form method="POST" action="{{ route('update.user', $user->id) }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="NRP">NRP</label>
                                    <input type="text" name="NRP" class="form-control" value="{{ $user->NRP }}" placeholder="Masukan NRP Karyawan" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Karyawan</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"placeholder="Ex. Daniel Christian" autocomplete="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Karyawan</label>
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}"placeholder="Ex. daniel.christian@unitedtractors.com" autocomplete="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" value="{{ $user->password }}" placeholder="Disesuaikan dengan Req dari User" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                        <select name="role" class="form-control" required>
                                            <option value="head" {{ $user->role === 'Head' ? 'selected' : '' }}>Head</option>
                                            <option value="user" {{ $user->role === 'User' ? 'selected' : '' }}>User</option>
                                        </select>
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