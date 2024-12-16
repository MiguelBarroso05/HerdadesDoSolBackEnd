@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])

    <!-- Profile Card Section -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <!-- User profile image -->
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ auth()->user()->img ? asset('storage/'.auth()->user()->img) : asset('/imgs/users/no-image.png') }}"
                             class="w-100 border-radius-lg shadow-sm" alt="User image">
                    </div>
                </div>
                <!-- User name and role -->
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->firstname ?? 'Firstname' }} {{ auth()->user()->lastname ?? 'Lastname' }}
                        </h5>
                        @php
                            $roles = [
                                0 => 'Admin',
                                1 => 'Editor',
                                2 => 'Viewer',
                            ];
                        @endphp
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $roles[auth()->user()->role] ?? 'Unknown' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <!-- Profile Edit Form -->
                <div class="card">
                    <form role="form" method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                        @csrf <!-- CSRF token for security -->

                        <!-- Form Header -->
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- User Information Section -->
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <!-- Username input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" type="text" name="username"
                                               value="{{ old('username', auth()->user()->username) }}">
                                    </div>
                                </div>
                                <!-- Email input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email"
                                               value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <!-- First name input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" type="text" name="firstname"
                                               value="{{ old('firstname', auth()->user()->firstname) }}">
                                    </div>
                                </div>
                                <!-- Last name input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Last name</label>
                                        <input class="form-control" type="text" name="lastname"
                                               value="{{ old('lastname', auth()->user()->lastname) }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="horizontal dark">

                            <!-- Contact Information Section -->
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <!-- Country input -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Country</label>
                                        <input class="form-control" type="text" name="country"
                                               value="{{ old('country', auth()->user()->country) }}">
                                    </div>
                                </div>
                                <!-- City input -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" type="text" name="city"
                                               value="{{ old('city', auth()->user()->city) }}">
                                    </div>
                                </div>
                                <!-- Postal code input -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Postal code</label>
                                        <input class="form-control" type="text" name="postal"
                                               value="{{ old('postal', auth()->user()->postal) }}">
                                    </div>
                                </div>
                                <!-- Address input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control" type="text" name="address"
                                               value="{{ old('address', auth()->user()->address) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Side Image Section -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('imgs/pages/sign_in.jpg') }}" style="border-radius: 24px;">
                </div>
            </div>
        </div>
    </div>
@endsection
