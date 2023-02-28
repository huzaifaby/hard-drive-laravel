@include('frontend.header')

<style>
    .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #ff5500;
border:none;
}


</style>


<div class="blog-wrapper bg-light mt-3">


    <!-- breadcrumb start  -->
    <div class="bg-light-blog py-3 mb-5">
        <div class="container" style="max-width:1140px !important;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- breadcrumb end  -->
    <div class="container mb-5" style="max-width:1140px !important;">
        <div class="blogs-container">
            <div class="row">
                @foreach($data as $key=>$blog)
                <div class="col-md-4 mb-3">
                    <div class="single-blog ">
                        <div class="imgbx">
                        <a href="{{ url('/blog-detail/' . $blog->blog_slug) }}">
                            <img src="{{ asset('image/blogs/'.$blog->blog_image) }}" loading="lazy"
                                alt=""  class="img-fluid">
                                </a>
                            <div class="date d-flex justify-content-center">
                                <div class="box align-self-center">
                                    <p>{{ $blog->created_at->format('d') }}</p>
                                    <p>{{ $blog->created_at->format('M') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                        <a href="{{ url('/blog-detail/' . $blog->blog_slug) }}">
                            <h4>{{ $blog->blog_title }}</h4>
                            </a>
                            <p>{!! substr($blog->blog_description, 0, 150) . '...' !!}</p>
                            <div class="blog-btn">
                                <a href="{{ url('/blog-detail/' . $blog->blog_slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            

            <div class="page-center text-center">
               
                {!! $data->links() !!}
                    <!-- <li class="disabled">
                        <span>«</span>
                    </li>
                    <li class="active">
                        <span>1</span>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#" rel="next">»</a>
                    </li> -->
              
            </div>
        </div>
    </div>

    <section class="footer-top">
        <div class="container" style="max-width:1140px !important">
            <div class="row">
                <div class="col-lg-4">
                    <h4>We’re Always Here To Help</h4>
                    <p>Reach out to us through any of these support channels</p>
                </div>
                <div class="col-lg-2">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <h4>
                                    <i class='bx bx-info-circle'></i>
                                </h4>
                            </div>
                            <div class="col-9">
                                <span>
                                    HELP CENTER
                                </span>
                                <h4>
                                    help.gaahak.pk
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <h4>
                                    <i class='bx bxs-envelope'></i>
                                </h4>
                            </div>
                            <div class="col-9">
                                <span>
                                    EMAIL SUPPORT
                                </span>
                                <h4>
                                    info@gaahak.pk
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <h4>
                                    <i class='bx bxs-phone'></i>
                                </h4>
                            </div>
                            <div class="col-9">
                                <span>
                                    PHONE SUPPORT
                                </span>
                                <h4>
                                    (000) - (000) - (000)
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2">
                    <a href="#">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <h4>
                                    <i class='bx bxl-whatsapp'></i>
                                </h4>
                            </div>
                            <div class="col-9">
                                <h4 class="mt-7">
                                    Whatsapp Us
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@include('frontend.footer')