@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Scan QR code</title>

    <!-- Import the necessary JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
    <div class="p-t-100">
        <div class="text-center">
    <!-- Add a video element that will display the camera stream -->
    <div class="embed-responsive embed-responsive-16by9">
    <video id="qr-video"  class=" embed-responsive-item" ></video>
    </div>

    <!-- Add a button that will trigger the QR code scanning process -->

    <button id="qr-scan" class="btn btn-primary text-center">Scan QR code</button>
    </div>
</div>

    <!-- Add a script that will handle the QR code scanning process -->
    <script>
        $(document).ready(function() {
            // Initialize the Instascan library
            let scanner = new Instascan.Scanner({ video: document.getElementById('qr-video') });

            // Add a listener that will trigger the scanning process when the "Scan QR code" button is clicked
            $('#qr-scan').click(function() {
                scanner.addListener('scan', function(content) {
                    // When a QR code is scanned, send an AJAX request to the server to retrieve its value
                    $.post('{{ route('scan-qr-code') }}', { _token: '{{ csrf_token() }}', qrCodeValue: content }, function(data) {
                        // alert(data.qrCodeValue);
                        // Navigate to another route with the QR code value
                        window.location.href = '/isvalid?qrcode=' + data.qrCodeValue;
                    });

                });

                // Start the camera stream
                Instascan.Camera.getCameras().then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        alert('No cameras found.');
                    }
                }).catch(function(error) {
                    alert(error);
                });
            });
        });
    </script>
</body>
</html>
@endsection
