@extends('layout')
@section('content')


<div class="container mx-auto my-5 col-md-4">
    <h2 class="text-center">Register</h2>
    <form class='row mt-5 form'  method="post">
        @csrf
        @if(session()->has('message'))
                <div class="alert alert-success  form-group my-3 mx-auto w-100">
                    {{ session()->get('message') }}
                </div>
            @endif
        <div class="mb-3">
            <label for="username"  class="form-label">Username</label>
            <input type="text" value="{{ old('username') }}" name="username" class="form-control" id="">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email"  class="form-label">Email address</label>
            <input type="text" value="{{ old('email') }}" name="email" class="form-control" aria-describedby="emailHelp">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>  

        <div class="mb-3">
            <label   class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create account</button>
        <a href="{{ route('login') }}" class="text-center my-3">Login here</a>
    </form>
</div>



@endsection