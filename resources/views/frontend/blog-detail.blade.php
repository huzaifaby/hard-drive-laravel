@include('frontend.header')


<div class="blog-wrapper bg-light mt-3">


    <!-- breadcrumb start  -->
    <div class="bg-light-blog py-3 mb-5">
        <div class="container" style="max-width:1140px !important;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- breadcrumb end  -->
    <div class="container mb-5" style="max-width:1140px !important;">
        <div class="blogs-container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="blog-detail border">
                        <div class="imgbx">
                            <img src="{{ asset('image/blogs/'.$blogs->blog_image) }}" loading="lazy" alt=""
                                class="img-fluid w-100">
                        </div>
                        <div class="content">
                            <h3 class="title">{{$blogs->blog_title}}</h3>
                            <ul class="post-meta ">
                                <li>
                                    <a href="#">
                                        <i class='bx bxs-calendar'></i>
                                        {{ $blogs->created_at->format('d M, Y') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxs-bullseye'></i>
                                        {{ $blogs->blog_views }} View(s)
                                    </a>
                                </li>
                                <li>
                                    <a href="http://{{$blogs->blog_source}}">
                                        <i class='bx bxs-chat'></i>
                                        Source: {{$blogs->blog_source}}
                                    </a>
                                </li>

                            </ul>

                            {!! $blogs->blog_description !!}

                            <div class="tag-social-link">
                                <!-- <div class="row"> -->
                                <div class="tags mb-2">
                                    <!-- <div class="d-flex"> -->
                                    <h6 class="title me-1">Tag: </h6>
                                    <?php
                                   $blog_tags = $blogs->blog_tags;
                                   $tags_array = explode(',', $blog_tags);
                                   $links = '';
                                   foreach ($tags_array as $tag) {
                                   $links .= "<a href='" . url('/blog/tag/' . $tag) . "'>" . trim($tag) . ",</a> ";
                                  }
                                   echo $links;
                                  ?>


                                    <!-- </div> -->
                                </div>
                                <div class="social">
                                    <ul class="d-flex">
                                        <li class="me-1">
                                            <a href="#"><i class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li class="me-1">
                                            <a href="#"><i class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li class="me-1">
                                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class='bx bx-plus'></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <aside class="blog-aside">
                        <div class="search-form">
                            <div>
                                <input type="text" class="searchBlog" name="search" placeholder="Search" required="">
                                <button type="submit" id="searchblog"><i class="bx bx-search"></i></button>
                            </div>
                        </div>
                        <div class="categori">
                            <h4 class="title">Categories</h4>
                            <span class="separator"></span>
                            <ul class="categori-list">
                                @foreach ($categories as $category)
                                <li>
                                    <a
                                        href="{{ url('/blog/category/' . str_replace(' ', '-', $category->blog_category)) }}">
                                        <span>{{ $category->blog_category }}</span>
                                        <span>({{ $category->post_count }})</span>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="categori">
                            <h4 class="title">Recent Post</h4>
                            <span class="separator"></span>
                            <ul class="post-list">

                                @foreach($recent_blogs as $key=>$recentblogs)
                                <li>
                                    <div class="post">
                                        <div class="post-img">
                                            <a href="{{ url('/blog-detail/' . $recentblogs->blog_slug) }}">
                                                <img style="width: 73px; height: 59px;"
                                                    src="{{ asset('image/blogs/'.$recentblogs->blog_image) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-details">
                                            <a href="{{ url('/blog-detail/' . $recentblogs->blog_slug) }}">
                                                <h4 class="post-title">
                                                    {{ $recentblogs->blog_title }}
                                                </h4>
                                            </a>
                                            <p class="date">
                                                {{ $recentblogs->created_at->format('M d - Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="categori">
                            <h4 class="title">Archive</h4>
                            <span class="separator"></span>
                            <ul class="categori-list">
                                @foreach ($archives as $monthYear => $posts)
                                <li>
                                    <a href="{{ url('/blog/archive/' . $monthYear )}}">
                                        <span>{{ $monthYear }}</span>
                                        <span>({{ count($posts) }})</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="categori">
                            <h4 class="title">Tags</h4>
                            <span class="separator"></span>
                            <ul class="tags-list">
                                <?php
                                   $blog_tags = $blogs->blog_tags;
                                   $tags_array = explode(',', $blog_tags);
                                   $links = '';
                                   foreach ($tags_array as $tag) {
                                   $links .= "
                                   <li>
                                   <a href='" . url('/blog/tag/' . $tag) . "'>" . trim($tag) . "</a>
                                   </li> ";
                                  }
                                   echo $links;
                                  ?>

                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


</div>

@include('frontend.footer')