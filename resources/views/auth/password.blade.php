@extends('app')

@section('content')
<<<<<<< HEAD
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Send Password Reset Link
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
=======
<!--<div class="container-fluid">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Reset Password</div>
<div class="panel-body">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

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

<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label class="col-md-4 control-label">E-Mail Address</label>
<div class="col-md-6">
<input type="email" class="form-control" name="email" value="{{ old('email') }}">
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
Send Password Reset Link
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>-->

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

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
<div class="container-fluid">

    <div class="row">
        <hr class="topline">
    </div>

    <div class="row row-centered top90">
        <div class="col-lg-4 col-md-8 col-sm-10 col-xs-12 col-centered">
            <div class="passrecover-wrapper">
                <form id="recover-form" method="POST" action="{{ url('/password/email') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4>Forgot your password?</h4>
                            <p class="top30">Please enter your registered email address. You will receive a link to create a new password via email.</p>
                        </div>
                    </div>

                    <div class="row top25">
                        <div class="col-sm-3 col-sm-12">
                            <label for="email">E-mail address:</label>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <input name="email" id="email" placeholder="" type="email">
                        </div>
                    </div>

                    <div class="row top30">
                        <div class="col-sm-9 col-xs-12">
                            <p class="small-text"><a class="orange" href="{{url('/')}}">Return to login page</a></p>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <input type="submit"  value="Send Request" class="bg-orange">
                        </div>
                    </div>

                </form>

                <div id="response"></div>

            </div>
        </div>
    </div>
</div>

<script>
    $(".login-wrapper p").click(function(){$("#response").html("<b>Just press the Sign in button Dude!</b>")});
</script>

>>>>>>> newGorilla
@endsection
