@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">

                        <div class="row">
                            <form method="POST" class="form-signin" action="/projects/{{$project->id}}/tasks/edit/{{$task->id}}">
                                @csrf
                                @method("PATCH")
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Description</label>
                                    <input type="text" class="input-group {{$errors->has('description')? 'alert-danger':''}}" name="description" value="{{$task->description}}" placeholder="Description" >
                                </div>

                                <button class="btn btn-primary mb-3" type="submit">Update</button>

                                @include('partials.errors')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection