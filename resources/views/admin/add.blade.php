@extends('layout.admin')
@section('isi')
    <div class="container">
        <form class="my-3" method="POST" action="/add" enctype="multipart/form-data">
            @csrf
            <a href="/admin" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <h3 class="mt-3">Tambah Data</h3>
            <hr>
            <div class="form-group">
                <label for="nama">Name Kost</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    placeholder="Hotel roso" name="nama" required value="{{ old('nama') }}">
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
                        placeholder="40000" name="harga" required value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="fasilitas">Facility</label>
                    <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas"
                        placeholder="ac,tv,kamar mandi" name="fasilitas" required value="{{ old('fasilitas') }}">
                    @error('fasilitas')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Address</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    placeholder="1234 Main St" name="alamat" required value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        <p> {{ $message }} </p>
                    </div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="inputState">Category Kost</label>
                    <select id="inputState" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                        required>
                        <option selected disabled>Pilih...</option>
                        @foreach ($kategori as $ktg)
                            <option value="{{ $ktg->id }}">{{ $ktg->name }}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="file">Image</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="file" name="gambar"
                        required value="{{ old('email') }}">
                    @error('gambar')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary col-md-12">Send</button>
        </form>
    </div>
@endsection
