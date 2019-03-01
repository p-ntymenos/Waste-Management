@extends('app')

@section('content')
<<<<<<< HEAD
    <div id="rightSideHeight" class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
        <div class="row">
            <p style="padding: 10px;" class="blockTitle">User: {!! $user->name !!}</p>

            {!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'put']) !!}
            @include('users.partials.form', ['btnText' => 'Update user', 'user' => $user])
            {!! Form::close() !!}
        </div>
    </div>
=======

<div class="section">
    <div class="row">
        <div class="col-sm-10 col-xs-12">
            
            {!! Form::model($user,['method' => 'PATCH', 'action' =>  ['UsersController@update', $user->id],  'id'=>'form-newuser' ,'files' => true  ])!!}

            <h4>Account Settings</h4>

            <h5 class="required">Status:</h5>
            <div class="col-sm-4 col-xs-12">
                <div class="radio">
                    <input type="radio" name="status" id="status-active" value="1" <?php if($user->status == 1){echo "checked";}?> >
                    <label for="status-active"><span></span>Active</label>
                </div>
                <div class="radio">
                    <input type="radio" name="status" id="status-blocked" value="0" <?php if($user->status == 0){echo "checked";}?>>
                    <label for="status-blocked"><span></span>Blocked</label>
                </div>
            </div>

            <div class="clearfix"></div>


            <h5 class="top45">Role:</h5>
            <div class="row">
                <?php for($i=0;$i<4;$i++):?>
                <div class="col-md-3">
                    <?php foreach($availRoles as $rle):?>
                    <?php if($rle->group == $i):?>
                    <div class="checkbox" title="<?php echo $rle->display_name?>">
                        <input type="checkbox" name="roles[]" value="<?php echo $rle->id;?>" id="role-<?php echo $rle->display_name?>" <?php if(in_array($rle->id,$userRoles)){echo "checked";}?>  > 
                        <label for="role-<?php echo $rle->display_name?>"></label>
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>

                <?php endfor;?>



            </div>

            <div class="clearfix"></div>

            @include('users.partials.dropdowns')


            <h4>Personal Details</h4>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <label for="fullname" class="required">Full Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" value="{{$user->name}}">
                    <label for="fullname"  class="required">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" value="{{$user->email}}">
                    <label for="fullname"  class="required">Username</label>
                    <input type="text" name="usernameView" placeholder="Choose a username" value="{{$user->username}}" disabled>
                    <input type="text" style="display:none;" name="username" value="{{$user->username}}" >
                </div>
                <div class="col-sm-4 col-xs-12">
                    <label for="fullname" class="required">Address</label>
                    <input type="text" name="address" placeholder="Enter your address" value="{{$user->address}}">
                    <label for="fullname" class="required">Postal Code</label>
                    <input type="text" name="postal" placeholder="Enter your postal code" value="{{$user->postal}}">
                    <label for="fullname" class="required">Contact number</label>
                    <input type="text" placeholder="Enter your number" name="phone" value="{{$user->phone}}">
                </div>
            </div>

            <h4>Change Password</h4>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <label for="fullname" class="required">New Password</label>
                    <input name="password" type="password" placeholder="Choose a new password">
                </div>

                <div class="col-sm-4 col-xs-12">
                    <label for="fullname" class="required">Confirm Password</label>
                    <input name="passwordRepeat" type="password" placeholder="Confirm your new password">
                </div>
            </div>



            <div class="row top80">
                <div class="col-sm-2 col-xs-12">
                    <input type="submit" value="ΑΠΟΘΗΚΕΥΣΗ">
                </div>
                <div class="col-sm-2 col-xs-12">
                    <!--<input type="reset" value="ΑΚΥΡΩΣΗ">-->
                    <a class="cancelBtn" href="<?php echo URL::asset('/users')?>" >ΑΚΥΡΩΣΗ</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>




<style>
    a.cancelBtn{display:block; background: #e8e8e8; border: 1px solid #e8e8e8;  color: #767272;padding: 13px;font-weight: 600;font-size: 14px;border-radius: 4px;text-align:center;}
    a.cancelBtn:hover{background: transparent;}
</style>






>>>>>>> newGorilla
@endsection
