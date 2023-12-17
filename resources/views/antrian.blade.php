@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="col-md-6">
          <form action="?search" method="GET">
            <div class="form-group d-flex align-items-center">
              <div class="input-group mb-2">
                <input class="form-control" placeholder="Search ..." type="text" name="search"
                  value="{{ (isset($_GET['search']))? $_GET['search'] : '' }}">
              </div>
              <button type="submit" class="btn ms-2">Cari</button>
            </div>
          </form>
        </div>
        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between">
            <h3>Antrian</h3>
            <div class="tab-table">
              <a href="?periksa=true" class="btn btn-default mx-2">Periksa</a>
              <a id="open" href="" class="btn btn-default mx-2" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Scan QR</a>
              <!-- <a href="?konsultasi=true" class="btn btn-default mx-2">Konsultasi</a> -->
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Poli</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                    </th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @if (isset($_GET['konsultasi']))
                  @foreach ($konsultasi as $konsul)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/surgeon.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $konsul->nama }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 text-capitalize">{{ $konsul->poli }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">{{ $konsul->status }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $konsul->tanggal_konsul }}</span>
                    </td>
                    <td class="align-middle d-flex justify-content-center">
                      <a href="/chatify/{{ $konsul->user_id }}"
                        class="text-white font-weight-bold text-xs btn btn-sm btn-success" data-toggle="tooltip"
                        data-original-title="Edit user">
                        Hub
                      </a>
                      <form method="POST" action="{{ route('antrian-konsultasi-patch', $konsul->id) }}" class="mx-2">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-sm btn-warning">Acc</button>
                      </form>
                      <a href="{{ route('antrian-konsultasi-delete', $konsul->id) }}"
                        class="btn btn-sm btn-danger">Del</a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  @foreach ($antrians as $antrian)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/user.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $antrian->nama }}</h6>
                          <p class="text-xs text-secondary mb-0">0{{ $antrian->no_telp }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 text-capitalize">{{ $antrian->poli }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">{{ $antrian->status }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $antrian->created_at }}</span>
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('antrian-detail', $antrian->id) }}"
                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                        data-original-title="Edit user">
                        Edit
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <video id="preview" class="img-thumbnail"></video>
        <form action="{{ route('antrian-store') }}" method="POST">
          @csrf
          <input type="hidden" name="id_user" id="id_user">
          <input type="hidden" name="poli" id="poli">
          <input type="hidden" name="antrian" id="antrian">
        </form>
      </div>
      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{ asset('js/instascan.min.js') }}"></script>
<script type="text/javascript">
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  const open = document.getElementById('open');
  const close = document.getElementById('close');

  close.addEventListener('click', () => {
    scanner.stop();
  });

  open.addEventListener('click', () => {
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        console.log(cameras)
        scanner.start(cameras[1]);
      } else {
        console.error('No hay camaras disponibles.');
      }
    }).catch(function (e) {
      console.error(e);
    });
  });

  scanner.addListener('scan', function (content) {
    // Membagi string menjadi pasangan kunci-nilai
    const keyValuePairs = content.split(', ');
    // Membuat objek JavaScript dari pasangan kunci-nilai
    const dataObject = keyValuePairs.reduce((obj, pair) => {
      // Memisahkan setiap pasangan kunci dan nilai berdasarkan titik dua
      const [key, value] = pair.split(':');
      // Menetapkan pasangan kunci-nilai ke objek
      obj[key] = value;

      return obj;
    }, {});

    const id_user = document.getElementById('id_user');
    const poli = document.getElementById('poli');
    const antrian = document.getElementById('antrian');

    id_user.value = dataObject['id'];
    poli.value = dataObject['poli'];
    antrian.value = dataObject['antrian'];

    antrian.parentElement.submit();
    // Tampilkan objek hasil
    console.log(dataObject);
  });
</script>

@endsection