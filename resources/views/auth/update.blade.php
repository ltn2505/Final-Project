@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update profile') }}</div>
                    @if (Session::has('notification'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('notification') }}
                            <button style="float: right; border:none; background:none;" type="button" class="close"
                                data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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

                            <div class="testimonial-item text-center">
                                <img id="image_review" class="img-fluid rounded-circle mx-auto mb-4"
                                    src="{{ asset('img/' . $user->image) }}"
                                    style=" width: 100px; height: 100px; margin-bottom: 0.5rem !important;">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" required autocomplete="name" autofocus readonly hidden>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
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

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>

                                <div class="col-md-6">
                                    <input id="full_name" type="text"
                                        class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                                        value="{{ $user->full_name }}" required autocomplete="full_name" autofocus>

                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" name="gender">
                                        <option selected>Open this select menu</option>
                                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dob"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Day of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date"
                                        class="form-control @error('dob') is-invalid @enderror" name="dob"
                                        value="{{ $user->dob }}" required autocomplete="dob" autofocus>

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <input id="role" type="text"
                                        class="form-control @error('role') is-invalid @enderror" name="role"
                                        value="{{ $user->role }}" required autocomplete="role" autofocus readonly>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="manager"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Manager') }}</label>
                                <div class="col-md-6">
                                    <input id="manager" type="text"
                                        class="form-control @error('manager') is-invalid @enderror" name="manager"
                                        value="{{ $user->manager }}" required autocomplete="manager" autofocus readonly
                                        readonly>

                                    @error('manager')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
