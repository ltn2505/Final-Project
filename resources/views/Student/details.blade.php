@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-light rounded justify-content-center mx-0">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <form>
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
                                        value="{{ $student->student_name }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputState">Class</label>
                                    <input type="text" name="class" class="form-control" id="inputState"
                                        value="{{ $student->class }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine1">Gender</label>
                                    <select class="form-select" name="gender" disabled>
                                        <option selected>Open this select menu</option>
                                        <option value="M" {{ $student->gender == 'M' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="F" {{ $student->gender == 'F' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputLastname">School</label>
                                    <input type="text" name="school_name" id="addressInput"
                                        value="{{ $student->school_name }}" class="form-control" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputLastname">Address</label>
                                    <input type="text" name="address" id="addressInput" value="{{ $student->address }}"
                                        class="form-control" readonly>
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
                                        value="{{ $student->mobile }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputState">Other Phone</label>
                                    <input type="text" name="other_phone" class="form-control" id="inputState"
                                        value="{{ $student->other_phone }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputPostalCode">Parent Phone</label>
                                    <input type="text" name="parent_phone" class="form-control" id="inputPostalCode"
                                        value="{{ $student->parent_phone }}" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputAddressLine1">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputAddressLine1"
                                        value="{{ $student->email }}" placeholder="" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Specialized Register</label>
                                    <input type="text" name="specialized_register" class="form-control"
                                        id="inputAddressLine2" value="{{ $student->specialized_register }}" placeholder=""
                                        readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Status</label>
                                    <select class="form-select" name="status" id="status" disabled>
                                        <option value="New" {{ $student->status == 'New' ? 'selected' : '' }}>
                                            New
                                        </option>
                                        <option value="Call back" {{ $student->status == 'Call back' ? 'selected' : '' }}>
                                            Call back
                                        </option>
                                        <option value="Interested"
                                            {{ $student->status == 'Interested' ? 'selected' : '' }}>
                                            Interested
                                        </option>
                                        <option value="Not interested"
                                            {{ $student->status == 'Not interested' ? 'selected' : '' }}>
                                            Not interested
                                        </option>
                                        <option value="Student" {{ $student->status == 'Student' ? 'selected' : '' }}>
                                            Student
                                        </option>
                                        <option value="Cancel" {{ $student->status == 'Cancel' ? 'selected' : '' }}>
                                            Cancel
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputPostalCode">Recruitment Method</label>
                                    <select class="form-select" name="recruitment_method" id="" disabled>
                                        <option value="Choose Method">Choose Method</option>
                                        @if ($student->points->count() > 0)
                                            <option value="Grade point average 11"
                                                {{ $student->points[0]->recruitment_method == 'Grade point average 11' ? 'selected' : '' }}>
                                                Grade point 11</option>
                                            <option value="Grade point average 12"
                                                {{ $student->points[0]->recruitment_method == 'Grade point average 12' ? 'selected' : '' }}>
                                                Grade point 12</option>
                                            <option value="Graduation exam score"
                                                {{ $student->points[0]->recruitment_method == 'Graduation exam score' ? 'selected' : '' }}>
                                                Graduation exam score</option>
                                        @else
                                            <option value="Grade point average 11">
                                                Grade point 11</option>
                                            <option value="Grade point average 12">
                                                Grade point 12</option>
                                            <option value="Graduation exam score">
                                                Graduation exam score</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine1">Exam Block</label>
                                    <input type="text" name="exam_block" class="form-control" id="inputAddressLine1"
                                        value="{{ $student->points->count() > 0 ? $student->points[0]->exam_block : '' }}"
                                        readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Recruitment Points</label>
                                    <input type="text" name="recruitment_points" class="form-control"
                                        id="inputAddressLine2"
                                        value="{{ $student->points->count() > 0 ? $student->points[0]->recruitment_points : '' }}"
                                        readonly>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="inputContactNumber">Description</label>
                                    <textarea name="description" class="form-control" id="description" style="height: 150px;" readonly> {{ $student->description }}</textarea>
                                </div>
                            </div>
                                <a href="{{ url()->previous() }}" class="btn btn-primary mt-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
