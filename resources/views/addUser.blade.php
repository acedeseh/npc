@include('templates.header')  
@include('templates.sidebar')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Karyawan</h3>
                        </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                        <form method="POST" action="{{ route('store.user') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Karyawan</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ex. Daniel" autocomplete="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Karyawan</label>
                                    <input type="text" name="email" class="form-control" placeholder="Ex. daniel_c@npc.id" autocomplete="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="head">Head</option>
                                        <option value="user">User</option>
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
    </div>
</div>
@endsection
@extends('templates.footer')