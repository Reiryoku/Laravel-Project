@extends('layouts.app')

@section('body-class', 'settings')

@section('content')

<style>
body.settings #results-top-wrapper, 
body.authorized_applications #results-top-wrapper, 
body.applications #results-top-wrapper, 
body.widgets #results-top-wrapper {
    padding-bottom: 65px;
}
body.settings section#main-settings, 
body.authorized_applications section#main-settings, 
body.applications section#main-settings, 
body.widgets section#main-settings {
    padding-top: 20px;
}
body.settings label.user-avatar img, 
body.authorized_applications label.user-avatar img, 
body.applications label.user-avatar img, 
body.widgets label.user-avatar img {
    width: 100px;
    height: 100px;
    float: right;
}
#info-wrapper {
    min-height: 600px;
}
.user-avatar {
    position: relative;
}
.user-avatar img {
    display: block;
    width: 100%;
    border: solid 3px #464646;
    background-color: #464646;
    margin-bottom: 5px;
    border-radius: 50%;
}
body.settings .buttons, 
body.authorized_applications 
.buttons, body.applications 
.buttons, body.widgets .buttons {
    padding-top: 20px;
    padding-bottom: 20px;
    text-align: center;
}
body.settings .buttons .btn, 
body.authorized_applications .buttons .btn, 
body.applications .buttons .btn, 
body.widgets .buttons .btn {
    text-transform: uppercase;
    font-size: 16px;
    padding: 10px 16px;
}
</style>

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
		<div class="poster-bg"></div>
	</div>
	<div class="container">
		<h1>Settings</h1>
	</div>
	<div id="links-wrapper">
		<div class="container">
        	<a class="selected" href="/settings">General</a>
            <a href="/settings/sharing">Sharing</a>
            <a href="/settings/notifications">Notifications</a>
            <a href="/settings/hidden">Hidden Items</a>
            <a href="/oauth/authorized_applications">Connected Apps</a>
            <a href="/oauth/applications">Your API Apps</a>
     	</div>
	</div>
</section>
<section id="main-settings">
	<div class="container">
		<div class="row" id="info-wrapper">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <div class="sidebar affixable affix-top" data-offset-top="100" style="width: 173px;">
                    <ul class="nav sections">
                        <li class="active"><a href="#account">Account</a></li>
                        <li class=""><a href="#datetime">Date & Time</a></li>
                        <li class=""><a href="#global">Global</a></li>
                        <li class=""><a href="#spoilers">Spoilers</a></li>
                        <li class=""><a href="#dashboard">Dashboard</a></li>
                        <li class=""><a href="#profile">Profile</a></li>
                        <li class=""><a href="#progress">Progress</a></li>
                        <li><a href="#calendars">Calendars</a></li>
                        <li class=""><a href="#search">Search</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-9">
                <div class="panel panel-default" id="image">
                    <div class="panel-heading">Avatar</div>
                    <div class="panel-body">
                    {!! Form::open(['route' => ['settings', $user->id], 'class' => 'simple_form form-horizontal', 'files' => true]) !!}
                            <label class="col-sm-3 control-label user-avatar">
                                <img src="/uploads/avatars/{{ $user->name. '/' .$user->avatar }}">
                            </label>
                            <div class="col-sm-7 user-avatar control-group">
                                <div class="form-group">
                                    {!! Form::file('avatar', ['class' => 'form-control', 'id' => 'avatar-display']) !!}
                                </div>
                                <div class="form-group"> 
                                	<div class="col-sm-12 buttons"> 
                                    	{!! Form::submit('Ενημερωση', ['class' => 'btn btn btn-primary']) !!}
                                    </div>
                                </div>
                            </div>
                        
                        {!! Form::close() !!}
             		</div>
                </div>
                <div class="panel panel-default" id="account">
                    <div class="panel-heading">Account</div>
                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'simple_form form-horizontal']) !!}
                            <div class="form-group">
                            	{{ Form::label($user->name, 'Όνομα Χρήστη:', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-7">
                                    <div class="control-group user_name">
                                        <div class="controls">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'user_name']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label($user->email, 'Ηλ. Ταχυδρομείο:', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-7">
                                    <div class="control-group user_email">
                                        <div class="controls">
                                        	{!! Form::email('email', null, ['class' => 'form-control', 'id' => 'user_email']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">First name:</label>
                                <div class="col-sm-7">
                                    <div class="control-group user_first_name">
                                        <div class="controls">
                                        	{!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'user_first_name']) !!}
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Last name:</label>
                                <div class="col-sm-7">
                                    <div class="control-group user_last_name">
                                        <div class="controls">
                                        	{!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'user_last_name']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">About:</label>
                                <div class="col-sm-7">
                                    <div class="control-group user_bio">
                                        <div class="controls">
                                            <textarea class="form-control" rows="5" placeholder="{{ $user->bio }}" id="user_bio"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Gender:</label>
                                <div class="col-sm-7">
                                    <div class="control-group user_gender">
                                        <div class="controls">
                                        	{{  Form::select('gender', ['male' => 'Άνδρας', 'female' => 'Γυναίκα'], 'male', ['class' => 'form-control', 'id' => 'user_gender']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="col-sm-12 buttons">
                                	{!! Form::submit('Ενημερωση', ['class' => 'btn btn btn-primary']) !!}
                                </div>
                            </div>  
                        {!! Form::close() !!}    
                    </div>
                </div>
                <div class="panel panel-default" id="password">
                    <div class="panel-heading">Change Password</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-7 col-sm-offset-3"><em>Only enter your password if you want to change it.</em></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">New Password:</label>
                            <div class="col-sm-7">
                                <div class="control-group password optional user_password">
                                    <div class="controls"><input class="password optional form-control" type="password" name="user[password]" id="user_password"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confirm Password:</label>
                            <div class="col-sm-7">
                                <div class="control-group password optional user_password_confirmation">
                                    <div class="controls"><input class="password optional form-control" type="password" name="user[password_confirmation]" id="user_password_confirmation"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>		
	</div>
</section>
@endsection