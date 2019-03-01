
@extends('app')

@section('content')


<div class="row breadcrumps">
    <div class="col-xs-12">
        <p><i class="icon gicon-envelope-90"></i>Μηνύματα</p>
    </div>
</div>

<div class="section no-bt-padding">
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <h4 class="sec-head no-icon">ΜΗΝΥΜΑΤΑ</h4>
        </div>
        <div class="col-sm-6 col-xs-12">
            <a class="newnotification pull-right" href="{{url('/adminmessages/create')}}">ΔΗΜΙΟΥΡΓΙΑ ΜΗΝΥΜΑΤΟΣ</a>
        </div>
    </div>
</div>


<div class="section top25">
    <div class="row">
        <div class="col-xs-12">
            <div class="table-full-wrapper table-border">

                <div class="filters">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="perpage">
                                <select>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                                <span>Καταχωρήσεις</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="search">
                                <form action="#">
                                    <input type="text" placeholder="Αναζήτηση">
                                    <input type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="tab-pane fade in active">

                        <div class="table-responsive">
                            <table class="table table-hover messages-table">
                                <thead>
                                    <tr>
                                        <th>Μήνυμα</th>
                                        <th>Χρήστης</th>
                                        <th>Ομάδα Παραλήπτη</th>
                                        <th>Στάλθηκε</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--
<tr>
<td><b>Subject title is placed here.</b><br>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam repellendus deleniti sint voluptatem alias. Explicabo.</td><td>
</td><td>Regional<br>Subregional<br></td>
<td>15 mins ago, at 12:45 PM</td>
</tr>
-->

                                    @if($threads->count() > 0)
                                    @foreach($threads as $thread)
                                    <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
                                    @if(false)
                                    <div class="media alert {!!$class!!}">
                                        <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                                        <p>{!! str_limit($thread->latestMessage->body, $limit = 150, $end = '...') !!}</p>

                                        <p><small><strong>Creator:</strong> {!! $thread->creator()->name !!}</small></p>
                                        <p><small><strong>Participants:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p>
                                    </div>
                                    @endif

                                    <tr>
                                        <td>
                                            <b>{!! link_to('messages/' . $thread->id, $thread->subject) !!}</b><br>
                                            {!! str_limit($thread->latestMessage->body, $limit = 150, $end = '...') !!}
                                        </td>

                                        <td>
                                            {!! $thread->participantsString(Auth::id()) !!}
                                        </td>

                                        <td> {!! $thread->participantsString(Auth::id()) !!}<br></td>

                                        <td>{!! $thread->created_at->diffForHumans() !!}, at {{ date('F d, Y H:i', strtotime($thread->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <p>Sorry, no threads.</p>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="table-pagination">
                                <div class="col-sm-6 col-xs-12">
<!--
                                    <p>Showing 
                                        <span>

                                        </span> to 
                                        <span>

                                        </span> of 
                                        <span>

                                        </span> entries
                                    </p>
-->
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <!--<div class="table-pagination-nav">
<a href="#" class="arrow-left"><i class="icon gicon-arrow-down"></i><span class="prev">Previous</span></a>
<span class="pages"><a href="#">1</a><a href="#">2</a><a href="#">3</a></span>
<a href="#" class="arrow-right"><span class="next">Next</span><i class="icon gicon-arrow-down"></i></a>
</div>-->

                                    {!! (new App\Pagination($threads))->render() !!}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>







@if(false)
@if (Session::has('error_message'))
<div class="alert alert-danger" role="alert">
    {!! Session::get('error_message') !!}
</div>
@endif
@if($threads->count() > 0)
@foreach($threads as $thread)
<?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
<div class="media alert {!!$class!!}">
    <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
    <p>{!! str_limit($thread->latestMessage->body, $limit = 150, $end = '...') !!}</p>

    <p><small><strong>Creator:</strong> {!! $thread->creator()->name !!}</small></p>
    <p><small><strong>Participants:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p>
</div>
@endforeach
@else
<p>Sorry, no threads.</p>
@endif
@endif

@stop







