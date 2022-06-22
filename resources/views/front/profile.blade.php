@extends('layout.main')
@section('isi')
    <div class="container">
        <a href="/" class="btn btn-primary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        <form class="my-3" action="/profile/ubah" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile">
                <div class="form-row pt-3">
                    <div class="form-group col-md-6">
                        <div class="card col-md-9 m-auto card-color">
                            {{-- <form action="/hapus/{{ $user->id }}" method="post">
                                @csrf
                                <button class="aksi btn btn-danger col-md-2 m-auto"
                                    onclick="return confirm('apakah yakin ingin hapus')"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form> --}}
                            {{-- <img src="image/{{ $user->image }}" class="img-fluid rounded-circle w-50 d-block m-auto">
                            <input type="file" class=" form-control my-3 col-7 m-auto"> --}}
                            <img id="output" src="{{ url('image/' . $user->image) }}" alt="your image" />
                            <input type="file" accept="image/*" name="file" onchange="loadFile(event)"
                                class="btn btn-info">
                        </div>
                    </div>
                    <div class="form-group col-md-6 form-user px-3">
                        <div class="form-group mb-3">
                            <h2>Information Account</h2>
                            <hr>
                            <label for="name">Username</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $user->email }}" readonly>
                            @error('email')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                        </div>
                        <hr width="30%">
                        <div class="form-group">
                            <label for="opass">Confirm Password</label>
                            <input type="password" class="form-control @error('opass') is-invalid @enderror" id="opass"
                                name="opass" required>
                            @error('opass')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                            <h2 class="my-3">Change Password</h2>
                            <hr>
                            <label for="npass">New Password</label>
                            <input type="password" class="form-control @error('npass') is-invalid @enderror" id="npass"
                                name="npass">
                            <small id="npass" class="form-text text-muted">Boleh kosong jika tidak ingin ganti
                                password</small>
                            @error('npass')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                            <button type="submit" class="btn btn-primary my-3 col-md-12">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ url('js/openimg.js') }}"></script>
@endsection
