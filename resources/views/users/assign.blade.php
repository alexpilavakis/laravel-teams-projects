@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Assign a user to {{$team->name}}</div>
                    <div class="card-body">
                            <div class="form-group">
                                {!! Form::open(['url' => '/teams/'.$team->id.'/user', 'method' => 'POST']) !!}
                                <label class="col-form-label" for="user_id">Assigned To</label>
                                <select name="user_id" class="form-control mb-3">
                                    @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach

                                </select>
                                <button class="btn btn-primary mb-3" type="submit">Assign</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection