@extends('app')

<<<<<<< HEAD


@section('content')
<div class="container-fluid" style="margin-top:100px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
=======
@section('content')

@if (count($errors) > 0)
<div class="messages">
    <!--<div class="alert alert-msg alert-msg-warning fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <i class="icon gicon-alert-msgs-warning"></i>
        <p><strong>Whoops!</strong> There were some problems with your input.<br><br></p>
    </div>-->
    @foreach ($errors->all() as $error)
    <div class="alert alert-msg alert-msg-warning fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <i class="icon gicon-alert-msgs-warning"></i>
        <p>{{ $error }}</p>
    </div>
    @endforeach

</div>

@endif



<div class="container-fluid">

    <div class="row">
        <hr class="topline">
    </div>

    <div class="row row-centered">
        <div class="col-lg-3 col-md-5 col-sm-7 col-xs-12 top90 col-centered">
            <div class="logo-login">
                <img src="{{ asset('/images/logo_sm.png')}}" alt="">
                <p>Sign in to continue to Gorilla App</p>
            </div>

            <div class="login-wrapper">
                <form id="login-form" class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- <label for="username">Email address or username</label> Email address or -->
                    <input id="Username" name="username" placeholder="Username" type="text" value="{{ old('username') }}">
                    <!-- <label for="password">Password</label> -->
                    <input id="password" name="password" placeholder="Password" type="password">
                    <input type="checkbox" name="remember" value="remember"> <span>Remember me</span>
                    <input class="pull-right" type="submit" value="Sign in">
                </form>
                <p class="top50 small-text"><a class="orange" href="{{ url('/password/email') }}">Forgot your password?</a></p>
                <div id="response"></div>
            </div>
        </div>

    </div>
</div>

>>>>>>> newGorilla
@endsection
