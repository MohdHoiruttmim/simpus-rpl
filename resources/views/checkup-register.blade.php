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
        <a href="{{ route('antrian-register') }}" class="btn btn-icon btn-3 btn-success w-100" type="button">
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
        <a href="{{ route('antrian-konsultasi') }}" class="btn btn-icon btn-3 btn-success w-100" type="button">
          <span class="btn-inner--text">Daftar</span>
        </a>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card h-100 mx-3">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Riwayat</h6>
          </div>
          <div class="col-6 text-end">
            <button class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal"
              id="print">View All</button>
          </div>
        </div>
      </div>
      <div class="card-body p-3 pb-0">
        <ul class="list-group">
          @foreach($riwayat as $r)
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex flex-column">
              <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ $r->nama }}</h6>
              <span class="text-xs">{{ $r->created_at }}</span>
            </div>
            <div class="d-flex align-items-center text-sm">
              Periksa
              <a href="{{ route('card', $r->id) }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                  class="fas fa-file-pdf text-lg me-1"></i>
                PDF</a>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn bg-gradient-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  /*
  const card = document.querySelector('#print');
  card.addEventListener('click', function () {
    window.location.href = "{{ route('antrian-register') }}";
  })
  */
</script>

@endsection