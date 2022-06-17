@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center"><strong>Login Peduli Diri</strong></h1>

            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="nik" class="form-control rounded-top @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" required value="{{ old('nik') }}">
                    <label for="nik">NIK</label>
                    @error('nik')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required value="{{ old('name') }}">
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="justify-content-between d-flex">
                    {{-- <a class="w-30 btn btn-md btn-primary mt-3" href="#">Saya Pengguna Baru</a> --}}
                    <button class="w-100 btn btn-md btn-primary mt-3" type="submit">Login/Masuk</button>
                </div>
            </form>
            <small class="d-block text-center mt-3"><a href="#">Saya Pengguna Baru</a></small>
        </main>
    </div>
</div>

@endsection
