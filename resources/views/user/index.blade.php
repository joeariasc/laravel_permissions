@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('List of Users') }}</h2></div>

                <div class="card-body">
                    @include('custom.message')
                    <table class="table table-bordered table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Role') }}</th>
                                <th colspan="3">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>
                                    @isset( $user->roles[0]->name )
                                    {{ $user->roles[0]->name}}
                                    @endisset
                                </td>                          
                                <td><a class="btn btn-info" href="{{ route('user.show', $user->id)}}">{{ __('Show') }}</a></td>  
                                <td><a class="btn btn-success" href="{{ route('user.edit', $user->id)}}">{{ __('Edit') }}</a></td>  
                                <td>
                                    <form action="{{ route('user.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Remove') }}</button>
                                    </form>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
