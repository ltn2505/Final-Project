@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recruitment by major</h6>
                        @if (auth()->user()->role == 'Admin')
                        <form method="GET" action="{{ route('home') }}">
                            @csrf
                            <div class="form-group row align-items-center">
                                <div class="col-sm-6">
                                    <select class="form-select" name="user_id" id="userSelect">
                                        <option value="{{ auth()->user()->id }}">User</option>
                                        @foreach ($user as $us)
                                            <option value="{{ $us->id }}">{{ $us->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button type="submit" class="btn btn-primary">{{ __('Change') }}</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Students by status (Total: {{ $count }})</h6>
                        @if (auth()->user()->role == 'Admin')
                        <form method="GET" action="{{ route('home') }}">
                            @csrf
                            <div class="form-group row align-items-center">
                                <div class="col-sm-6">
                                    <select class="form-select" name="user_id" id="userSelect">
                                        <option value="{{ auth()->user()->id }}">User</option>
                                        @foreach ($user as $us)
                                            <option value="{{ $us->id }}">{{ $us->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button type="submit" class="btn btn-primary">{{ __('Change') }}</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        //pie chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var data = {!! json_encode($data) !!};
        var chart = new Chart(ctx, {
            type: 'pie',
            data: data,
        });

        //bar chart
        var ctx1 = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx1, {
            type: 'bar',
            data: {!! json_encode($data1) !!},
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }

            }

        });
    </script>
    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calender</h6>

                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-8">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">To Do List</h6>

                    </div>
                    <form method="POST" action="{{ route('todos.store') }}">
                        @csrf
                        <input type="text" name="user_id" class="form-control" id="inputCity" placeholder=""
                            value="{{ Auth::user()->id }}" hidden>
                        <div class="d-flex mb-2">
                            <input class="form-control bg-transparent" name="short_task" type="text"
                                placeholder="Enter task">
                            <button type="submit" class="btn btn-primary ms-2">Add</button>
                        </div>
                    </form>
                    @foreach ($todos as $td)
                        <div class="d-flex align-items-center border-bottom py-2">
                            <input class="form-check-input m-0" type="checkbox" {{ $td->completed ? 'checked' : '' }}
                                onchange="updateTodoStatus({{ $td->id }}, this)">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <span id="task_{{ $td->id }}"
                                        style="{{ $td->completed ? 'text-decoration: line-through' : '' }}">{{ $td->short_task }}</span>
                                    <form action="{{ route('todos.destroy', $td->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-sm delete-todo"><i class="fa fa-times"></i></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        {{ $todos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->

    <script>
        // Add a click event listener to each checkbox with the 'todo-checkbox' class
        const todoCheckboxes = document.querySelectorAll('.todo-checkbox');
        todoCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                // Get the ID of the todo item associated with this checkbox
                const todoId = this.getAttribute('data-todo-id');
                // Send an AJAX request to update the completed status of the todo item
                fetch(`/todos/${todoId}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            completed: this.checked
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        });

        function updateTodoStatus(id, checkbox) {
            $.ajax({
                type: 'PUT',
                url: '/todos/' + id,
                data: {
                    _token: '{{ csrf_token() }}',
                    completed: checkbox.checked ? 1 : 0
                },
                success: function(response) {
                    if (response.success) {
                        if (checkbox.checked) {
                            $('#task_' + id).css('text-decoration', 'line-through');
                        } else {
                            $('#task_' + id).css('text-decoration', 'none');
                        }
                    }
                }
            });
        }
    </script>
@endsection
