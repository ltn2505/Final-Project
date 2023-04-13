@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Manage Student</h6>
                @if (Route::has('register'))
                    <div class="d-flex justify-content-between align-items-center">
                        <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-info" style="margin-right: 15px"
                            id="transformdata" disabled>Transform data</button>

                        <a href="{{ route('student.create') }}" class="btn btn-success">
                            + Create new</a>

                    </div>
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
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="student_table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
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
                                <a href="{{ route('students.import') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                                    Import data</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $st)
                            <tr>
                                <td><input type="checkbox" id="check[]" /> </td>
                                <td hidden>{{ $st->id }}</td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $st->student_name }}</td>
                                <td>{{ $st->class }}</td>
                                <td>{{ $st->school->school_name }}</td>
                                <td>{{ $st->school->address }}</td>
                                <td>{{ $st->gender }}</td>
                                <td>{{ $st->mobile }}</td>
                                <td>{{ $st->specialized_register }}</td>
                                <td>{{ $st->status }}</td>
                                <td>{{ $st->user->name }}</td>
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


    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transform data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('students.transform') }}">
                        @csrf
                        <div id="student_section">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="inputPostalCode">User</label>
                                <select class="form-select" name="user_id" id="schoolSelect">
                                    <option value="">Choose User</option>
                                    @foreach ($user as $us)
                                        <option value="{{ $us->id }}">{{ $us->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 ">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('#student_table input[type="checkbox"]');
        const assignBtn = document.querySelector('#transformdata');

        function checkboxAssignButton() {
            const checked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            assignBtn.disabled = !checked;
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', checkboxAssignButton);
        });

        assignBtn.addEventListener('click', () => {
            const sectionTopicID = document.getElementById('student_section');
            sectionTopicID.innerHTML = '';

            Array.from(checkboxes).forEach(checkbox => {
                if (checkbox.checked) {
                    const row = checkbox.closest('tr');
                    const id = row.querySelector('td:nth-child(2)').innerText;

                    sectionTopicID.innerHTML += `<input type="hidden" name="studentID[]" value="${id}">`;
                }
            });

            $('#transform-data-modal').modal('show');
        });
    </script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
