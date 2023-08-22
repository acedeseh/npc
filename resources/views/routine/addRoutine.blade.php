@include('templates.header')  @include('templates.sidebar')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Halaman Tambahkan Kegiatan Rutin</h1>
            </div>
          </div>
        </div>
      </section>

<section  class="content">
        <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Kegiatan Rutin </h3></div>
                            <!-- /.card-header -->
                            <!-- form start -->
                        <form method="POST" action="{{ route('store.routine') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Kegiatan</label>
                                    <select name="name" class="form-control" required>
                                        <option value="">Pilih Nama Kegiatan</option>
                                        @foreach(\App\Models\Routineadd::pluck('name', 'id') as $id => $name)
                                            <option value="{{ $name }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
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

                                <div class="form-group">
                                    <label for="frequency">Frequency</label>
                                    <input type="number" name="frequency" class="form-control" placeholder="Masukan Frequenct Kegiatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="quantity_plan">Quantity Plan</label>
                                    <input type="number" name="quantity_plan" class="form-control" placeholder="Disesuaikan dengan Target Tahunan" required>
                                </div>

                                <div class="form-group">
                                    <label for="quantity_actual">Quantity Actual</label>
                                    <input type="number" name="quantity_actual" class="form-control" placeholder="Disesuaikan dengan yang sudah berjalan" required>
                                </div>

                                <div class="form-group">
                                    <label for="type">Tipe</label>
                                    <select name="type" class="form-control" required>
                                        <option value="Event">Event</option>
                                        <option value="Meeting">Meeting</option>
                                        <option value="Report">Report</option>
                                        <option value="Lainnya">Lainnya--</option>
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
@include('templates.footer')