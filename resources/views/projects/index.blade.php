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
                                    <form method="GET" action="/projects/create">
                                        <div class="form-group">
                                            <button class="btn btn-primary mb-3" type="submit">New Project</button>
                                        </div>
                                        @include('partials.errors')
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection