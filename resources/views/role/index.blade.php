@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('List of Roles') }}</h2></div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                          <a href="{{route('role.create')}}" class="btn btn-primary">{{ __('Create Role') }}</a>
                        </div>
                    </div>
                    @include('custom.message')

                    <table class="table table-bordered table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Slug') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Full Access') }}</th>
                                <th colspan="3">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id}}</th>
                                <td>{{ $role->name}}</td>
                                <td>{{ $role->slug}}</td>
                                <td>{{ $role->description}}</td>
                                <td>{{ $role->full_access}}</td>                            
                                <td><a class="btn btn-info" href="{{ route('role.show',$role->id)}}">{{ __('Show') }}</a></td>  
                                <td><a class="btn btn-success" href="{{ route('role.edit',$role->id)}}">{{ __('Edit') }}</a></td>  
                                <td>
                                    <form action="{{ route('role.destroy', $role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Remove') }}</button>
                                    </form>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
