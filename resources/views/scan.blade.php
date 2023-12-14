<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js">
  </script>
</head>

<body>
  <h1>Hello, world!</h1>
  <video id="preview"></video>
  <form action="{{ route('scan-post') }}" method="POST">
    @csrf
    <input type="hidden" name="code" id="code-antrian">
  </form>
  <!-- off camera -->
  <button class="btn btn-primary" id="close">Close Camera</button>
  <!-- on camera -->
  <button class="btn btn-primary" id="open">Open Camera</button>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    const close = document.getElementById('close');
    close.addEventListener('click', () => {
      scanner.stop();
    });
    const open = document.getElementById('open');
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
    // scanner.addListener('scan', function (content) {
    //   alert('Escaneado: ' + content);
    // });

    scanner.addListener('scan', function (content) {
      document.getElementById('code-antrian').value = content;
      document.getElementById('code-antrian').parentElement.submit();
    });

    // Instascan.Camera.getCameras().then(function (cameras) {
    //   if (cameras.length > 0) {
    //     console.log(cameras)
    //     scanner.start(cameras[0]);
    //   } else {
    //     console.error('No hay camaras disponibles.');
    //   }
    // }).catch(function (e) {
    //   console.error(e);
    // });
  </script>
</body>

</html>