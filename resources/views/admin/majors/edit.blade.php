@extends('front.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{ url('majors/' . $major->id) }}" method="POST" class="my-5 border p-3"
                    enctype="multipart/form-data">
                    @csrf
                    <x-error></x-error>
                    <x-success></x-success>
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Major Name</label>
                        <input type="text" value="{{ $major->name }}" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Major Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Save" class="form-control btn btn-primary">
                    </div>
                </form>
                <div class="text-center">
                    <img src="{{ asset('uploads/majors/' . $major->image) }}" class="" height="300" width="300"
                        alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
