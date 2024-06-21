<!-- resources/views/admin/login.blade.php -->

@extends('admin.layouts.app_login') <!-- Assuming you have a main layout file -->

@section('content')
<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group m-0">
        <label for="exampleInputEmail1">Email address</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <small id="emailHelp" class="form-text text-muted">We'll never share your email
            with
            anyone else.</small>
    </div>
    <div class="form-group m-0">
        <label for="exampleInputPassword1">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-check pt-2">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

    </div>
    <button type="submit" class="btn shade f-primary btn-block"> {{ __('Login') }}</button>

</form>



@endsection