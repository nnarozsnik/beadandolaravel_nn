@extends('frontend.master')

@section('title', 'Bejelentkezés')

@section('content')
<div class="login-form">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="password">Jelszó</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-check mt-3">
            <input type="checkbox" id="remember_me" name="remember">
            <label for="remember_me">Emlékezz rám</label>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Bejelentkezés</button>
        </div>
    </form>
</div>
@endsection