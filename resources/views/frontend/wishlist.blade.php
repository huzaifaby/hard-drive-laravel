@include('frontend.header')


<div class="cart-wrapper">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <div class="row">
            <div class="col-md-12">
                <!-- table start  -->
                <div class="table-responsive">

                    <table class="table  table-borderless">
                        <thead class="border border-bottom border-0">
                        <tr>
                                <th></th>
                                <th></th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Stock Status</th>
                                <th></th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($wishlist_products as $key=>$wishlistproducts)
                            <tr>
                                <td class="align-middle"> <a class="remove_from_wishlist"
                                        data-id="{{ $wishlistproducts->wishlists_id }}" href="javascript: void(0);"><i
                                            class="bx bx-x fs-4 text-primary"></i></a> </td>
                                <td class="align-middle"><a
                                        href="product-detail/{{ $wishlistproducts->product_slug }}"><img
                                            src="{{ asset('image/products/'.$wishlistproducts->product_image) }}"
                                            loading="lazy" width="100" alt=""></a></td>
                                <td style="min-width:400px;" class="align-middle">
                                    <a href="product-detail/{{ $wishlistproducts->product_slug }}">
                                        <p class="mb-0">{{ $wishlistproducts->product_title }}</p>
                                    </a>
                                </td>
                                <td class="align-middle">${{ $wishlistproducts->product_price }}/-</td>
                                @if($wishlistproducts->availability == 0 )
                                <td class="align-middle">Out of Stock</td>
                                @else
                                <td class="align-middle">In Stock</td>
                                @endif
                                <td  class="align-middle"><a style="width:100px;font-size:14px;" href="product-detail/{{ $wishlistproducts->product_slug }}"
                                        class="square-block-btn">View Product</a></td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

                <!-- table end  -->
            </div>

        </div>

    </div>
</div>







<script>

</script>


@include('frontend.footer')