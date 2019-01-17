@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Task</div>
                    <div class="card-body">
                        <form method="POST" action="/projects/{{$project->id}}/tasks">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label" for="description">New Task</label>
                                <input type="text" class="input-group  mb-1 {{$errors->has('description')? 'alert-danger':''}}" name="description" placeholder="Task" value="{{old('description')}}">
                                <button class="btn btn-primary mb-3" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection