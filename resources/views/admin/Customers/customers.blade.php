@extends('admin.index')
@section('content')


<h1 class="mt-4">Customers Tables</h1>
<div class="mb-4 bg-light text-end p-2">
    <a href="{{ route('customers.export') }}" class="btn btn-success">Export</a>


</div>
<div class="card mb-4">
    <div class="card-header">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Here...">
    </div>
    <div class="card-body">
        <div class="table-data">
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
        </div>
    </div>
</div>

@include('admin.Customers.customers_js')
@endsection