@extends('admin.index')
@section('content')

<h3 class="my-4 text-center">Add Users</h3>
<div class="mt-4">
    <form method="post" action="{{ route('users.save') }}" id="updateSettingForm" enctype="multipart/form-data">
        @csrf

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
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="role_id">User Role</label>
                    <select class="form-select" name="role_id" id="role_id">
                    <option value="" hidden>Select</option>
                        @foreach($UserRole as $key=>$UserRoles)
                        <option value="{{$UserRoles->id}}">{{$UserRoles->user_role}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>






        <button type="submit" class="btn btn-primary update_setting">Save</button>
    </form>
</div>


@endsection