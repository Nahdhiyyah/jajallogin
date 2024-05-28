<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Baca Buku</title>
    <style>
        iframe {
            display: block;
            width: 100%;
            height: 90vh;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Selamat Membaca') }} <b>{{ $pinjam->judul_buku }}</b>
            </h2>
        </x-slot>
        <div class="well text-center">
            <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" src="/eBook/{{ $pinjam->buku }}#toolbar=0" allowfullscreen
                    frameborder="0"></iframe>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
