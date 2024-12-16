@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <!-- Include the top navigation bar with the title "Profile" -->
    @include('layouts.navbars.auth.topnav', ['title' => 'Profile'])


        <!-- Edit Form -->
        <div class="container-fluid py-4 mt-8">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- User Profile Card -->
                        <div class="card-body p-3">
                            <div class="row gx-4">
                                <!-- User Image Section -->
                                <div class="col-auto">
                                    <div class="avatar avatar-xl position-relative">
                                        <!-- Display user image or a default image if not available -->
                                        <img src="{{ $user->img ? asset('storage/'.$user->img) : asset('/imgs/users/no-image.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <!-- User Name Section -->
                                <div class="col-auto my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1">
                                            {{ $user->firstname .' '. $user->lastname }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Error Messages -->
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="text-white">
                                    @foreach($errors->all() as $error)
                                        <li><strong>Error!</strong> {{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- User Information Card -->
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0">Edit User</p>
                                    <!-- Action Buttons -->
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-sm ms-auto bg-gradient-success">Update</button>
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm ms-auto bg-gradient-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- User Information Section -->
                                <p class="text-uppercase text-sm">User Information</p>
                                <div class="row">
                                    <!-- Profile Image Upload -->
                                    <div class="col-md-6">
                                        <label for="username" class="form-control-label">Image</label>
                                        <input type="file" class="form-control" name="img" id="inputGroupFile02" accept="image/*">
                                    </div>

                                    <!-- Username Input -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username" class="form-control-label">Username</label>
                                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username', $user->username) }}">
                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email Input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">Email address</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- First Name Input -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname" class="form-control-label">First name</label>
                                            <input class="form-control @error('firstname') is-invalid @enderror" name="firstname" type="text" value="{{ old('firstname', $user->firstname) }}">
                                            @error('firstname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Last Name Input -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname" class="form-control-label">Last name</label>
                                            <input class="form-control @error('lastname') is-invalid @enderror" name="lastname" type="text" value="{{ old('lastname', $user->lastname) }}">
                                            @error('lastname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information Section -->
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Contact Information</p>
                                <div class="row">
                                    <!-- Address Input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address" class="form-control-label">Address</label>
                                            <input class="form-control" name="address" type="text" value="{{ old('address', $user->address) }}">
                                        </div>
                                    </div>

                                    <!-- City Input -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city" class="form-control-label">City</label>
                                            <input class="form-control" type="text" name="city" value="{{ old('city', $user->city) }}">
                                        </div>
                                    </div>

                                    <!-- Country Input -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country" class="form-control-label">Country</label>
                                            <input class="form-control" type="text" name="country" value="{{ old('country', $user->country) }}">
                                        </div>
                                    </div>

                                    <!-- Postal Code Input -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postal" class="form-control-label">Postal code</label>
                                            <input class="form-control" type="text" name="postal" value="{{ old('postal', $user->postal) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @push('js')
        <script>
            document.getElementById('inputGroupFile02').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profilePreview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    @endpush
@endsection
