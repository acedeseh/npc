@include('templates.header')  @include('templates.sidebar')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Halaman Tambahkan Kegiatan Project</h1>
            </div>
          </div>
        </div>
      </section>

<section  class="content">
        <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Kegiatan Project </h3></div>
                            <!-- /.card-header -->
                            <!-- form start -->
                        <form method="POST" action="{{ route('store.project') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Kegiatan</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukan Nama Kegiatan Rutin" required>
                                </div>

                                <div class="form-group">
                                    <label for="period">Periode</label>
                                    <select name="period" class="form-control" required>
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="processtime">Proccess Time</label>
                                    <input type="number" name="processtime" class="form-control" placeholder="Masukan Lama Proses Kegiatan dalam jam/Kegiatan " required>
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