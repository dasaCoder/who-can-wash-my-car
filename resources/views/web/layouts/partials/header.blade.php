<header class="site-header-one stricky site-header-one__fixed-top">
    <div class="container-fluid">
        <div class="site-header-one__logo">
            <a href="index.html">
                <img src="{{asset('web/images/logo-1-1.png')}}" width="129" alt="logo">
            </a>
            <span class="side-menu__toggler"><i class="fa fa-bars"></i></span><!-- /.side-menu__toggler -->
        </div><!-- /.site-header-one__logo -->
        <div class="main-nav__main-navigation custom-nav-dropdown d-xl-flex justify-content-between">
            <ul class="main-nav__navigation-box one-page-scroll-menu">
                <li class="scrollToLink">
                    <a href="{{url('')}}">Home</a>
                </li>
                <li class="scrollToLink"><a href="index.html#services">Services</a></li>
                <li class="scrollToLink"><a href="{{url('care-packeges')}}">Care Packages</a></li>
                <li class="dropdown  scrollToLink">
                    <a>More</a>
                    <ul>
                        <li><a href="index.html#partners">Partners</a></li>
                        <li><a href="{{url('faq')}}">About Us</a></li>
                        <li><a href="{{url('blog')}}">Blog</a></li>
                        <li><a href="index.html#contactUs">Contact Us</a></li>
                    </ul>
                </li>
            </ul><!-- /.main-nav__navigation-box -->

            <ul class="main-nav__navigation-box one-page-scroll-menu ml-auto">
                <li class="scrollToLink">
                    <a href="{{url('book-servicce')}}" class="thm-btn nav-book-btn"><span>Book Online</span></a>
                </li>
                <li class="dropdown scrollToLink login-link">
                    <a href="login.html" class="d-flex align-items-center">
                        <div class="nav-circle-img mr-2">
                            <img src="web/images/users/user.png" alt="user-img">
                        </div>
                        Login
                    </a>
                    <ul>
                        <li><a href="pro-partner-profile.html">My profile</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.main-nav__main-navigation -->
    </div><!-- /.container-fluid -->
</header><!-- /.site-header-one -->
