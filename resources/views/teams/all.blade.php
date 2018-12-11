@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Teams</div>

                    <div class="card-body">
                        <div class="row">
                            <ul>
                                @foreach($teams as $team)
                                    <li>
                                        <a href="/teams/{{$team->id}}"> {{$team->name}}</a>
                                        <br>Assigned Projects:
                                        <ul>
                                        @foreach($team->projects as $project)
                                            <li>
                                                {{$project->title}}
                                            </li>
                                        @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form method="GET" action="/teams/create">
                                    <div class="form-group">
                                        <button class="btn btn-primary mb-3" type="submit">New Team</button>
                                    </div>
                                    @include('partials.errors')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection