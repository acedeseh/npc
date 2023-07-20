@include('templates.header')  @include('templates.sidebar')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Halaman Edit Kegiatan Rutin</h1>
            </div>
          </div>
        </div>
      </section>

<section  class="content">
        <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">edit Kegiatan Rutin </h3></div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('update.routine', ['name' => $routine->name]) }}" method="post">
                                @csrf
                                <!-- Ubah metode menjadi POST -->
                                @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Kegiatan</label>
                                    <input type="text" value="{{ $routine->name }}" name="name" class="form-control" placeholder="Masukan Nama Kegiatan Rutin" required>
                                </div>

                                <div class="form-group">
                                    <label for="period">Periode</label>
                                    <select name="period" class="form-control" required>
                                        <option value="Daily" {{ $routine->period === 'Daily' ? 'selected' : '' }}>Daily</option>
                                        <option value="Weekly" {{ $routine->period === 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                        <option value="Monthly" {{ $routine->period === 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="Yearly" {{ $routine->period === 'Yearly' ? 'selected' : '' }}>Yearly</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="processtime">Proccess Time</label>
                                    <input type="number" value="{{ $routine->processtime }}" name="processtime" class="form-control" placeholder="Masukan Lama Proses Kegiatan dalam jam/Kegiatan " required>
                                </div>

                                <div class="form-group">
                                    <label for="frequency">Frequency</label>
                                    <input type="number" value="{{ $routine->frequency }}" name="frequency" class="form-control" placeholder="Masukan Frequenct Kegiatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="quantity_plan">Quantity Plan</label>
                                    <input type="number" value="{{ $routine->quantity_plan }}" name="quantity_plan" class="form-control" placeholder="Disesuaikan dengan Target Tahunan" required>
                                </div>

                                <div class="form-group">
                                    <label for="quantity_actual">Quantity Actual</label>
                                    <input type="number" value="{{ $routine->quantity_actual}}" name="quantity_actual" class="form-control" placeholder="Disesuaikan dengan yang sudah berjalan" required>
                                </div>

                                <div class="form-group">
                                    <label for="type">Tipe</label>
                                    <select name="type" class="form-control" required>
                                        <option value="Event" {{ $routine->type === 'Event' ? 'selected' : '' }} >Event</option>
                                        <option value="Meeting" {{ $routine->type === 'Meeting' ? 'selected' : '' }}>Meeting</option>
                                        <option value="Report" {{ $routine->type === 'Report' ? 'selected' : '' }}>Report</option>
                                        <option value="Lainnya" {{ $routine->type === 'Lainnya' ? 'selected' : '' }}>Lainnya--</option>
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