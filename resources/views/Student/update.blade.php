@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-light rounded justify-content-center mx-0">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <form method="POST" action="{{ route('student.update', $student->id) }}">
                            @csrf
                            @method('PUT')
                            @if (Session::has('notification'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session::get('notification') }}
                                    <button style="float: right; border:none; background:none;" type="button" class="close"
                                        data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <input type="text" name="user_id" class="form-control" id="inputCity" placeholder=""
                                value="{{ Auth::user()->id }}" hidden>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputCity">Student Name</label>
                                    <input type="text" name="student_name" class="form-control" id="inputCity"
                                        value="{{ $student->student_name }}" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputState">Class</label>
                                    <input type="text" name="class" class="form-control" id="inputState"
                                        value="{{ $student->class }}" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine1">Gender</label>
                                    <select class="form-select" name="gender">
                                        <option selected>Open this select menu</option>
                                        <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputPostalCode">School Name</label>
                                    <a data-bs-toggle="modal" data-bs-target="#myModal" style="float: right;"
                                        href="{{ route('school.create') }}"> + Add new</a>
                                    <select class="form-select" name="school_id" id="schoolSelect">
                                        <option value="">Choose School</option>
                                        @foreach ($school as $sc)
                                            <option value="{{ $sc->id }}" data-address="{{ $sc->address }}"
                                                data-schoolname="{{ $sc->school_name }}"
                                                {{ $student->school_id == $sc->id ? 'selected' : '' }}>
                                                {{ $sc->school_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputLastname">Address</label>
                                    <input type="text" name="address" id="addressInput"
                                        value="{{ $student->school->address }}" class="form-control" readonly>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#schoolSelect').on('change', function() {
                                        var selectedOption = $(this).find(':selected');
                                        var addressInput = $('#addressInput');
                                        if (selectedOption.val() !== '') {
                                            addressInput.val(selectedOption.data('address'));
                                        } else {
                                            addressInput.val('');
                                        }
                                    });
                                });
                            </script>


                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputCity">Number Phone</label>
                                    <input type="text" name="mobile" class="form-control" id="inputCity"
                                        value="{{ $student->mobile }}" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputState">Other Phone</label>
                                    <input type="text" name="other_phone" class="form-control" id="inputState"
                                        value="{{ $student->other_phone }}" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputPostalCode">Parent Phone</label>
                                    <input type="text" name="parent_phone" class="form-control" id="inputPostalCode"
                                        value="{{ $student->parent_phone }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputAddressLine1">Email</label>
                                    <input type="text" name="email" class="form-control" id="inputAddressLine1"
                                        value="{{ $student->email }}" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Specialized Register</label>
                                    <input type="text" name="specialized_register" class="form-control"
                                        id="inputAddressLine2" value="{{ $student->specialized_register }}"
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Status</label>
                                    <input type="text" name="status" class="form-control" id="inputAddressLine2"
                                        value="{{ $student->status }}" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="inputContactNumber">Description</label>
                                    <textarea name="description" class="form-control" id="description" style="height: 150px;"> {{ $student->description }}</textarea>
                                </div>
                            </div>
                            <button style="margin-top: 10px" type="submit"
                                class="btn btn-primary px-4 float-right">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
