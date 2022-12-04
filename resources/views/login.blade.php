@extends('layout')
@section('content')



<div class="container mx-auto my-5 col-md-4">
    <h2 class="text-center">Login</h2>
    <form class='row mt-5 form' method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ route('register') }}" class="text-center my-3">Or Register here</a>
    </form>
</div>



@endsection