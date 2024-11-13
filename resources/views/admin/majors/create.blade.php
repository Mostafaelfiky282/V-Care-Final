@extends('front.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{url('majors')}}" method="POST" class="my-5 border p-3" enctype="multipart/form-data">
                    @csrf
                    <x-error></x-error>
                    <x-success></x-success>
                    <div class="mb-3">
                        <label for="">Major Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Major Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Save" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
