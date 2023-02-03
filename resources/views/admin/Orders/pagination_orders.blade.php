<table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key=>$order)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td><img src="{{ asset('image/products/'.$order->product_image) }}" height="100px"
                                width="100px"></td>

                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="{{ $order->product_id }}"
                                data-title="{{ $order->product_title }}" data-price="{{ $order->product_price }}"
                                data-sku="{{ $order->product_sku }}"
                                data-condition="{{ $order->product_condition }}"
                                data-description="{{ $order->product_description }}"
                                data-slug="{{ $order->product_slug }}"
                                data-metatitle="{{ $order->product_meta_title }}"
                                data-metadescription="{{ $order->product_meta_description }}"
                                data-categoryname="{{ $order->category_name }}"
                                data-categoryid="{{ $order->category_id }}"
                                data-brandname="{{ $order->brand_name }}"
                                data-brandid="{{ $order->brand_id }}"
                                data-availability="{{ $order->availability }}"
                                data-quantity="{{ $order->quantity }}"
                                class="btn btn-success update_product_form">
                                <i class="fas fa-edit"></i></a>
                      
                            @if($order->is_featured == 0 )
                            <a href="" data-id="{{ $order->product_id }}" data-featured="1"
                                class="btn btn-danger featured_product">
                                <i class="las la-check-circle text-white"></i></a>
                              @else
                              <a href="" data-id="{{ $order->product_id }}" data-featured="0"
                                class="btn btn-success featured_product">
                                <i class="las la-clock text-white"></i></a>
                           @endif

                          

                        <a href="" data-id="{{ $order->product_id }}" class="btn btn-danger delete_product mt-2">
                            <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $orders->links() !!}