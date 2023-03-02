@extends('admin.index')
@section('content')

<h3 class="my-4 text-center">Update Users Role</h3>
<div class="mt-4">
    <form method="post" action="{{ route('users.role.update') }}" >
        @csrf

        <input type="hidden" name="up_id" value="{{$usersroles->id}}" id="up_id" class="form-control">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="user_role">User Role</label>
                    <input type="text" name="user_role" value="{{$usersroles->user_role}}" id="user_role" class="form-control">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary update_setting">Update</button>
    </form>
</div>


@endsection