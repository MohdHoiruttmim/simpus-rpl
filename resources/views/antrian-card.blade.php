@extends('layouts.user_type.auth')

@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h2 class="mb-0">Kartu Antrian</h2>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <h4>No. Antrian <span class="ms-5">PKJ-{{ $antrian->id }}</span></h4>
              </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <h4>Nama<span class="ms-5 text-capitalize">{{ $antrian->nama }}</span></h4>
              </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <h4>Poli<span class="ms-5 text-capitalize">{{ $antrian->poli }}</span></h4>
              </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <h4>Alamat<span class="ms-5">{{ $antrian->alamat }}</span></h4>
              </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <h4>Tanggal<span class="ms-5">{{ $antrian->created_at }}</span></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  window.onload = function () {
    window.print();
  }
  window.onafterprint = function () {
    window.location.href = "{{ route('checkup-register') }}";
  }
</script>

@endsection