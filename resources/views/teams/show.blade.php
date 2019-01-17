@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$team->name}}</div>

                    <div class="card-body">
                        @if ($team->users->count())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    @if(auth()->user()->can(\App\Enums\Permissions\CoordinatorPermissions::REMOVE_USER_TEAM))<th scope="col">Remove</th>@endif
                                    @if(auth()->user()->can(\App\Enums\Permissions\CoordinatorPermissions::ASSIGN_LEADER))<th scope="col">Leader</th>@endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($team->users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{$role->name.','}}
                                            @endforeach
                                        </td>
                                        @if(auth()->user()->can('remove-user-team'))
                                            <td>
                                                @if(auth()->user()->name != $user->name)
                                                    {!! Form::open(['url' => '/teams/'.$team->id.'/user/'.$user->id, 'method' => 'DELETE']) !!}
                                                    {!! Form::submit('Remove') !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </td>
                                        @endif
                                        @if(auth()->user()->can(\App\Enums\Permissions\CoordinatorPermissions::ASSIGN_LEADER))
                                            <td>
                                                @if(!$user->hasRole(\App\Enums\RoleEnum::TEAM_LEADER))
                                                    {!! Form::open(['url' => '/teams/'.$team->id.'/user/'.$user->id, 'method' => 'POST']) !!}
                                                    {!! Form::submit('Assign') !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                            @if(auth()->user()->can(\App\Enums\Permissions\CoordinatorPermissions::ASSIGN_USER_TEAM))
                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::open(['url' => '/teams/'.$team->id.'/user/assign', 'method' => 'post']) !!}
                                        {!! Form::submit('Assign New User') !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endif
                        <div class="row">
                            <div class="col">
                                <a class="nav-link" href="{{ url()->previous() }}">Back</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection