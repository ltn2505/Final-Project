@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Manage Student</h6>
                @if (Route::has('register'))
                    <a href="{{ route('student.create') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                        + Create new</a>
                    <a href="{{ route('students.import') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                        Import data</a>
                @endif
            </div>
            @if (Session::has('notification'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('notification') }}
                        <button style="float: right; border:none; background:none;" type="button" class="close"
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Calss</th>
                            <th scope="col">School Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Register</th>
                            <th scope="col">Status</th>
                            <th scope="col">Counselors</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $st)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $st->student_name }}</td>
                                <td>{{ $st->class }}</td>
                                <td>{{ $st->school->school_name }}</td>
                                <td>{{ $st->school->address }}</td>
                                <td>{{ $st->gender }}</td>
                                <td>{{ $st->mobile }}</td>
                                <td>{{ $st->specialized_register }}</td>
                                <td>{{ $st->status }}</td>
                                <td>{{ $st->user->name}}</td>
                                <td>
                                    <form action="{{ route('student.destroy', $st->id) }}" method="POST">
                                        <a href="{{ route('student.edit', $st->id) }}" class="btn btn-info"><i
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
                    {{ $student->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
