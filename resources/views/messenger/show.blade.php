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


    <div class="col-xs-12">
    <h2>Reply - new message</h2>
    {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
    <!-- Message Form Input -->
    <div class="form-group">
        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    </div>


    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    </div>
</div>


@endsection




