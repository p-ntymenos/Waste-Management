@extends('app')

@section('content')
<<<<<<< HEAD
    <div id="rightSideHeight" class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
        <div class="row">
            <p style="padding: 10px;" class="blockTitle">Create new user</p>

            {!! Form::open(['route' => ['users.store']]) !!}
            @include('users.partials.form', ['btnText' => 'Save user'])
            {!! Form::close() !!}
        </div>
    </div>
=======





<div class="section">
    <div class="row">
        <div class="col-sm-10 col-xs-12">
            
            {!! Form::open(['route' => ['users.store'],'id'=>'form-newuser' ,'files' => true ]) !!}
             <h4>Account Settings</h4>

            <h5 class="required">Status:</h5>
            <div class="col-sm-4 col-xs-12">
                <div class="radio">
                    <input type="radio" checked name="status" id="status-active" value="1"  >
                    <label for="status-active"><span></span>Active</label>
                </div>
                <div class="radio">
                    <input type="radio" name="status" id="status-blocked" value="0" >
                    <label for="status-blocked"><span></span>Blocked</label>
                </div>
            </div>

            <div class="clearfix"></div>


            <h5 class="top45">Role:</h5>
            <div class="row">
                <?php for($i=0;$i<4;$i++):?>
                <div class="col-md-3">
                    <?php foreach($roles as $rle):?>
                    <?php if($rle->group == $i):?>
                    <div class="checkbox" title="<?php echo $rle->display_name?>">
                        <input type="checkbox" name="roles[]" value="<?php echo $rle->id;?>" id="role-<?php echo $rle->display_name?>"  > 
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
                    <input type="text" name="name" placeholder="Enter your full name" value="">
                    <label for="fullname"  class="required">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" value="{{Input::old('email')}}">
                    <label for="fullname"  class="required">Username</label>
                    <input type="text" name="username" placeholder="Choose a username" value="{{Input::old('username')}}" >

                </div>

                <div class="col-sm-4 col-xs-12">
                    <label for="fullname" class="required">Address</label>
                    <input type="text" name="address" placeholder="Enter your address" value="{{Input::old('address')}}">
                    <label for="fullname" class="required">Postal Code</label>
                    <input type="text" name="postal" placeholder="Enter your postal code" value="{{Input::old('postal')}}">
                    <label for="fullname" class="required">Contact number</label>
                    <input type="text" placeholder="Enter your number" name="phone" value="{{Input::old('phone')}}">
                </div>
            </div>

            <h4>Change Password</h4>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <label for="fullname" class="required">New Password</label>
                    <input type="password" name="password" placeholder="Choose a new password">
                </div>

                <div class="col-sm-4 col-xs-12">
                    <label for="fullname" class="required">Confirm Password</label>
                    <input type="password" name="password2" placeholder="Confirm your new password">
                </div>
            </div>

           
           
            <div class="row top80">
                <div class="col-sm-2 col-xs-12">
                    <input type="submit" value="ΑΠΟΘΗΚΕΥΣΗ">
                </div>
                <div class="col-sm-2 col-xs-12">
<!--                    <input type="reset" value="ΑΚΥΡΩΣΗ">-->
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
