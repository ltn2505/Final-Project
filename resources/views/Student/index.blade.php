@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-40 bg-light rounded justify-content-center mx-0">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <form method="GET" action="{{ route('students.filter') }}">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputCity">Student Name</label>
                                    <input type="text" name="student_name" class="form-control" id="inputCity"
                                        placeholder="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputCity">Number Phone</label>
                                    <input type="text" name="mobile" class="form-control" id="inputCity" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputAddressLine1">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputAddressLine1"
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Specialized Register</label>
                                    <input type="text" name="specialized_register" class="form-control"
                                        id="inputAddressLine2" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputPostalCode">Status</label>
                                    <select class="form-select" name="status" id="schoolSelect">
                                        <option value="">Choose option</option>
                                        <option value="New">New</option>
                                        <option value="Online">Online</option>
                                        <option value="Call back">Call back</option>
                                        <option value="Interested">Interested</option>
                                        <option value="Not interested">Not interested</option>
                                        <option value="Student">Student</option>
                                        <option value="Cancel">Cancel</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputPostalCode">School Name</label>
                                    <input type="text" name="school_name" class="form-control" id=""
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine1">Exam Block</label>
                                    <input type="text" name="exam_block" class="form-control" id="inputAddressLine1"
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Recruitment Points</label>
                                    <div class="input-group">
                                        <input type="text" name="points_min" class="form-control" placeholder="Min">
                                        <span class="input-group-text">-</span>
                                        <input type="text" name="points_max" class="form-control" placeholder="Max">
                                    </div>
                                </div>

                            </div>
                            <button style="margin-top: 10px" type="submit"
                                class="btn btn-primary px-4 float-right">{{ __('Search') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Manage Student</h6>
                @if (Route::has('register'))
                    <div class="d-flex justify-content-between align-items-center">
                        <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-info"
                            style="margin-right: 15px" id="transformdata" disabled>Transform data</button>

                        <a style="margin-right: 15px" href="{{ route('students.import') }}" class="btn btn-primary">
                            Import data</a>
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
                            <th></th>
                            <th scope="col">No.</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Calss</th>
                            <th scope="col">School Name</th>
                            <th scope="col">Block</th>
                            <th scope="col">Points</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Register</th>
                            <th scope="col">Status</th>
                            <th scope="col">Counselors</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $st)
                            <tr>

                                <td>
                                    @if (auth()->user()->role == 'Admin')
                                        <input type="checkbox" id="check[]" name="student[]"
                                            value="{{ $st->id }}" />
                                    @else
                                        @if (auth()->user()->id == $st->user->id)
                                            <input type="checkbox" id="check[]" name="student[]"
                                                value="{{ $st->id }}" />
                                        @else
                                            <input type="checkbox" id="check[]" name="student[]"
                                                value="{{ $st->id }}" disabled />
                                        @endif
                                    @endif
                                </td>


                                <td hidden>{{ $st->id }}</td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $st->student_name }}</td>
                                <td>{{ $st->class }}</td>
                                <td>{{ $st->school_name }}</td>
                                @if ($st->point == null)
                                    <td></td>
                                    <td></td>
                                @else
                                    <td>{{ $st->point->exam_block }}</td>
                                    <td>{{ $st->point->recruitment_points }}</td>
                                @endif
                                <td>{{ $st->gender }}</td>
                                <td>{{ $st->mobile }}</td>
                                <td>{{ $st->specialized_register }}</td>
                                <td>{{ $st->status }}</td>
                                <td>{{ $st->user->name }}</td>
                                <td>
                                    @if (auth()->user()->role == 'Admin')
                                        <form action="{{ route('student.destroy', $st->id) }}" method="POST">
                                            <a href="{{ route('student.edit', $st->id) }}" class="btn btn-info"><i
                                                    class="bi bi-pencil"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    @else
                                        @if (auth()->user()->id == $st->user->id)
                                            <form action="{{ route('student.destroy', $st->id) }}" method="POST">
                                                <a href="{{ route('student.edit', $st->id) }}" class="btn btn-info"><i
                                                        class="bi bi-pencil"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        @else
                                            <a href="{{ route('student.show', $st->id) }}" class="btn btn-info"><i
                                                    class="bi bi-info-circle"></i></a>
                                        @endif
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    {{ $student->appends(request()->all())->links() }}
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
