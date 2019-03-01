@extends('app')

@section('content')
@if (Session::has('error_message'))
<div class="alert alert-danger" role="alert">
    {!! Session::get('error_message') !!}
</div>
@endif



<div class="section top25">
    <div class="col-xs-12">
        <div class="notif-wrapper">

            @if($threads->count() > 0)
            @foreach($threads as $thread)
            <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
            <div class="media alert {!!$class!!}">
                <h4 class="media-heading">{!! link_to('notifications/' . $thread->id, $thread->subject) !!}</h4>
                <p>{!! str_limit($thread->latestMessage->body, $limit = 150, $end = '...') !!}</p>

                <p><small><strong>Creator:</strong> {!! $thread->creator()->name !!}</small></p>
                <p><small><strong>Participants:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p>
            </div>
            
            <h4 class="notif-title">Today</h4>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <i class="icon gicon-alert-msgs-info"></i><span class="info">General!</span>
                </div>
                <div class="col-md-7 col-xs-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda quia asperiores sequi suscipit, quasi soluta odio nobis, esse.</p>
                </div>
                <div class="col-md-3 col-xs-12">
                    <p class="notif-date">Apr 6, 2016 18 mins ago</p>
                </div>
            </div>
            <hr>
            
            @endforeach
            @else

            @endif

            
            <div class="row">
                <div class="col-xs-2">
                    <i class="icon gicon-alert-msgs-success"></i><span class="success">Success!</span>
                </div>
                <div class="col-xs-7">
                    <p>This is a success placed text message.</p>
                </div>
                <div class="col-xs-3">
                    <p class="notif-date">Apr 6, 2016 55 mins ago</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-2">
                    <i class="icon gicon-error-95"></i><span class="error">Error!</span>
                </div>
                <div class="col-xs-7">
                    <p>This is an error placed text message.</p>
                </div>
                <div class="col-xs-3">
                    <p class="notif-date">Apr 6, 2016 3 hours ago</p>
                </div>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="table-pagination">
                <div class="col-sm-6 col-xs-12">
                    <p>Showing <span>1</span> to <span>11</span> of <span>2098</span> entries</p>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="table-pagination-nav pull-right">
                        <a href="#" class="arrow-left"><i class="icon gicon-arrow-down"></i><span class="prev">Previous</span></a>
                        <span class="pages"><a href="#">1</a><a href="#">2</a><a href="#">3</a></span>
                        <a href="#" class="arrow-right"><span class="next">Next</span><i class="icon gicon-arrow-down"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>    
</div>


@endsection



