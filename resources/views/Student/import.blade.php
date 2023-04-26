@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Import Students</div>

            <div class="card-body">
                <form method="POST" action="{{ route('students.import') }}" enctype="multipart/form-data">
                    @csrf
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
