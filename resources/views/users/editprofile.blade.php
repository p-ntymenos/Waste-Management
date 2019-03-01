@extends('app')

@section('content')
<div class="section">
    <div class="row">
        <div class="col-sm-10 col-xs-12">
            {!! Form::model($user,['method' => 'PATCH', 'action' =>  ['UsersController@updateprofile', $user->id],  'id'=>'form-newuser' ,'files' => true  ])!!}
            <h4>Profile Photo</h4>
            <div class="row">
                <div class="col-xs-12">
                    <div class="user-photo">
                        <input type="file" name="userphoto" id="userphoto" style="display:none;">
                        <img src="{{url('/user/avatars/'.Auth::user()->userphoto)}}" alt="" >
                        <a id="uploadPhoto" href="#" class="edit-photo"><i class="icon gicon-camera-1"></i>Update Image</a>
                    </div>
                </div>
            </div>

            <h4>Personal Details</h4>
            <div class="row">
                <div class="col-xs-4">
                    <label for="fullname" class="required">Full Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" value="{{$user->name}}">
                    <label for="fullname" class="required">Email Address</label>
                    <input type="text" placeholder="Enter your email" value="{{$user->email}}">
                    <label for="fullname" class="required">Username</label>
                    <input type="text" placeholder="Choose a username" value="{{$user->username}}" disabled>
                    <input type="text" style="display:none;" name="username" value="{{$user->username}}" >
                    <label for="fullname" class="required">Company Name</label>
                    <input type="text" placeholder="Company Name" value="{{$client}}" disabled>
                </div>



                <div class="col-xs-4">
                    <label for="fullname" class="required">Address</label>
                    <input type="text" placeholder="Enter your address" name="address" value="{{$user->address}}">
                    <label for="fullname" class="required">Postal Code</label>
                    <input type="text" placeholder="Enter your postal code" name="postal" value="{{$user->postal}}">
                    <label for="fullname" class="required">Contact number</label>
                    <input type="text" placeholder="Enter your number" name="phone" value="{{$user->phone}}">
                </div>
            </div>

            <h4>Change Password</h4>
            <div class="row">
                <div class="col-xs-4">
                    <label for="fullname" class="required">New Password</label>
                    <input name="password" type="password" placeholder="Choose a new password">
                </div>

                <div class="col-xs-4">
                    <label for="fullname" class="required">Confirm Password</label>
                    <input name="passwordRepeat" type="password" placeholder="Confirm your new password">
                </div>
            </div>

            <div class="row top80">
                <div class="col-sm-2 col-xs-12">
                    <input type="submit" value="ΑΠΟΘΗΚΕΥΣΗ">
                </div>
                <div class="col-sm-2 col-xs-12">
                   <a class="cancelBtn" href="<?php echo URL::asset('/')?>" >ΑΚΥΡΩΣΗ</a>
                    
                    <!--<input type="reset" value="ΑΚΥΡΩΣΗ">-->
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

<script>

    $(document).ready(function(){

        $("#uploadPhoto").click(function() {
            $("#userphoto").click();
        })

    });

</script>

@endsection