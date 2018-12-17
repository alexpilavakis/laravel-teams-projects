@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Project</div>

                    <div class="card-body">

                        {!! Form::model($project, ['action' => 'ProjectController@store']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::text('description', '', ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Create Project') !!}
                            @include('partials.errors')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection