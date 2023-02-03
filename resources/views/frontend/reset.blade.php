@include('frontend.sidebar-user-dashboard')


                <h4 class="pb-2 text-start fw-normal">Reset Password</h4>


                @if (session('errors'))
                    <div class="alert alert-danger">
                        {{ session('errors') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('reset.password') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <input type="password" name="current_password" id="current_password" placeholder="Current Password"
                        class="form-control shadow-none border-bottom border-0 rounded-0 mb-3">
                    <input type="password" placeholder="New Password" name="new_password" id="new_password"
                        class="form-control shadow-none border-bottom border-0 rounded-0 mb-3">
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation"
                        class="form-control shadow-none border-bottom border-0 rounded-0 mb-3">
                    <div class="col-2"><button class="square-block-btn" type="submit">Submit</button></div>
                </form>
                <!-- box end -->

            </div>
        </div>

    </div>
</div>

@include('frontend.footer')