@extends('admin.index')
@section('content')


<h1 class="mt-4">Users Table</h1>
<div class="mb-4 bg-light text-end p-2">
    <a href="{{ route('users.add') }}" class="btn btn-success ">Add Users</a>


</div>
<div class="card mb-4">
    <div class="card-header">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Here...">
    </div>
    <div class="card-body">
        <div class="table-data table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_role }}</td>
                        <td>
                            <a href="{{ url('dashboard/edit-users/' . $user->users_id) }}" class="btn btn-success">
                                <i class="fas fa-edit"></i></a>

                            <a href="" data-id="{{ $user->users_id }}" class="btn btn-danger delete_users">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
</div>

@include('admin.Users.users_js')
@endsection