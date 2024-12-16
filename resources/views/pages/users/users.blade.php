@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <!-- Include the top navigation bar with the title "All Users" -->
    @include('layouts.navbars.auth.topnav', ['title' => 'All Users'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <!-- Success Message -->
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show " role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                @endif

                <!-- Card container for the Users table -->
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Users table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <!-- Table wrapper with responsive design -->
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <!-- Table header -->
                                <thead>
                                <tr>
                                    <!-- Table column headers -->
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        User
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Activated/Disabled at
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Loop through the $users collection to display each user -->
                                @foreach($users as $user)
                                    <tr>
                                        <!-- User info column -->
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <!-- User profile image -->
                                                <div>
                                                    <img
                                                        src="{{ $user->img ? asset('storage/'.$user->img) : asset('/imgs/users/no-image.png') }}"
                                                        class="avatar avatar-sm me-3" alt="User image">
                                                </div>
                                                <!-- Username and email -->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- User status column -->
                                        <td class="align-middle text-center text-sm">
                                            <!-- Status badge: Active or Inactive -->
                                            <span
                                                class="badge badge-sm {{ is_null($user->deleted_at) ? 'bg-gradient-success' : 'bg-gradient-danger' }}">
                                                {{ is_null($user->deleted_at) ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>

                                        <!-- User activation/disable date -->
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                @if (is_null($user->deleted_at))
                                                    {{ $user->created_at ? $user->created_at->format('d/m/Y') : 'No date available' }}
                                                @else
                                                    {{ $user->deleted_at ? $user->deleted_at->format('d/m/Y') : 'No date available' }}
                                                @endif
                                            </span>
                                        </td>

                                        <!-- Action buttons -->
                                        <td class="align-middle d-flex justify-content-evenly">
                                            <!-- Show User button -->
                                            <a href="{{ route('users.show', $user) }}"
                                               class="btn btn-secondary btn-sm mr-2 bg-gradient-info"
                                               data-toggle="tooltip" data-original-title="Show user">
                                                Show
                                            </a>

                                            <!-- Edit User button -->
                                            <a href="{{ route('users.edit', $user) }}"
                                               class="btn btn-secondary btn-sm mr-2 bg-gradient-warning"
                                               data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>

                                            <!-- Conditional: Disable or Activate User -->
                                            @if(is_null($user->deleted_at))
                                                <!-- Disable user -->
                                                <form action="{{ route('users.destroy', ['user' => $user]) }}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn btn-secondary btn-sm bg-gradient-danger"
                                                            data-toggle="tooltip" data-original-title="Disable user">
                                                        Disable
                                                    </button>
                                                </form>
                                            @else
                                                <!-- Activate user -->
                                                <form action="{{ route('users.recover', ['user' => $user]) }}"
                                                      method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn btn-secondary btn-sm bg-gradient-success"
                                                            data-toggle="tooltip" data-original-title="Activate user">
                                                        Activate
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                {{ $users->links('vendor.pagination.custom') }}
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
