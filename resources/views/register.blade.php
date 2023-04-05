@extends('auth')
@section('title', 'register')
@section('content')
    <h3 style="text-align: center; margin-top: 20px;">Register</h3>
    <hr>
    <style>
    </style>
    <div class="col-md-4 mx-auto my-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('do.register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            @error('name')
                            <div id="nameHelp" class="form-text">{{ $message }}</div>
                        @enderror
                            </div>

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

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" id="password_confirmation"
                                        @error('password_confirmation')
                                        <div id="passwordConfirmationHelp" class="form-text">{{ $message }}</div>
                                    @enderror
                                        </div>
                                    <p>
                                        Sudah punya akun?
                                        <a href="{{ route('login') }}">Silahkan Login.</a>
                                    </p>
                                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
