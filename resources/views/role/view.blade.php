@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Show Role') }}</h2></div>
                <div class="card-body">
                    <div class="container">
                        <h3>{{ __('Required data') }}</h3>    
                        <div class="form-group">                            
                            <input 
                                type="text"
                                class="form-control" 
                                id="name" 
                                placeholder="Name"
                                name="name"
                                value="{{ old('name', $role->name)}}"
                                readonly
                            >
                        </div>
                        <div class="form-group">                            
                            <input 
                                type="text" 
                                class="form-control" 
                                id="slug" 
                                placeholder="Slug"
                                name="slug"
                                value="{{ old('slug', $role->slug)}}"
                                readonly
                            >
                        </div>
                        <div class="form-group">                   
                            <textarea
                                class="form-control"
                                placeholder="Description"
                                name="description"
                                id="description"
                                rows="3"
                                readonly
                            >{{ old('description', $role->description)}}</textarea>
                        </div>    
                        <hr>
                        <h3>{{ __('Full Access') }}</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                disabled
                                type="radio" 
                                id="full_access_yes" 
                                name="full_access" 
                                class="custom-control-input" 
                                value="yes"
                                @if ( $role->full_access == "yes") 
                                checked 
                                @elseif (old('full_access') == "yes") 
                                checked 
                                @endif
                            >
                            <label class="custom-control-label" for="full_access_yes">{{ __('Yes') }}</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                disabled
                                type="radio" 
                                id="full_access_no" 
                                name="full_access" 
                                class="custom-control-input" 
                                value="no"
                                @if ( $role->full_access == "no") 
                                checked 
                                @elseif (old('full_access') == "no") 
                                checked 
                                @endif
                            >
                            <label class="custom-control-label" for="full_access_no">{{ __('NO') }}</label>
                        </div>
                        <hr>

                        <h3>{{ __('Permission List') }}</h3>
                            @foreach($permissions as $permission)                              
                            <div class="custom-control custom-checkbox">
                                <input
                                    disabled
                                    type="checkbox" 
                                    class="custom-control-input" 
                                    id="permission_{{$permission->id}}"
                                    value="{{$permission->id}}"
                                    name="permission[]"
                                    @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                                    checked
                                    @elseif( is_array($permission_role) && in_array("$permission->id", $permission_role)    )
                                    checked
                                    @endif
                                >
                                <label class="custom-control-label" 
                                    for="permission_{{$permission->id}}">
                                    {{ $permission->id }} - {{ $permission->name }} <em>( {{ $permission->description }} )</em>                                    
                                </label>
                            </div>   
                            @endforeach
                        <hr>
                        <a class="btn btn-success" href="{{route('role.edit', $role->id)}}">{{ __('Edit') }}</a>
                        <a class="btn btn-danger" href="{{route('role.index')}}">{{ __('Back') }}</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
