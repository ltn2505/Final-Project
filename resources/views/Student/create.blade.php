@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-light rounded justify-content-center mx-0">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        @if (Session::has('notification'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('notification') }}
                                <button style="float: right; border:none; background:none;" type="button" class="close"
                                    data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('student.store') }}">
                            @csrf
                            <input type="text" name="user_id" class="form-control" id="inputCity" placeholder=""
                                value="{{ Auth::user()->id }}" hidden>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputCity">Student Name</label>
                                    <input type="text" name="student_name" class="form-control" id="inputCity"
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputState">Class</label>
                                    <input type="text" name="class" class="form-control" id="inputState"
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine1">Gender</label>
                                    <select class="form-select" name="gender">
                                        <option value="Gender">Open this select menu</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputLastname">School</label>
                                    <input type="text" name="school_name" id="addressInput" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputLastname">Address</label>
                                    <input type="text" name="address" id="addressInput" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputCity">Number Phone</label>
                                    <input type="text" name="mobile" class="form-control" id="inputCity" placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputState">Other Phone</label>
                                    <input type="text" name="other_phone" class="form-control" id="inputState"
                                        placeholder="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputPostalCode">Parent Phone</label>
                                    <input type="text" name="parent_phone" class="form-control" id="inputPostalCode"
                                        placeholder="">
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
                                        <option value="Choose Method">Choose Method</option>
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
                                    <input type="text" name="recruitment_points" class="form-control"
                                        id="inputAddressLine2" placeholder="">
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="inputContactNumber">Description</label>
                                    <textarea name="description" class="form-control" id="description" style="height: 150px;"></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary px-4 float-right mt-4">{{ __('Save') }}</button>
                            <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 ml-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
