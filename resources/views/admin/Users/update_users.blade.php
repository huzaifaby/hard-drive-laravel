@extends('admin.index')
@section('content')

<h3 class="my-4 text-center">Update Users</h3>
<div class="mt-4">
    <form method="post" action="{{ route('users.update') }}" id="updateSettingForm" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="up_id" value="{{$users->users_id}}" id="up_id" class="form-control">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" value="{{$users->name}}"  id="name" class="form-control">
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$users->email}}" id="email" class="form-control">
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" value="{{$users->password}}" id="password" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="role_id">User Role</label>
                    <select class="form-select" name="role_id" id="role_id">
                        <option value="{{$users->id}}" hidden>{{$users->user_role}}</option>
                        @foreach($UserRole as $key=>$UserRoles)
                        <option value="{{$UserRoles->id}}">{{$UserRoles->user_role}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary update_setting">Update</button>
    </form>
</div>


@endsection