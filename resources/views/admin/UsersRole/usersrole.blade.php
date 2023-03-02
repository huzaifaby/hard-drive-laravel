@extends('admin.index')
@section('content')


<h1 class="mt-4">Users Role</h1>
<div class="mb-4 bg-light text-end p-2">
    <a href="{{ route('users.role.add') }}" class="btn btn-success ">Add User Role</a>


</div>
<div class="card mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userrole as $key=>$userroles)
                    <tr>
                    <th>{{ $key+1 }}</th>
                        <td>{{ $userroles->user_role }}</td>
                        <td>
                            <a href="{{ url('dashboard/edit-users-role/' . $userroles->id) }}" class="btn btn-success">
                                <i class="fas fa-edit"></i></a>

                            <a href="" data-id="{{ $userroles->id }}" class="btn btn-danger delete_users_role">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $userrole->links() !!}
        </div>
    </div>
</div>

@include('admin.UsersRole.users_role_js')
@endsection