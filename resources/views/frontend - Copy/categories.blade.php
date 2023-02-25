@include('frontend.header')



<div class="cart-wrapper">
    <div class="container">

        <!-- breadcrumb start  -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>
        <!-- breadcrumb end  -->

        <h1 class="text-center">All Categories</h1>

        <div class="subcategory">

            <h4 class="border-bottom pb-2 mb-4">
                <a href="{{ url('/category/power-supply-others') }}">Power Supply & others</a>
            </h4>
            <ul class="row">
                <li class="col-4">
                    <ul>
                        @foreach($sub_category as $key=>$subcategory)
                        <li>

                            <i class="bx bx-link "></i>
                            <a href="{{ url('/category/power-supply-others/' . $subcategory->sub_category_slug) }}"
                                class="text-dark">{{ $subcategory->sub_category_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <!-- <li class="col-4">
                    <a href="#" class="theme-color">Monitors</a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="bx bx-link "></i>
                                LCD Monitor
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bx bx-link "></i>
                                LCD Monitor
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>

            <h4 class="border-bottom pb-2 mb-4">
                <a href="{{ url('/category/networking-devices') }}">Networking Devices</a>
            </h4>
            

            <h4 class="border-bottom pb-2 mb-4">
                <a href="{{ url('/category/memory') }}">Memory</a>
            </h4>

            <h4 class="border-bottom pb-2 mb-4">
                <a href="{{ url('/category/storage-devices') }}">Storage Devices</a>
            </h4>
        </div>

    </div>
</div>

@include('frontend.footer')