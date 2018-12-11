@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$project->title}}</div>

                    <div class="card-body">

                        <div class="card-subtitle">
                            <p>{{$project->description}}</p>
                            @if (auth()->user()->can('edit-project'))
                                <a href="/projects/edit/{{$project->id}}">Edit Project</a>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($project->tasks->count())
                                @foreach ($project->tasks as $task)
                                    <div class="row">
                                        <div class="col col-md">
                                            <form method="post" action="/completed-tasks/{{$task->id}}">
                                                @if($task->completed)
                                                    @method('DELETE')
                                                @endif
                                                @csrf
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1" {{$task->completed ? 'checked' : ''}} name="completed" onchange="this.form.submit()">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{$task->description}}
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                        @if (auth()->user()->can('edit-task'))
                                            <div class="col-md-1">
                                                <form method="GET" action="/projects/{{$project->id}}/tasks/edit/{{$task->id}}">
                                                    <div class="form-group">
                                                        <button class="btn-sm btn-primary" type="submit">Edit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                        @if (auth()->user()->can('delete-task'))
                                            <div class="col-md-1">
                                                <form method="POST" action="/projects/{{$project->id}}/tasks/delete/{{$task->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="form-group">
                                                        <button class="btn-sm btn-danger" type="submit">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach

                            @endif
                                @if (auth()->user()->can('add-task'))
                                    <div class="row">
                                        <form method="POST" action="/projects/{{$project->id}}/add-task">
                                            @csrf
                                            <div class="form-group">
                                                <button class="btn btn-primary mb-3" type="submit">Add Task</button>
                                            </div>
                                            @include('partials.errors')
                                        </form>
                                    </div>
                                @endif
                            <div class="row">
                                <a class="nav-link" href="{{ url()->previous() }}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection