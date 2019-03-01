<?php

if(!empty($threads))$msgsCounter = $threads->count();

?>


<div class="row account-nav">

    <div id="nav-icon1">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <ul id="headnav">

        <li class="rantevou"><a href="{{ url('/apointment') }}"><i class="icon gicon-sm-clock"></i><span>ΚΛΕΙΣΤΕ ΡΑΝΤΕΒΟΥ</span></a></li>

        <li class="noredirect">
            <a class="collapsed" href="javascript:void(0)">
                <i class="icon gicon-sm-chat"></i>
                @if($unreadMessages>0)
                <span class="notification-number">{{$unreadMessages}}</span>
                @endif
            </a>
        </li>

        <li id="notification-btn" class="noredirect">

            <a class="collapsed" href="javascript:void(0)">
                <i class="icon gicon-sm-bell"></i>
            </a>
            @if($unreadNotifications>0)
            <span class="notification-number">
                {{$unreadNotifications}}
            </span>
            @endif

        </li>

        <li><a href="{{ url('/faq') }}"><i class="icon gicon-sm-info"></i></a></li>

        <div class="dropdown">
            <button id="account" class="account btn btn-default simple" data-toggle="dropdown" aria-haspopup="true">
                <img src="{{url('/user/avatars/'.Auth::user()->userphoto)}}" alt="account" class="img-circle">
            </button>
            <div class="dropdown-menu right" aria-labelledby="account">

                <div class="account-info">
                    <img src="{{url('/user/avatars/'.Auth::user()->userphoto)}}" alt="account" class="img-circle">
                    <p>{{ Auth::user()->name }}</p>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="account-links">
                    <a href="{{ url('/users/'.Auth::user()->id.'/editprofile') }}"><i class="icon gicon-my-profile-edit"></i>Edit Profile</a>
                    <div class="logout">
                        <div class="btn-orange pull-right"><a href="{{ url('/auth/logout') }}">Sign Out</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>

    </ul>

    <div class="clearfix"></div>
</div>

<div class="row head-drawer-wrapper">

    @include('partials.errors')

    <div class ="head-drawer collapse" id="messages">
        @if($mthreads->count() > 0)
        @foreach($mthreads as $mk => $thread)
        <?php if($mk<2):?>
        <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
        <div class="msg media alert {!!$class!!}">
            <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
            <p>{!! str_limit($thread->latestMessage->body, $limit = 150, $end = '...') !!}</p>
            <p><small><strong>From:</strong> {!! $thread->creator()->name !!}</small></p>
            <p>{!! link_to('messages/' . $thread->id, 'Read More') !!}</p>
        </div>
        <?php endif;?>
        @endforeach
        @else
        <!--<p>Sorry, no threads.</p>-->
        @endif
        <div class="msg-footer">
            @if($mthreads->count()-2>0)
            <p class="pull-left">You have <?php echo $mthreads->count()-2;?> more unread messages.</p>
            @endif
            <div class="btn-orange pull-right"><a href="{{ url('/messages') }}">View All</a></div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class ="head-drawer collapse" id="alerts">
        <div class="messages">

            @if($mnotifications->count() > 0)
            @foreach($mnotifications as $mk => $thread)
            <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>

            <div class="alert alert-msg alert-msg-{{$thread->subject}} fade in">
                <a href="#" data-notid="{{$thread->latestMessage->id}}" class="close readNotification" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="icon gicon-alert-msgs-{{$thread->subject}}"></i>
                <p>{{$thread->subject}}! {!! str_limit($thread->latestMessage->body, $limit = 150, $end = '...') !!}</p>
            </div>

            @endforeach
            @else
            <!--<p>Sorry, no threads.</p>-->
            @endif

            <div class="msg-footer">
                <div class="btn-orange pull-right"><a href="{{ url('/notifications') }}">View All</a></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


</div>




<script>

    $(document).ready(function(){

        $('.readNotification').click(function(){
            
            $.ajax({url: "{{url('notifications')}}/"+$(this).data('notid'), success: function(result){
                    //$("#div1").html(result);
                   }});
        });

    });

</script>