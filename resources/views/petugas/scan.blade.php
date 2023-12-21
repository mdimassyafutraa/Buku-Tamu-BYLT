<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logokai.png') }}">

    {{-- Css Tailwind --}}
    @vite('resources/css/app.css')



    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Icon  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    {{-- Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>UPT BYLT | Scan</title>

</head>
<style>
    @keyframes scan {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    .animate-scan {
        animation: scan 1.5s linear infinite;
    }
</style>

<body>
    <div class=" p-5 w-full md:pt-2">
        <div class="pt-10">
            @if (session('success'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="w-full">
                <h1 class="font-semibold text-xl text-biru text-center p-4">Scan QR Code</h1>
                <div class="pesan-qr w-full border-2 shadow-lg md:w-1/2 mx-auto p-4 mb-2">
                    <div id="pesan-container" class="text-lg font-semibold text-center"></div>
                </div>
                <div class="w-full md:w-1/2 mx-auto relative">
                    <video id="videoElement" class="w-full " autoplay></video>
                    <div
                        class="qr-box absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 border-4 border-green-500 w-1/2 h-1/2">
                        <div class="animate-scan absolute inset-0 border-t-4 border-white rounded"></div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const videoElement = document.getElementById("videoElement");

        function tampilkanPesan(status, message) {
            const pesanContainer = document.getElementById('pesan-container');
            let pesan = '';

            if (status === 'success') {
                pesan = message || 'QR code berhasil discan.';
                pesanContainer.innerHTML = `<div class="text-green-500">${pesan}</div>`;
            } else if (status === 'failed' && message === 'Qr code sudah di scan') {
                pesan = 'QR code sudah discan.';
                pesanContainer.innerHTML = `<div class="text-yellow-500">${pesan}</div>`;
            } else if (status === 'failed' && message === 'Data tamu tidak ditemukan') {
                pesan = 'QR code tidak valid.';
                pesanContainer.innerHTML = `<div class="text-red-500">${pesan}</div>`;
            } else {
                pesan = message || 'QR code tidak valid.';
                pesanContainer.innerHTML = `<div class="text-red-500">${pesan}</div>`;
            }
        }

        function refreshHalaman() {
            setTimeout(() => {
                location.reload();
            }, 2000);
        }

        navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'environment'
                }
            })
            .then(stream => {
                const videoElement = document.getElementById("videoElement");
                videoElement.srcObject = stream;
                videoElement.play();


                videoElement.addEventListener('canplay', () => {

                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    setInterval(() => {
                        canvas.width = videoElement.videoWidth;
                        canvas.height = videoElement.videoHeight;
                        ctx.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

                        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        const code = jsQR(imageData.data, imageData.width, imageData.height);

                        if (code) {
                            axios.post('/petugas/scan', {
                                    qr_code_value: code.data
                                })
                                .then(response => {
                                    console.log(response.data);
                                    const message = response.data.message;
                                    if (message === 'Status berhasil diperbarui') {
                                        tampilkanPesan('success');
                                        refreshHalaman();
                                    } else if (message === 'Status sudah ada') {
                                        tampilkanPesan('failed',
                                            'QR code sudah discan.');
                                        refreshHalaman();
                                    } else if (message === 'Tamu tidak ditemukan') {
                                        tampilkanPesan('failed',
                                            'QR code tidak valid.');
                                        refreshHalaman();
                                    } else {
                                        tampilkanPesan('failed',
                                            'QR code gagal atau tidak valid.'
                                        );
                                        refreshHalaman();
                                    }
                                })
                                .catch(error => {
                                    console.error(error);
                                    tampilkanPesan(
                                        'failed');
                                });
                        }
                    }, 1000);
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
