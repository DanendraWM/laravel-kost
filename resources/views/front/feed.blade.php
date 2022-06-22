@extends('layout.main')
@section('isi')
    <div class="container">
        <a href="/" class="btn btn-primary mt-2 ml-2"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="row">
            @if ($inap->count())
                @foreach ($inap as $in)
                    <div class="dis">
                        <div class="card my-3 kartu">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ url('image/' . $in->gambar) }}" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $in->nama }}</h5>
                                        <p class=" font-italic small">{{ $in->lokasi }}</p>
                                        <p class="card-text text-right">Rp. {{ number_format($in->harga) }}/per malam</p>
                                        <a href="/detail/{{ $in->slug }}"
                                            class="btn btn-dark col-md-4 float-right">detail</a><br><br>
                                        <p class="card-text text-muted text-center small">
                                            {{ $in->created_at->diffForHumans() }}
                                        </p>
                                        <p class="text-center">{{ $in->kategori->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="nf">
                    <h1 class="text-center">Upss Sorry</h1>
                    <h2>
                        Hasil Tidak Di Temukan
                    </h2>
                </div>
            @endif
        </div>
        {{-- <div class="card my-3" style="width: 100%;">
            <div class="row">
                <div class="col-md-4 my-3">
                    <img src="{{ url('image/img2.jpg') }}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8 my-4">
                    <div class="card-body">
                        <h5 class="card-title">danendra Hotel</h5>
                        <p class=" font-italic small">Jakarta Selatan</p>
                        <p class="card-text text-right">Rp. 400.000/per malam</p>
                        <a href="/detail" class="btn btn-dark col-md-4 float-right">detail</a><br><br>
                        <p class="card-text text-muted text-center small">Last updated 3 mins ago</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="d-flex justify-content-center">
        {{ $inap->links() }}
    </div>
@endsection
