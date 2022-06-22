@extends('layout.main')
@section('isi')
    <?php
    setlocale(LC_ALL, 'IND');
    ?>
    <div class="container">
        <a href="/" class="btn btn-info my-2 kembali"><i class="bi bi-arrow-left"></i> Kembali</a>
        <a href="/sewa" class="btn btn-warning my-2"><i class="bi bi-arrow-repeat"></i></a>
        @if ($sewa->count())
            <a href="/exportPDF" class="btn btn-primary my-2">Print <i class="bi bi-plus"></i></a>
            <div class="card my-3 px-4">
                @foreach ($sewa as $sw)
                    <div class="row my-4 sewa">
                        <div class="col-md-6">
                            <img src="image/{{ $sw->inap->gambar }}" height="100%" class=" img-fluid">
                        </div>
                        <div class="card col-md-6 my-3 py-3 px-4">
                            <h2>Detail Booking</h2>
                            <hr>
                            <h4>Nama Penyewa : {{ $sw->user->name }}</h4>
                            <h4>Nama tempat : {{ $sw->inap->nama }}</h4>
                            <h4>Alamat Tempat : {{ $sw->inap->lokasi }}</h4>
                            <hr>
                            <p>Menginap Selama {{ $sw->hari_menginap }} Hari</p>
                            <p>{{ $sw->created_at->formatLocalized('%A, %d %B %Y') }} ~
                                {{ strftime('%A, %d %B %Y', strtotime($sw->checkout)) }}
                            </p>
                            <hr>
                            <h3>Total Harga : Rp. {{ number_format($sw->total, 2, ',', '.') }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h1 class="text-center">Belum Booking Kost</h1>
        @endif
    </div>
@endsection
