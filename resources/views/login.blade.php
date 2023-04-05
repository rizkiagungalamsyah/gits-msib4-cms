@extends('auth')
@section('title', 'login')
@section('content')

    <h3 style="text-align: center; margin-top: 20px;">Login</h3>
    <hr>
    <br>
    <style>
    </style>
    <div class="col-md-4 mx-auto my-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('do.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            @error('email')
                            <div id="emailHelp" class="form-text">{{ $message }}</div>
                        @enderror
                            </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                @error('password')
                            <div id="passwordHelp" class="form-text">{{ $message }}</div>
                        @enderror
                                </div>
                            <p>
                                Belum punya akun?
                                <a href="{{ route('register') }}">Silahkan Mendaftar.</a>
                            </p>
                            <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
