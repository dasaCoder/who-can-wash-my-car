@extends('web.layouts.app')

@section('content')

<section class="page-header py-3">
    <div class="container">
        <h2>Blog View</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><span>Blog Page</span></li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details__main">
                    <div class="blog-details__image">
                        <img class="w-100 border-18" src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->image}}">
                    </div><!-- /.blog-details__image -->
                    <div class="blog-details__content">
                        <div class="blog-one__meta">
                            <a href="#"><i class="far fa-calendar-alt"></i> {{$blog->created_at->format('j F, Y')}}</a>
                            <!-- <a href="#"><i class="far fa-comments"></i> 2 comments</a> -->
                        </div><!-- /.blog-one__meta -->
                        <h3 class="text-base-100">{{$blog->name}}</h3>
                        <p>{!!$blog->description!!}
                    </div><!-- /.blog-details__content -->
                    <div class="blog-details__meta d-flex justify-content-end">
                        <div class="blog-details__share">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#" class="color-1"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="color-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="color-3"><i class="fab fa-pinterest-p"></i></a>
                        </div><!-- /.blog-details__share -->
                    </div><!-- /.blog-details__meta -->
                </div><!-- /.blog-details__main -->

                <div class="comment-one">
                    <h3 class="comment-one__block-title">2 Comments</h3><!-- /.comment-one__block-title -->
                    <div class="comment-one__single">
                        <div class="comment-one__image">
                            <img src="assets/images/users/user.png" alt="">
                        </div><!-- /.comment-one__image -->
                        <div class="comment-one__content">
                            <h3>Eugenia Floyd</h3>
                            <p class="comment-one__date">20 Mar, 2020 <span>.</span> 4:00 pm</p>
                            <p>Lorem Ipsum is simply dummy free text of the available printing and typesetting
                                been the
                                industry standard dummy text ever sincer condimentum purus.</p>
                        </div><!-- /.comment-one__content -->
                        <!--                                <a href="#" class="thm-btn comment-one__btn"><span>Reply</span></a>-->
                        <!-- /.thm-btn comment-one__btn -->
                    </div><!-- /.comment-one__single -->
                    <div class="comment-one__single">
                        <div class="comment-one__image">
                            <img src="assets/images/users/user.png" alt="">
                        </div><!-- /.comment-one__image -->
                        <div class="comment-one__content">
                            <h3>Nellie Hanson</h3>
                            <p class="comment-one__date">20 Mar, 2020 <span>.</span> 4:00 pm</p>
                            <p>Lorem Ipsum is simply dummy free text of the available printing and typesetting
                                been the
                                industry standard dummy text ever sincer condimentum purus.</p>
                        </div><!-- /.comment-one__content -->
                        <!--                                <a href="#" class="thm-btn comment-one__btn"><span>Reply</span></a>-->
                        <!-- /.thm-btn comment-one__btn -->
                    </div><!-- /.comment-one__single -->
                </div><!-- /.comment-one -->
                <div class="comment-form">
                    <h3 class="comment-one__block-title">Leave a Comment</h3><!-- /.comment-one__block-title -->
                    <form action="inc/sendemail.php" class="contact-form-validated contact-one__form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your name" name="name">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <input type="text" placeholder="Email Address" name="email">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <input type="text" placeholder="Phone number" name="website">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <input type="text" placeholder="Subject" name="subject">
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-12">
                                <textarea placeholder="Write Message" name="message"></textarea>
                            </div><!-- /.col-lg-12 -->
                            <div class="col-lg-12 text-left">
                                <button type="submit" class="thm-btn contact-one__btn"><span>Submit
                                                Comment</span></button>
                                <!-- /.thm-btn contact-one__btn -->
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                    </form><!-- /.contact-one__form -->
                </div><!-- /.comment-form -->
            </div><!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="#" class="sidebar__search-form blog-search-form">
                            <input type="text" name="search" placeholder="Search here...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- /.sidebar__single -->
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Latest Posts</h3><!-- /.sidebar__title -->
                        <div class="sidebar__post-wrap">
                            <div class="sidebar__post__single">
                                <div class="sidebar__post-image">
                                    <div class="inner-block"><img src="https://www.miltonscene.com/wp-content/uploads/2021/02/blog.jpg"
                                                                  alt="Awesome Image" /></div>
                                    <!-- /.inner-block -->
                                </div><!-- /.sidebar__post-image -->
                                <div class="sidebar__post-content">
                                    <h4 class="sidebar__post-title"><a href="#">Pre launch Mobile App Marketing
                                            Pitfalls</a></h4>
                                    <!-- /.sidebar__post-title -->
                                </div><!-- /.sidebar__post-content -->
                            </div><!-- /.sidebar__post__single -->
                            <div class="sidebar__post__single">
                                <div class="sidebar__post-image">
                                    <div class="inner-block"><img src="https://www.miltonscene.com/wp-content/uploads/2021/02/blog.jpg"
                                                                  alt="Awesome Image" /></div>
                                    <!-- /.inner-block -->
                                </div><!-- /.sidebar__post-image -->
                                <div class="sidebar__post-content">
                                    <h4 class="sidebar__post-title"><a href="#">Pre launch Mobile App Marketing
                                            Pitfalls</a></h4>
                                    <!-- /.sidebar__post-title -->
                                </div><!-- /.sidebar__post-content -->
                            </div><!-- /.sidebar__post__single -->
                            <div class="sidebar__post__single">
                                <div class="sidebar__post-image">
                                    <div class="inner-block"><img src="https://www.miltonscene.com/wp-content/uploads/2021/02/blog.jpg"
                                                                  alt="Awesome Image" /></div>
                                    <!-- /.inner-block -->
                                </div><!-- /.sidebar__post-image -->
                                <div class="sidebar__post-content">
                                    <h4 class="sidebar__post-title"><a href="#">Pre launch Mobile App Marketing
                                            Pitfalls</a></h4>
                                    <!-- /.sidebar__post-title -->
                                </div><!-- /.sidebar__post-content -->
                            </div><!-- /.sidebar__post__single -->
                            <div class="sidebar__post__single">
                                <div class="sidebar__post-image">
                                    <div class="inner-block"><img src="https://www.miltonscene.com/wp-content/uploads/2021/02/blog.jpg"
                                                                  alt="Awesome Image" /></div>
                                    <!-- /.inner-block -->
                                </div><!-- /.sidebar__post-image -->
                                <div class="sidebar__post-content">
                                    <h4 class="sidebar__post-title"><a href="#">Pre launch Mobile App Marketing
                                            Pitfalls</a></h4>
                                    <!-- /.sidebar__post-title -->
                                </div><!-- /.sidebar__post-content -->
                            </div><!-- /.sidebar__post__single -->
                        </div><!-- /.sidebar__post-wrap -->
                    </div><!-- /.sidebar__single -->

                </div><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog-details -->

@endsection
