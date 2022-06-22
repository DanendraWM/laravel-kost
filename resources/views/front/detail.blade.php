@extends('layout.main')
@section('isi')
    <div class="container">
        <a href="/feed" class="btn btn-primary mt-2"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="card mt-4 kartu">
            <div class="">
                <div class="imagecard">
                    <img src="{{ url('/image/' . $inap->gambar) }}" class="img-fluid ml-3 mt-3">
                </div>
                <div class="row mt-3 ml-2">
                    <div class="col-md-9">
                        <h4 class="card-title">{{ $inap->nama }}</h4>
                        <p class="card-text">{{ $inap->lokasi }}</p>
                        <p class="text">Fasilitas : {{ $inap->fasilitas }}</p>
                    </div>
                    <div class="col-md-3">
                        <form action="/sewa/{{ $inap->id }}" method="post">
                            @csrf
                            {{-- <p hidden>Harga : Rp. {{ number_format($inap->harga) }}</p> --}}
                            @auth
                                @if (auth()->user()->level == 'admin')
                                    <a href="/admin" class="btn btn-info my-3 col-10">Data Kost</a>
                                @elseif (auth()->user()->level == 'user')
                                    <input name="harga" value={{ $inap->harga }} class="form-control-plaintext" hidden>
                                    <h2>{{ number_format($inap->harga, 0, ',', '.') }}</h2>
                                    <select class="form-select border-0" name="pilih" aria-label="Default select example">
                                        <option value=1>Satu hari</option>
                                        <option value=7>Satu Minggu</option>
                                        <option value=30>Satu Bulan</option>
                                    </select>
                                    <button class="btn btn-success my-3">Sewa</button>
                                @endauth
                            @else
                                <input name="harga" value={{ $inap->harga }} class="form-control-plaintext" hidden>
                                <h2>{{ number_format($inap->harga, 0, ',', '.') }}</h2>
                                <select class="form-select border-0" name="pilih" aria-label="Default select example">
                                    <option value=1>Satu hari</option>
                                    <option value=7>Satu Minggu</option>
                                    <option value=30>Satu Bulan</option>
                                </select>
                                <button class="btn btn-success my-3">Sewa</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <p class="card-text">{{ $inap->kategori->name }}</p>
            </div>
        </div>
    </div>
@endsection
