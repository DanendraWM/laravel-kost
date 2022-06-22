@extends('layout.admin')
@section('isi')
    <div class="container">
        <form class="my-3" method="POST" action="/edit/{{ $inap->id }}" enctype="multipart/form-data">
            @csrf
            <a href="/admin" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <h3 class="mt-3">Edit Data</h3>
            <hr>
            <div class="form-group">
                <label for="nama">Name Kost</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    placeholder="Hotel roso" name="nama" required value="{{ $inap->nama }}">
                @error('nama')
                    <div class="invalid-feedback">
                        <p> {{ $message }} </p>
                    </div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="harga">Price</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        placeholder="40000" name="harga" required value="{{ $inap->harga }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="fasilitas">Facility</label>
                    <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas"
                        placeholder="ac,tv,kamar mandi" name="fasilitas" required value="{{ $inap->fasilitas }}">
                    @error('fasilitas')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="inputState">Category Kost</label>
                    <select id="inputState" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                        required>
                        <option disabled>Pilih...</option>
                        @foreach ($kategori as $ktg)
                            <option value="{{ $ktg->id }}" {{ $ktg->id === $inap->kategori_id ? 'selected' : '' }}>
                                {{ $ktg->name }}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="alamat">Address</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        placeholder="street" name="alamat" required value="{{ $inap->lokasi }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <img src="{{ asset('image/' . $inap->gambar) }}" class="img img-fluid image-edit col-md-6">
                <div class="form-group col-md-6 mb-3">
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror  my-3" id="file"
                        name="gambar" value="{{ asset('image/' . $inap->gambar) }}">
                    @error('gambar')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary col-md-8 m-auto">Send</button>
            </div>
        </form>
    </div>
@endsection
