@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Project</div>

                    <div class="card-body">


                        {!! Form::model($project, ['url' => "/projects/$project->id", 'method'=>'PATCH']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', $project->title, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::text('description', $project->description, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="team_id">Assigned To</label>
                            <select name="team_id" class="form-control mb-3">
                                <option value="null">Not assigned</option>
                                @foreach($teams as $team)
                                    <option value="{{$team->id}}" {{($project->team_id === $team->id)? 'selected': '' }}>{{$team->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        @include('partials.errors')
                        <div class="form-group">
                            {!! Form::submit('Update') !!}
                        </div>
                        {!! Form::close() !!}

                        <div class="form-group">
                            <div class="col col-md">
                                <form method="post" action="/completed-projects/{{$project->id}}">
                                    @if($project->completed)
                                        @method('DELETE')
                                    @endif
                                    @csrf
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="defaultCheck1" {{$project->completed ? 'checked' : ''}} name="completed" onchange="this.form.submit()">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Mark Project as Completed
                                            </label>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection