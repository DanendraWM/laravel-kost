<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card my-3 px-4">
            @foreach ($sewa as $sw)
                <div class="row my-4 sewa">
                    <div class="card col-md-6 my-3 py-3 px-4">
                        <h2>Detail Booking</h2>
                        <hr>
                        <h4>Nama Penyewa : {{ $sw->user->name }}</h4>
                        <h4>Nama tempat : {{ $sw->inap->nama }}</h4>
                        <h4>Alamat Tempat : {{ $sw->inap->lokasi }}</h4>
                        <hr>
                        <p>Menginap Selama {{ $sw->hari_menginap }} Hari</p>
                        <p>{{ $sw->created_at->format('D, d M Y') }} ~
                            {{ date('D, d M Y', strtotime($sw->checkout)) }}
                        </p>
                        <hr>
                        <h3>Total Harga : Rp. {{ number_format($sw->total, 2, ',', '.') }}</h3>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ public_path('image/' . $sw->inap->gambar) }}" width="350px" height="350px">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
