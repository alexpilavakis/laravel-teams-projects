@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$team->name}}</div>

                    <div class="card-body">
                        @if ($team->users->count())
                            <div>
                                <ul>
                                @foreach ($team->users as $user)
                                    <li>
                                        {{$user->name}}
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <a class="nav-link" href="/teams">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection