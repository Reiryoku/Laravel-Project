@extends('layouts.app')

@section('bodytag')
	<body class="settings profile" data-spy="scroll" data-offset="50">
@endsection

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
#info-wrapper .sidebar {
    margin-top: -180px;
}
body.settings section#main-settings #info-wrapper .sidebar, 
body.authorized_applications section#main-settings #info-wrapper .sidebar, 
body.applications section#main-settings #info-wrapper .sidebar, 
body.widgets section#main-settings #info-wrapper .sidebar {
    margin-top: 0;
}
#info-wrapper .sidebar.affixable.affix {
    top: 255px;
    position: fixed !important;
}
body.settings section#main-settings #info-wrapper .sidebar.affixable.affix, 
body.authorized_applications section#main-settings #info-wrapper .sidebar.affixable.affix, 
body.applications section#main-settings #info-wrapper .sidebar.affixable.affix, 
body.widgets section#main-settings #info-wrapper .sidebar.affixable.affix {
    top: 65px;
}
#info-wrapper .sidebar.affixable.affix-top {
    position: relative !important;
}
#info-wrapper .sidebar .sections, 
#info-wrapper .sidebar .external, 
#info-wrapper .sidebar .vip-actions, 
#info-wrapper .sidebar .mod-actions {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 14px;
    text-transform: uppercase;
	font-weight:bold;
}
body.settings section#main-settings #info-wrapper .sidebar .sections, 
body.authorized_applications section#main-settings #info-wrapper .sidebar .sections, 
body.applications section#main-settings #info-wrapper .sidebar .sections, 
body.widgets section#main-settings #info-wrapper .sidebar .sections {
    margin-top: 0;
}
#info-wrapper .sidebar .sections {
    margin-top: 10px;
}
#info-wrapper .sidebar .sections li {
    border-bottom: solid 1px #cacaca;
    padding: 0;
}
body.settings section#main-settings #info-wrapper .sidebar .sections li:first-child, 
body.authorized_applications section#main-settings #info-wrapper .sidebar .sections li:first-child, 
body.applications section#main-settings #info-wrapper .sidebar .sections li:first-child, 
body.widgets section#main-settings #info-wrapper .sidebar .sections li:first-child {
    border-top: solid 1px #cacaca;
}
#info-wrapper .sidebar .sections li a {
    color: #959595;
    padding: 8px 0;
    transition: all .5s;
}
#info-wrapper .sidebar .sections li.active a {
    color: #ed1c24;
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
body.settings .control-group.user-avatar, 
body.authorized_applications .control-group.user-avatar, 
body.applications .control-group.user-avatar,
body.widgets .control-group.user-avatar {
    padding-top: 40px;
}
.form-group .under-help, .form-group .side-help, 
.form-group .help-block, .form-group .control-group.boolean label {
    color: #999;
    font-size: 12px;
    font-style: italic;
    margin-top: 5px;
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
	color: white;
    background-color: #ed1c24;
    border-color: #de1219;
	border-radius: 0px;
}
</style>

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
		<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
	</div>
	<div class="container">
		<h1>Ρυθμίσεις</h1>
	</div>
	<div id="links-wrapper">
		<div class="container">
        	<a class="selected" href="/settings">General</a>
     	</div>
	</div>
</section>
<section id="main-settings">
	<div class="container">
		<div class="row" id="info-wrapper">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <div class="sidebar affixable" data-spy="affix" data-offset-top="100" style="width: 173px;">
                    <ul class="nav sections">
                        <li><a href="#account">ΛΟΓΑΡΙΑΣΜΟΣ</a></li>
                        <li><a href="#password">ΚΩΔΙΚΟΣ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-9">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'simple_form form-horizontal', 'files' => 'true']) !!}
                <div class="panel panel-default" id="account">
                    <div class="panel-heading">ΛΟΓΑΡΙΑΣΜΟΣ</div>
                    <div class="panel-body">
                    	<div class="form-group">
                            <label class="col-sm-3 control-label user-avatar">
                                <img src="{{ '/uploads/images/' .$user->avatar }}">
                            </label>
                            <div class="col-sm-7 user-avatar control-group">
                                <div class="control-group file optional user_avatar hide">
                                	<div class="controls">
                                    	{!! Form::file('avatar', ['class' => 'file optional', 'id' => 'avatar-input']) !!}
                                    </div>
                                </div>
                                <div class="input-group">
                                	<input class="form-control" id="avatar-display" readonly type="text" value="">
                                    <a class="btn btn-info input-group-addon" id="avatar-file-upload"><i class="fa fa-upload"></i> Browse</a>
                              	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label($user->name, 'Όνομα Χρήστη:', ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-7">
                                <div class="control-group user_name">
                                    <div class="controls">
                                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'user_name']) !!}
                                    </div>
                                </div>
                                <div class="under-help">This only applies to movies and episodes you haven't watched yet.</div>
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
                <div class="form-group">
              		<div class="col-sm-12 buttons">
             			{!! Form::submit('Ενημερωση', ['class' => 'btn btn btn-primary']) !!}
             		</div>
             	</div>
            {!! Form::close() !!}                
            </div>
		</div>		
	</div>
</section>
@endsection
@section('scripts')
<script>
$('#avatar-file-upload').on("click" , function () {
	$('#avatar-input').click();
});
</script>
@endsection