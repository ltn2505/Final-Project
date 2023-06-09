@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-light rounded justify-content-center mx-0">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <form method="POST" action="{{ route('student.update', $student->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if (Session::has('notification'))
                                <div class="alert alert-success alert-dismissible fade show pt-1 pb-1" role="alert">
                                    {{ Session::get('notification') }}
                                    <button style="float: right; border:none; background:none;" type="button"
                                        class="close" data-dismiss="alert" aria-label="Close">
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
                                        value="{{ $student->school_name }}" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputLastname">Address</label>
                                    <input type="text" name="address" id="addressInput" value="{{ $student->address }}"
                                        class="form-control">
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
                                    <input type="email" name="email" class="form-control" id="inputAddressLine1"
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
                                    <select class="form-select" name="status" id="status">
                                        <option value="New" {{ $student->status == 'New' ? 'selected' : '' }}>
                                            New
                                        </option>
                                        <option value="Online" {{ $student->status == 'Online' ? 'selected' : '' }}>
                                            Online
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
                                    <select class="form-select" name="recruitment_method" id="">
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
                                        value="{{ $student->points->count() > 0 ? $student->points[0]->exam_block : '' }}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputAddressLine2">Recruitment Points</label>
                                    <input type="text" name="recruitment_points" class="form-control"
                                        id="inputAddressLine2"
                                        value="{{ $student->points->count() > 0 ? $student->points[0]->recruitment_points : '' }}">
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="inputContactNumber">Description</label>
                                    <textarea name="description" class="form-control" id="description" style="height: 150px;"> {{ $student->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="name">File</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file"
                                            class="form-control-file @error('image') is-invalid @enderror" name="image"
                                            autofocus onchange="previewImage(event)">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right mt-2">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-left:345px">{{ __('Save') }}</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                            <script>
                                function previewImage(event) {
                                    var input = event.target;
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                        var img = document.getElementById('image_review');
                                        img.src = reader.result;
                                        img.style.display = 'block';
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            </script>
                            <div class="testimonial-item mt-2">
                                <img id="image_review" class="mb-4"
                                    src="{{ asset('img/student/' . $student->image) }}"
                                    style=" width: 40px; height: 60px; margin-bottom: 0.1rem !important;"
                                    onclick="openModal()">
                                <h5 class="mb-1"></h5>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="image-modal" class="modal">
        <span class="close1" style="margin-top:50px;" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="full-size-image">
        <div class="caption"></div>
    </div>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            height: auto;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close1 {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close1:hover,
        .close1:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* Responsive Styles */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <script>
        function openModal() {
            var modal = document.getElementById("image-modal");
            var img = document.getElementById("image_review");
            var modalImg = document.getElementById("full-size-image");
            modal.style.display = "block";
            modalImg.src = img.src;
        }

        function closeModal() {
            var modal = document.getElementById("image-modal");
            modal.style.display = "none";
        }
    </script>
@endsection
