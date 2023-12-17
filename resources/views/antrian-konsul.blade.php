@extends('layouts.user_type.auth')

@section('content')
<script src="/assets/js/plugins/flatpickr.min.js"></script>
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 card shadow p-4">
        <h3>Form Pendaftaran Konsultasi</h3>
        <form method="POST" action="{{ route('antrian-konsultasi-store') }}">
          @csrf
          <div class="form-group">
            <label for="nama" class="form-control-label">Nama</label>
            <input class="form-control" type="text" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="keluhan" class="form-control-label">keluhan</label>
            <textarea class="form-control" id="keluhan" name="keluhan"></textarea>
          </div>
          <div class="form-group">
            <label for="data">Pilih Tanggal</label>
            <input class="form-control datepicker" placeholder="Please select date" type="text" onfocus="focused(this)"
              onfocusout="defocused(this)" name="tanggal" id="date" required>
          </div>

          <div class="col">
            <button class="btn btn-success" type="submit">Daftar</button>
            <a href="{{ route('checkup-register') }}" class="btn btn-danger ms-2">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<script>
  if (document.querySelector('.datepicker')) {
    flatpickr('.datepicker', {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      time_24hr: true,
      mode: "single",
    });
  }
</script>

@endsection