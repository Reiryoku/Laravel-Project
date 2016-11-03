@extends('layouts.app')

@section('nav')
@endsection

@section('content')


<section id="auth-bg-wrapper" class="bg-on" style="background-image: url('img/blur1.jpg');"></section>

<div id="auth-form-wrapper">
	<a href="{{ url('/') }}">
		<div class="logo-wrapper">
			<div class="base"></div>
			<div class="logo"></div>
		</div>
	</a>
    {{ Form::open(['url' => 'login', 'class' => 'form-signin']) }}
		<h1>subztv</h1>
		<h2 class="quote">I am the one who knocks.</h2>
		<div class="form-inputs with-icons">
			<div class="with-icon form-group">
				<i class="fa fa-user-o" aria-hidden="true"></i>
				<div class="control-group user_login">
					<div class="controls">
                    	{{ Form::email('email', null, ['id'=>'email', 'class'=>'top form-control', 'placeholder' => 'Βάλε το email σου!']) }}
                    </div>
				</div>
			</div>
			<div class="with-icon">
				<a class="side-link" tabindex="-1" href="{{ url('/password/reset') }}">μήπως το ξέχασες;</a>
				<i class="fa fa-lock" aria-hidden="true"></i>
				<div class="control-group user_password">
					<div class="controls">
                        {{ Form::password('password', ['class'=>'bottom form-control', 'placeholder' => 'Βάλε τον κωδικό σου!']) }}
                    </div>
				</div>
			</div>
		</div>
		<div class="form-actions">
            {{ Form::submit('ΕΙΣΟΔΟΣ', array('class'=>'sbtn btn btn-primary btn-block')) }}
			<div class="control-group user_remember_me">
				<div class="controls">
                	{{Form::checkbox('remember', null)}} Να με θυμάσαι
                </div>
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
    {{ Form::close() }}
	<div class="bottom-wrapper">Πρώτη φορά εδώ;
    	<a href="{{ url('/register') }}"> Γίνε μέλος εδώ! <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
 	</div>
</div>

@endsection

@section('footer')
@endsection
