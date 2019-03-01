<div class="col-lg-6">
    @include('partials.errors')
    <div class="form-group">
        <label for="name">Name</label>
        {!! Form::text('name',null,['class'=> 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        {!! Form::text('email',null,['class'=> 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="name">Username</label>
        {!! Form::text('username',null,['class'=> 'form-control']) !!}
    </div>
<<<<<<< HEAD
    @if(Auth::user()->hasRole('admin'))
        <div class="input-group">
                        <span class="input-group-addon">
                            {!! Form::radio('status', 1,(isset($user) && $user->status) ? true : false) !!}
                        </span>
            <input type="text" class="form-control" value="Active">
        </div><!-- /input-group -->
        <div class="input-group">
                        <span class="input-group-addon">
                            {!! Form::radio('status', 0,(isset($user) && !$user->status) ? true : false) !!}
                        </span>
            <input type="text" class="form-control" value="Blocked">
        </div><!-- /input-group -->
        <hr>
        <p style="padding: 10px;" class="blockTitle">Roles</p>
        @foreach($roles as $role)
            <div class="input-group">
                        <span class="input-group-addon">
                            {!! Form::checkbox('roles[]', $role->id, (isset($user)) ? $user->hasRole($role->name) : false) !!}
                        </span>
                <input type="text" class="form-control" value="{!! $role->display_name !!}">
            </div><!-- /input-group -->
        @endforeach
    @endif
</div><!-- /.col-lg-6 -->
{!! Form::submit($btnText,['class'=> 'btn btn-primary']) !!}
=======
    
    <div class="form-group">
        <label for="password">password</label>
        {!! Form::text('password',null,['class'=> 'form-control']) !!}
    </div>
    
    @if(Auth::user()->hasRole('admin'))
    <div class="input-group">
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            {!! Form::radio('status', 1,(isset($user) && $user->status) ? true : false) !!}
        </span>
        <input type="text" class="form-control" value="Active">
    </div><!-- /input-group -->
    <div class="input-group">
        <span class="input-group-addon">
            {!! Form::radio('status', 0,(isset($user) && !$user->status) ? true : false) !!}
        </span>
        <input type="text" class="form-control" value="Blocked">
    </div><!-- /input-group -->
    <hr>
    <p style="padding: 10px;" class="blockTitle">Roles</p>
    @foreach($roles as $role)
    <div class="input-group">
        <span class="input-group-addon">
            {!! Form::checkbox('roles[]', $role->id, (isset($user)) ? $user->hasRole($role->name) : false) !!}
        </span>
        <input type="text" class="form-control" value="{!! $role->display_name !!}">
    </div><!-- /input-group -->
    @endforeach

    <p style="padding: 10px;" class="blockTitle">Πελάτης: </p>
    <div class="">

        <select class="input-group-lg  " name="customer_id">
            <option value = "0">Επιλογή Πελάτη</option>
            @foreach($clientsList as $client)
            @if(isset($user))
            <option <?php if($client->cusid === $user->customer_id ){echo "selected";}?> value = "{!!$client->cusid!!}">{!!$client->customer!!}</option>
            @endif
            <option value = "{!!$client->cusid!!}">{!!$client->customer!!}</option>
            @endforeach
        </select>
    </div><!-- /input-group -->

    @endif
</div><!-- /.col-lg-6 -->
>>>>>>> newGorilla
