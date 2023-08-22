@include('templates.header')  @include('templates.sidebarAdmin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Halaman Tambahkan Master Kegiatan Rutin</h1>
            </div>
          </div>
        </div>
      </section>

<section  class="content">
        <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Nama Kegiatan</h3></div>
                            <!-- /.card-header -->

                            <!-- form start -->
                        <form method="POST" action="{{ route('store.routineadd') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Kegiatan</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukan Nama Kegiatan">
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
@include('templates.footer')