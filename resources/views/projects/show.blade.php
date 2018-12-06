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
                                <div>
                                    @foreach ($project->tasks as $task)
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
                                    @endforeach
                                </div>
                            @endif
                            <div class="row">
                                <a class="nav-link" href="/projects">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection