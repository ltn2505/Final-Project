@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Manage User</h6>
                @if (Route::has('register'))
                <a href="{{ route('school.create') }}" class="btn btn-success">
                    + Create new</a>
                @endif
            </div>
            <div class="table-responsive">
                @if (Session::has('notification'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('notification') }}
                        <button style="float: right; border:none; background:none;" type="button" class="close"
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">School Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Headmaster</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Description</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($school as $sc)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sc->school_name }}</td>
                                <td>{{ $sc->address }}</td>
                                <td>{{ $sc->headmaster }}</td>
                                <td>{{ $sc->gender }}</td>
                                <td>{{ $sc->phone_number }}</td>
                                <td>{{ $sc->email }}</td>
                                <td>{{ $sc->description }}</td>
                                <td>
                                    <form action="{{ route('school.destroy', $sc->id) }}" method="POST">
                                        <a href="{{ route('school.edit', $sc->id) }}" class="btn btn-info"><i
                                                class="bi bi-pencil"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    {{ $school->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
