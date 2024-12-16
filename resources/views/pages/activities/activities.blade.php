@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Activities'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <!-- Success Message -->
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show " role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                @endif
                <!-- Card container for the Activities table -->
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Activities table</h6>

                        <!-- Button to create a new activity -->
                        <a href="{{ route('activities.create') }}" class="btn btn-primary btn-sm mr-2"
                           data-toggle="tooltip" data-original-title="Create new activity">
                            Create New Activity
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <!-- Column headers -->
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Activity
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Last Update
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Loop through the $activities collection to display each activity -->
                                @foreach($activities as $activity)
                                    <tr>
                                        <!-- Activity info column -->
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <!-- Activity image -->
                                                <div>
                                                    <img
                                                        src="{{ $activity->img ? asset('storage/'.$activity->img) : asset('/imgs/users/no-image.png') }}"
                                                        class="avatar avatar-sm me-3" alt="Activity image">
                                                </div>
                                                <!-- Activity name -->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $activity->name }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Activity type column -->
                                        <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {{ $activity->activity_types->name }}
                                        </span>
                                        </td>

                                        <!-- Last update column -->
                                        <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {{ $activity->updated_at }}
                                        </span>
                                        </td>

                                        <!-- Action buttons -->
                                        <td class="align-middle d-flex justify-content-evenly">
                                            <!-- Show button -->
                                            <a href="{{ route('activities.show', $activity) }}"
                                               class="btn btn-secondary btn-sm mr-2 bg-gradient-info"
                                               data-toggle="tooltip" data-original-title="Show activity">
                                                Show
                                            </a>

                                            <!-- Edit button -->
                                            <a href="{{ route('activities.edit', $activity) }}"
                                               class="btn btn-secondary btn-sm mr-2 bg-gradient-warning"
                                               data-toggle="tooltip" data-original-title="Edit activity">
                                                Edit
                                            </a>

                                            <!-- Delete button  -->
                                            <form action="{{ route('activities.destroy', ['activity' => $activity]) }}"
                                                  method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-secondary btn-sm bg-gradient-danger"
                                                        data-toggle="tooltip" data-original-title="Delete activity">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                {{ $activities->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            <!-- Script to auto-hide the success message -->
            document.addEventListener('DOMContentLoaded', function () {
                const successAlert = document.getElementById('success-alert');

                if (successAlert) {
                    setTimeout(() => {
                        successAlert.classList.remove('show');
                        successAlert.classList.add('fade');
                        setTimeout(() => {
                            successAlert.remove();
                        }, 300); // Fade-out animation
                    }, 3000); // 3 seconds
                }
            });
        </script>
    @endpush
@endsection
