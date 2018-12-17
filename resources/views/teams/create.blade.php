@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Team</div>

                    <div class="card-body">

                        {!! Form::model($team, ['action' => 'TeamController@store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Create Team') !!}
                        @include('partials.errors')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection