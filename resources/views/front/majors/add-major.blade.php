@extends('front.app')
@section('content')
    {{-- @dd($products) --}}
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Major</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
            <form class="form" novalidate method="POST" action="{{ url('add-major') }}">
                @csrf
                @if (session('success') !== null)
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger p-1 text-center">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="subject">Image</label>
                        <input type="text" value="{{ old('image') }}" class="form-control" name="image" id="subject"
                            required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>

    </div>
    </div>
@endsection
