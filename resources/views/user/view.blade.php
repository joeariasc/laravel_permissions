@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('User: ') . $user->name }} </h2></div>
                <div class="card-body">
                    <div class="container">
                        <h3> {{ __('Details') }} </h3>
                        <div class="form-group">                            
                            <input 
                                type="text" 
                                class="form-control" 
                                id="name" 
                                placeholder="Name"
                                name="name"
                                value="{{ old('name', $user->name)}}"
                                disabled
                            >
                        </div>
                        <div class="form-group">                            
                            <input 
                                type="text" 
                                class="form-control" 
                                id="email" 
                                placeholder="email"
                                name="email"
                                value="{{ old('email' , $user->email)}}"
                                disabled
                            >
                        </div>
                        
                        <div class="form-group">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="roles" 
                                name="roles"
                                value="{{ isset($user->roles[0]->name) ? $user->roles[0]->name : __('Unassigned Role') }}"
                                disabled
                            >
                        </div>
                        <hr>
                        <a class="btn btn-success" href="{{route('user.edit', $user->id)}}">{{ __('Edit') }}</a>
                        <a class="btn btn-danger" href="{{route('user.index')}}">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection