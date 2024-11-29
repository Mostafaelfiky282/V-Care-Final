@extends('front.app')
@section('content')
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor</li>
                    <li class="breadcrumb-item active" aria-current="page">{{auth()->user()->name}}</li>
                </ol>
            </nav>
            <x-success></x-success>

            <div class="d-flex flex-column gap-3 details-card doctor-details">
                <div class="details d-flex gap-2 align-items-center">
                    <img src="{{asset('uploads/doctors/'.$user->image)}}" alt="doctor" class="img-fluid rounded-circle" height="150"
                        width="150" />
                    <div class="details-info d-flex flex-column gap-3">
                        <h4 class="card-title fw-bold">{{$user->name}}</h4>
                        <h6 class="card-title fw-bold">
                            {{$user->major->name}}
                        </h6>
                    </div>
                </div>
                <hr />
                <form class="form" novalidate method="POST" action="{{route('appointments.store',$user->id)}}"> 
                    @csrf
                 
                    <x-error></x-error>  
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" id="name" required />
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" name="phone"  class="form-control" id="phone" required />
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control" id="email" required />
                        </div>
                 
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection