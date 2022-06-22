<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">
<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin') }}
            </h2>
        </x-slot>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <a href="{{ route('buku.create') }}" class="btn btn-md btn-primary mb-3" style="border:none; background-color: #2c3e50">TAMBAH BUKU</a>
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">GAMBAR</th>
                                        <th scope="col">JUDUL</th>
                                        <th scope="col">PENULIS</th>
                                        <th scope="col">PENERBIT</th>
                                        <th scope="col">THN_TERBIT</th>
                                        <th scope="col">KATEGORI</th>
                                        <th scope="col">FILE</th>
                                        <th scope="col">DESKRIPSI</th>
                                        <th scope="col" colspan="2">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bukus as $buku)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ Storage::url('public/img/') . $buku->image }}"
                                                    class="rounded" style="width: 150px">
                                            </td>
                                            <td>{{ $buku->judul_buku }}</td>
                                            <td>{{ $buku->penulis }}</td>
                                            <td>{{ $buku->penerbit }}</td>
                                            <td>{{ $buku->thn_terbit }}</td>
                                            <td>{{ $buku->kategori }}</td>
                                            <td>{{ $buku->buku }}</td>
                                            <td>{!! $buku->resensi !!}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin untuk melakukan proses ini?');"
                                                    action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                                    <a href="{{route('buku.edit', $buku->id) }}" class="btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0066cc" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="red" class="bi bi-trash"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Buku belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $bukus->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- <script>
            //message with toastr
            @if (session()->has('success'))

                toastr.success('{{ session('success') }}', 'BERHASIL!');
            @elseif
                (session()->has('error'))

                toastr.error('{{ session('error') }}', 'GAGAL!');
            @endif
        </script> --}}

</body>

</html>
