<table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key=>$customer)
                    <tr>
                           <td>{{ $customer->full_name }}</td>
                           <td>{{ $customer->email }}</td>
                           <td>{{ $customer->phone_no }}</td>
                           <td>{{ $customer->address }}</td>
                            <td>
                                <a href="edit-customers/{{ $customer->id }}" class="btn btn-success">
                                    <i class="fas fa-edit"></i></a>

                                <a href="" data-id="{{ $customer->id }}" class="btn btn-danger delete_customers">
                                    <i class="las la-trash-alt"></i></a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $customers->links() !!}