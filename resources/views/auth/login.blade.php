@extends('front.app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Log in</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-6 mx-auto">
             
                <form action="{{route('auth.do.login')}}" method="POST" class="my-5 border p-3" enctype="multipart/form-data">
                    <h1 class="text-center"> Welcome Back</h1>
                    @csrf
                    {{-- <x-success></x-success>
                    <x-error></x-error>  --}}
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                        @error('email')
                        <span class="text-danger"> *{{$message}} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <span class="text-danger"> *{{$message}} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Log in" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
