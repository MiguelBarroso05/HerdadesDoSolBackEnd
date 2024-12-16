@extends('layouts.app')

@section('content')
    @include('layouts.navbars.guest.navbar')
    <main class="main-content mt-0 flex-grow-1">
        <!-- Hero -->
        <section class="hero bg-cover bg-center h-screen flex items-center justify-center text-center home-image min-vh-100">
            <div class="text-white">
                <h1 class="display-4 fw-bold pt-12">Welcome to Our Estate!</h1>
                <p class="lead mt-12">Discover unique accommodations, exciting activities, and much more.</p>
                <div class="mt-4">
                    <a href="#accommodations" class="btn btn-primary btn-lg me-2">Explore Accommodations</a>
                    <a href="#activities" class="btn btn-outline-light btn-lg">Discover Activities</a>
                </div>
            </div>
        </section>

        <!-- Activities -->
        <section id="activities" class="py-5 bg-white">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">Activities</h2>
                <div class="row">
                    @foreach($activities as $activity)
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm">
                                <img src="{{ $activity->img ? asset('storage/'.$activity->img) : asset('/imgs/users/no-image.png') }}" class="card-img-top" alt="{{ $activity->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $activity->name }}</h5>
                                    <p class="card-text">{{ $activity->description }}</p>
                                    <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-primary">View More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- accommodation Types -->
        <section id="accommodation-types" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">Accommodation Types</h2>
                <div class="row">
                    @foreach($accommodation_types as $type)
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm">
                                <img src="{{ $type->img ? asset('storage/'.$type->img) : asset('/imgs/users/no-image.png') }}" class="card-img-top" alt="{{ $type->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $type->name }}</h5>
                                    <p class="card-text">{{ $type->description }}</p>
                                    <a href="{{ route('accommodation_types.show', $type->id) }}" class="btn btn-primary">View More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Accommodations -->
        <section id="accommodations" class="py-5 bg-white">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">Accommodations</h2>
                <div class="row">
                    @foreach($accommodations as $accommodation)
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Room nº {{ $accommodation->id }}</h5>
                                    <p class="card-text">Get a room fitted to accommodate a familly of {{ $accommodation->size }}</p>
                                    <a href="{{ route('accommodations.show', $accommodation->id) }}" class="btn btn-primary">View More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
