@extends('layouts.user_type.auth')

@section('content')

<div class="col-md-7 mt-4">
  <div class="card">
    <div class="card-header pb-0 px-3">
      <h4 class="mb-0">Riwayat Checkup</h4>
    </div>
    <div class="card-body pt-4 p-3">
      <ul class="list-group">
        @foreach ($riwayat as $r)
        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
          <div class="d-flex flex-column">
            <h6 class="mb-3 text-sm">Oliver Liam</h6>
            <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">{{ $r->nama
                }}</span></span>
            <span class="mb-2 text-xs">Tanggal: <span class="text-dark ms-sm-2 font-weight-bold"> {{ $r->created_at
                }}</span></span>
            <span class="text-xs">Diagnosa: <span class="text-dark ms-sm-2 font-weight-bold">{{ $r->checkup->diagnosa
                }}</span></span>
          </div>
          <div class="ms-auto text-end">
            <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('checkup-log-show', 1) }}"><i
                class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Detail</a>
            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                class="far fa-trash-alt me-2"></i>Delete</a>
          </div>
        </li>
        @endforeach
      </ul>
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