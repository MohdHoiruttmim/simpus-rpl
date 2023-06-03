@extends('layouts.user_type.auth')

@section('content')

<div class="card-group row">
  <div class="col-md-4 mb-4">
    <div class="card mx-3 pt-3">
      <img src="../assets/img/medical-report.png" alt="" class="avatar p-2 mx-auto shadow my-2 border border-success">
      <div class="card-body pt-2">
        <a href="javascript:;" class="card-title h5 d-block text-darker text-center">
          Periksa
        </a>
        <p class="card-description mb-4 text-center">
          Periksa bebas antri dan dapatkan hasilnya segera!
        </p>
        <a href="{{ route('tables-register') }}" class="btn btn-icon btn-3 btn-success w-100" type="button">
          <span class="btn-inner--text">Daftar</span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-4">
    <div class="card mx-3 pt-3">
      <img src="../assets/img/doctor.png" alt="" class="avatar p-2 mx-auto shadow my-2 border border-danger">
      <div class="card-body pt-2">
        <a href="javascript:;" class="card-title h5 d-block text-darker text-center">
          Konsultasi
        </a>
        <p class="card-description mb-4 text-center">
          Jadwalkan konsultasi dengan dokter sesuai dengan jadwal anda!
        </p>
        <button class="btn btn-icon btn-3 btn-success w-100" type="button">
          <span class="btn-inner--text">Daftar</span>
        </button>
      </div>
    </div>
  </div>

</div>

@endsection