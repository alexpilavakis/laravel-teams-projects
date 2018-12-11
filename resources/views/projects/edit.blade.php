@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Project</div>

                    <div class="card-body">
                        <form method="POST" class="form-signin" action="/projects/{{$project->id}}">
                            @csrf
                            @method("PATCH")

                                <div class="form-group">
                                    <label class="col-form-label" for="title">Title</label>
                                    <input type="text" class="input-group {{$errors->has('title')? 'alert-danger':''}}" name="title" value="{{$project->title}}" placeholder="Title" >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Description</label>
                                    <input type="text" class="input-group {{$errors->has('description')? 'alert-danger':''}}" name="description" value="{{$project->description}}" placeholder="Description" >
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
                            <div class="form-group">
                                <button class="btn btn-primary mb-3" type="submit">Update</button>
                            </div>
                            @include('partials.errors')

                        </form>
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