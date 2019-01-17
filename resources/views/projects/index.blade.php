@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <div class="row">
                            <ul>
                                @foreach($projects as $project)
                                    <li>
                                        <a href="/projects/{{$project->id}}">{{$project->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if (auth()->user()->can('create-project'))
                            <div class="row">
                                <div class="col">
                                    {!! Form::open (['url' => "/projects/create", 'method'=>'GET']) !!}
                                    {!! Form::submit('New Project') !!}
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