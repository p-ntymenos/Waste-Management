@extends('app')

@section('content')
<div class="col-md-6">
    <h1>{!! $thread->subject !!}</h1>

    @foreach($thread->messages as $message)


    @include('messenger.showsingle')
    @endforeach

    <div class="iso-message-footer top30">
        <div class="col-xs-12">
            <div class="btn btn-blue"><a href="{{url('messages')}}">Όλα τα μηνύματα</a></div>
        </div>
    </div>



</div>


@endsection




