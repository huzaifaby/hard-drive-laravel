<table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Coupon type</th>
                        <th scope="col">Coupon amount</th>
                        <th scope="col">Expiry Date</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $key=>$coupon)
                    <tr>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td>{{ $coupon->discount_type }}</td>
                        <td>{{ $coupon->coupon_amount }}</td>
                        <td>{{ $coupon->coupon_expiry_date }}</td>
                        <td>
                            <a href="edit-coupon/{{ $coupon->id }}" class="btn btn-success">
                                <i class="fas fa-edit"></i></a>

                            <a href="" data-id="{{ $coupon->id }}" class="btn btn-danger delete_coupon">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $coupons->links() !!}