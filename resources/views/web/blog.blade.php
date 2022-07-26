@extends('web.layouts.app')

@section('content')

<section class="page-header py-3">
    <div class="container">
        <h2>Blog Page</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><span>Blog Page</span></li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="blog-one blog-two">
    <div class="container">
        <div class="row">
            @forelse ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-one__single mbt-60">
                        <div class="blog-one__image">
                            <img src="storage/{{$blog->image}}" alt="">
                            <div class="blog-hover-box">
                                <div class="box">
                                    <div class="icon-box">
                                        <a href="blog-details.html"><i class="far fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.blog-one__image -->
                        <div class="blog-one__content">
                            <div class="blog-one__meta">
                                <a href="#"><i class="far fa-calendar-alt"></i>{{$blog->created_at->format('j F, Y')}}</a>
                                <!-- <a href="#"><i class="far fa-comments"></i> 2 comments</a> -->
                            </div><!-- /.blog-one__meta -->
                            <h3><a href="blog-details.html">{{$blog->name}} </a></h3>
                            <div class="blog-one__text">
                                <p>{{Str::limit($blog->description,100,$end='....')}}</p>
                            </div>
                            <a href="blog-details.html" class="thm-btn blog-one__btn"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
            @empty
                <p>NO Bloges Yet</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
