<!DOCTYPE html>
<html>
<head>
    <title>Scan QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h3>Scan QR Code</h3>

<video id="preview" width="100%" class="rounded"></video>

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script>
let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

scanner.addListener('scan', function (content) {
    window.location.href = "/mahasiswa/form-absen?qr=" + encodeURIComponent(content);
});

Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        scanner.start(cameras[0]);
    }
});
</script>

</body>
</html>
