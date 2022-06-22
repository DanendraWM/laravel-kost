@extends('layout.main')
@section('isi')
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide  mx-auto my-3" data-ride="carousel">
            <div class="carousel-inner lapis">
                <div class="carousel-item active">
                    <img class="d-block w-100 mx-auto" src="{{ url('image/imag.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 mx-auto" src="{{ url('image/img1.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 mx-auto" src="{{ url('image/img2.jpg') }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row mx-4 mt-3">
            <div class=" col-md-7">
                <div class="ml-3 mt-3 tulis">
                    <h2>Penginapan Terjangkau ?</h2>
                    <h4>Cari Sekarang</h4>
                </div>
                <ul class="navbar-nav ml-auto">
                    <form action="/feed" method="get">
                        <div class="input-group col-md-12 my-3 put">
                            <input type="text" class="form-control" placeholder="Cari barang" name="cari"
                                value="{{ request('cari') }}">
                            <button class="btn btn-secondary" type="submit">cari</button>
                        </div>
                    </form>
                </ul>
            </div>
            <div class="city col-md-4 ml-auto mr-4">

            </div>
        </div>
        {{-- <hr>
        <div class="putih">
            ppppppppppppppppppppppppp
        </div> --}}
    </div>
@endsection
