<<<<<<< HEAD
<div class="row darkBackground">
    <!-- Logo -->
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4" style="padding:5px 10px;">
        <a class="gorillaLogo" href="{{ url('/dashboard') }}">
            <img class="ElImage ElImgNoBack" width="67" src="{{ asset('/images/gorilla_app_gorillaform-img.png') }}">
            <b>Gorilla</b>
        </a>
    </div>
    <!-- Header Infos -->
    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-8">
        <div id="headerInfos">
            @if (!Auth::guest())
                <div class="blog">
                    <a href="#"><img src="{{ asset('/images/blog.svg') }}" /></a>
                </div>
                <div class="bell">
                    <a href="#">
                        <span id="notificationBell">2</span>
                        <img src="{{ asset('/images/bell.svg') }}" /></a>
                </div>
                <div class="faq">
                    <a href="#"><img src="{{ asset('/images/faq.svg') }}" /></a>
                </div>
                <div class="user">
                    <a href="#"><img src="{{ asset('/images/user.svg') }}" /></a>
                </div>
            @endif
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/users/'.Auth::user()->id.'/edit') }}">Edit profile</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- End Header Infos -->
</div>
=======
<div class="container-fluid">
    <div class="row">
        <?php if (0 && !isset($_COOKIE['notifications'])): ?>
        <div class="notifications">
            <div class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Welcome <span class="username">“<?php echo Auth::user()->username;?>”</span> ! Please make sure to check and print your ABPs Report before logging out as it is due on the <span class="date">12/05/2016</span>.
            </div>
            <?php setcookie('notifications', true,  time()+(3600)); // 86400 = 1 day ?>
        </div>
        <?php endif; ?>
    </div>
</div>

>>>>>>> newGorilla
