@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Activity Type'])
    <!-- Edit Form -->
    <div class="container-fluid py-4 mt-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{route('activity_types.update', $activity_type->id)}}">
                    @csrf
                    @method('PUT')

                    <!-- Activity Type Card -->
                    <div class="card-body p-3">
                        <div class="row gx-4">
                            <!-- accommodation Type Name Section -->
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        {{$activity_type->name}}
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

                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Activity Type Information Card -->
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0">Edit Activity Type</p>

                                <!-- Action Buttons -->
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto bg-gradient-success">
                                        Update
                                    </button>
                                    <a href="{{ url()->previous()}}"
                                       class="btn btn-secondary btn-sm ms-auto bg-gradient-danger">Cancel</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Activity Information Section -->
                            <p class="text-uppercase text-sm">Information</p>
                            <div class="row">
                                <!-- Activity Type Name Upload -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input"
                                               class="form-control-label">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror"
                                               type="text" name="name"
                                               value="{{old('name', $activity_type->name)}}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


