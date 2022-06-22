@extends('layout.main')
@section('isi')
    <div class="container">
        <div class="sama">
            <div class="kunci col-md-5">

            </div>
            <div class="formlog col-md-5">
                <h2 class=" text-center">Login Here</h2>
                <form class="mt-4" action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Login</button>
                    <p class="text-center mt-3">Belum punya Account? <a href="/register">Register Now</a></p>
                </form>
            </div>
        </div>
    </div>

@endsection
