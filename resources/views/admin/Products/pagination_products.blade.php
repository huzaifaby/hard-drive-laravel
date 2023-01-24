<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key=>$product)
                            <tr>
                                <th>{{ $key+1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->detail }}</td>
                                <td>
                                    <a href=""
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-detail="{{ $product->detail }}"
                                    class="btn btn-success update_product_form">
                                    <i class="las la-edit"></i></a>

                                    <a href=""
                                    data-id="{{ $product->id }}"
                                     class="btn btn-danger delete_product">
                                     <i class="las la-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}