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