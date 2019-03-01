<div class="iso-message">
    <div class="iso-message-head">
        <div class="col-sm-10 col-xs-12">
            <img width="100" src="{{url('/user/avatars/'.$message->user->userphoto)}}" alt="{!! $message->user->name !!}" class="img-circle pull-left">
            <p class="msg-info pull-left"><b>{!! $message->user->name !!}</b><br>{!! $message->created_at->diffForHumans() !!}, at 12:45 AM</p>

        </div>
        <div class="col-sm-2 col-xs-12 text-center pull-right">
            {!! Form::open(['route' => ['messages.delete', $message->id], 'method' => 'DELETE']) !!}
            <div class="btn btn-delete">
<!--                <a href="javascript:submit();" >Delete</a>-->
                <button type="submit">Delete</button>
            </div>
            
            {!! Form::close() !!}
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="iso-message-body top30">

        

        <div class="col-xs-12">
            <p>{!! $message->body !!}</p>
        </div>
        <div class="clearfix"></div>
    </div>

</div>