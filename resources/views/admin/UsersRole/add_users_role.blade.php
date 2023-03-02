@extends('admin.index')
@section('content')

<h3 class="my-4 text-center">Add Users Role</h3>
<div class="mt-4">
    <form method="post" action="{{ route('users.role.save') }}">
        @csrf


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="user_role">User Role</label>
                    <input type="text" name="user_role" id="user_role" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary update_setting">Save</button>
    </form>
</div>


@endsection