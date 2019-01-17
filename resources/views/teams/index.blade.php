@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Team</div>

                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="/teams/{{$team->id}}"> {{$team->name}}</a>
                            </li>
                        </ul>
                        @if (auth()->user()->can('create-team'))
                            <div class="row">
                                <div class="col">
                                    {!! Form::open (['url' => "/teams/create", 'method'=>'GET']) !!}
                                    {!! Form::submit('New Team') !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection