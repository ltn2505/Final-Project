@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Import Students</div>

            <div class="card-body">
                <form method="POST" action="{{ route('students.import') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputPostalCode">School Name</label>
                            <a data-bs-toggle="modal" data-bs-target="#myModal" style="float: right;"
                                href="{{ route('school.create') }}"> + Add new</a>
                            <select class="form-select" name="school" id="schoolSelect">
                                <option value="">Choose School</option>
                                @foreach ($school as $sc)
                                    <option value="{{ $sc->id }}" data-address="{{ $sc->address }}"
                                        data-schoolname="{{ $sc->school_name }}">{{ $sc->school_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputLastname">Address</label>
                            <input type="text" name="address" id="addressInput" class="form-control" readonly>
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


                    <div class="form-group" style="margin-top: 2%;">
                        <label for="file">Select Excel File</label>
                        <input type="file" class="form-control-file" id="file" name="file"
                            accept=".xlsx,.xls,.csv">
                    </div>

                    <button style="margin-top: 2%;" type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
