@extends('layout.main')
@section('isi')
    <div class="container">
        <p class="mt-3 font-weight-bold inap">Kategori Penginapan</p>
        <hr width="80%">
        <div class="row">
            @foreach ($kategori as $ktg)
                <div class="col-sm-4 my-3 kartu">
                    <div class="card" style="width: 100%">
                        <img src="https://source.unsplash.com/500x400?{{ $ktg->slug }}" class="card-img-top"
                            style="height: 220px">
                        <div class="card-body">
                            <h5 class="card-title text-black text-uppercase">{{ $ktg->name }}</h5>
                            <a class="btn btn-secondary w-100 text-white" href="/feed/{{ $ktg->id }}">feed</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-sm-4 my-3">
                <div class="card bg-success" style="width: 100%">
                    <img src="{{ url('image/imag.jpg') }}" class="card-img-top" style="height: 220px">
                    <div class="card-body">
                        <h5 class="card-title text-light">Kontrakan</h5>
                        <a class="btn btn-secondary w-100 text-white" href="/feed">feed</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 my-3">
                <div class="card bg-info" style="width: 100%">
                    <img src="{{ url('image/img2.jpg') }}" class="card-img-top" style="height: 220px">
                    <div class="card-body">
                        <h5 class="card-title text-light">Kostan</h5>
                        <a class="btn btn-secondary w-100 text-white" href="/feed">feed</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
