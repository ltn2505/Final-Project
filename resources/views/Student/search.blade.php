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
                                        placeholder="" value="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputCity">Number Phone</label>
                                    <input type="text" name="mobile" class="form-control" id="inputCity"  placeholder="">
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
                                    <label for="inputPostalCode">Recruitment Method</label>
                                    <select class="form-select" name="recruitment_method" id="">
                                        <option value="">Choose Method</option>
                                        <option value="Grade point average 11">Grade point 11</option>
                                        <option value="Grade point average 12">Grade point 12</option>
                                        <option value="Graduation exam score">Graduation exam score</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine1">Exam Block</label>
                                    <input type="text" name="exam_block" class="form-control" id="inputAddressLine1"
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Recruitment Points</label>
                                    <div class="input-group">
                                        <input type="text" name="min_points" class="form-control" placeholder="Min">
                                        <span class="input-group-text">-</span>
                                        <input type="text" name="max_points" class="form-control" placeholder="Max">
                                    </div>
                                </div>

                            </div>
                            <button style="margin-top: 10px" type="submit"
                                class="btn btn-primary px-4 float-right">{{ __('Search') }}</button>
                        </form>
                    </div>

                    <!-- Search results and pagination links will be inserted here -->

                    @if (count($student_search) > 0)
                        <div class="table-responsive mt-4">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="searchResults">
                                <thead>
                                    <tr>
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
                                    @foreach ($student_search as $st)
                                        <tr>

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
                            <div class="d-flex justify-content-center align-items-center mt-3" id="student">
                                {{ $student_search->appends(request()->all())->links() }}
                            </div>
                        </div>
                    @else
                        <p>No results found.</p>
                    @endif

                </div>
            </div>
        </div>

    </div>


@endsection
