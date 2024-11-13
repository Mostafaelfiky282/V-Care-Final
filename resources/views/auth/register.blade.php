@extends('front.app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{route('auth.store')}}" method="POST" class="my-5 border p-3" enctype="multipart/form-data">
                    @csrf
                    {{-- <x-error></x-error> --}}
                    <x-success></x-success>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                        <span class="text-danger"> *{{$message}} </span>
                        @enderror
                    </div>
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
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <span class="text-danger"> *{{$message}} </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
