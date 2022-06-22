@extends('layout.main')
@section('isi')
    <div class="container">
        <div class="sama">
            <div class="kunci col-md-5">

            </div>
            <div class="formlog col-md-5">
                <h2 class=" text-center">Register Here</h2>
                <form class="mt-4" action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUser">Username</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputUser" placeholder="Enter Username">
                        @error('name')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success col-md-12">Register</button>
                    <p class="text-center mt-3">Sudah punya Account? <a href="/login" class=" text-success">Login Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

@endsection
