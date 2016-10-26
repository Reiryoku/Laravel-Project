@extends('layouts.app')

@section('body-class', 'login')

@section('nav')
	
@endsection

@section('content')

<style>
body.registrations, 
body.sessions, 
body.passwords, 
body.authorizations, 
body.activate,
body.login {
    background-color: #000;
}
#auth-bg-wrapper {
    width: 100%;
    height: 100%;
    background-color: #222;
    background-size: cover;
    background-position: center center;
    position: fixed;
    z-index: -1;
    transition: opacity .5s;
    opacity: 0;
}
#auth-bg-wrapper.bg-on {
    opacity: 1;
}
#auth-form-wrapper, 
.checkin-modal {
    position: fixed;
    z-index: 10000;
    background-color: #f5f5f7;
    width: 360px;
    left: 50%;
    top: 100px;
    margin-left: -180px;
    -webkit-box-shadow: 0px 0px 20px #666666;
    box-shadow: 0px 0px 20px #666666;
    border-radius: 3px;
    margin-bottom: 40px;
}
#auth-form-wrapper {
    position: absolute;
}
</style>


<section id="auth-bg-wrapper" class="bg-on" style="background-image: url(http://test.subztv.gr/themes/subztv/assets/bootstrap/img/blur1.jpg);"></section>

<div id="auth-form-wrapper">
	<a href="https://trakt.tv/">
		<div class="logo-wrapper">
			<div class="base"></div>
			<div class="logo"></div>
		</div>
	</a>
	<form class="simple_form form-signin" novalidate="novalidate" id="new_user" action="/auth/signin" accept-charset="UTF-8" method="post">
		<input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="2VLia0+QuxOIgUGxmkYN8aaxLk9BWA42CnUvj0S3+O/OGQCe8/XY8URpqi+fIOBl6mkG9Jbxh9GTY3+j6OJJrw==">
		<h1>trakt</h1>
		<h2 class="quote">I am the one who knocks.</h2>
		<div class="form-inputs with-icons">
			<div class="with-icon">
				<div class="icon trakt-icon-user"></div>
				<div class="control-group string required user_login">
					<div class="controls"><input class="string required top form-control" autocorrect="off" autocapitalize="off" autofocus="autofocus" required="required" aria-required="true" placeholder="Username or Email" type="text" name="user[login]" id="user_login"></div>
				</div>
			</div>
			<div class="with-icon">
				<a class="side-link" tabindex="-1" href="/auth/password/new">forgot?</a>
				<div class="icon trakt-icon-lock"></div>
				<div class="control-group password required user_password">
					<div class="controls"><input class="password required bottom form-control" required="required" aria-required="true" placeholder="Password" type="password" name="user[password]" id="user_password"></div>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" name="commit" value="Sign in" class="btn btn btn-primary btn-block">
			<div class="control-group hidden user_remember_me">
				<div class="controls"><input value="1" class="hidden" type="hidden" name="user[remember_me]" id="user_remember_me"></div>
			</div>
		</div>
		<div class="auth-services">
			<div class="row">
				<div class="col-xs-4">
					<a href="/auth/auth/twitter">
						<div class="btn btn-block btn-twitter">
							<div class="fa fa-twitter"></div>
						</div>
					</a>
				</div>
				<div class="col-xs-4">
					<a href="/auth/auth/facebook">
						<div class="btn btn-block btn-facebook">
							<div class="fa fa-facebook"></div>
						</div>
					</a>
				</div>
				<div class="col-xs-4">
					<a href="/auth/auth/google_oauth2">
						<div class="btn btn-block btn-google-plus">
							<div class="fa fa-google-plus"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</form>
	<div class="bottom-wrapper">New to Trakt.tv? <a href="/auth/join">Join now <span class="trakt-icon-arrow-right"></span></a></div>
</div>




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
