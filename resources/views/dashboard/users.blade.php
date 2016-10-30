@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard users">
@endsection

@section('dashboard-content')

<section id="results-top-wrapper" class="dashboard-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
    </div>
    <div class="container">
    	<h1>Όλες οι κατηγορίες</h1>
    </div>
</section>

<section id="main-wrapper" style="padding:0;">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-md-12">
            	<div class="row">
                	<div style="padding:20px; background-color: #fafafa">
                    	<div class="pagination-top">
                    		{!! $users->links(); !!}
                        </div>
                    	<h2> </h2>
                        <div class="table-responsive">
                        	<table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ΕΙΚΟΝΑ</th>
                                    <th>ΟΝΟΜΑ ΧΡΗΣΤΗ</th>
                                    <th>ΟΝΟΜΑ</th>
                                    <th>ΕΠΩΝΥΜΟ</th>
                                    <th>ΡΟΛΟΙ</th>
                                    <th>ΑΡΘΡΑ</th>
                                    <th></th>
                                    <th></th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th class="col-sm-1">{{ $user->id }}</th>
                                    <th class="user-avatar col-sm-1">
                                    	<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($user->avatar) ? '/uploads/images/'.$user->avatar : '/uploads/images/avatar.jpg' }}" class="lazy">
                                    </th>
                                    <td class="col-sm-1">{{ $user->name }}</td>
                                    <td class="col-sm-1">{{ $user->first_name }}</td>
                                    <td class="col-sm-1">{{ $user->last_name }}</td>
                                    <td class="col-sm-1">
                                    @foreach($user->roles as $role)
										<span>{{ $role->display_name }}</span>
									@endforeach
                    				</td>
                                    <td class="col-sm-1">{{ $user->posts->count() }}</td>
                                    <td class="col-sm-1">{{ date('M j, Y h:ia', strtotime($user->created_at)) }}</td>
                                    <td class="col-sm-1">{{ date('M j, Y h:ia', strtotime($user->updated_at )) }}</td>
                                    <td class="col-sm-1">
                                    	<a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">ΕΜΦΑΝΙΣΗ</a>
                        				<a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">ΕΠΕΞΕΡΓΑΣΙΑ</a>
            						</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="pagination-bottom">
                    		{!! $users->links(); !!}
                        </div>
                    </div>
                </div>  
            </div>   
        </div>
    </div>
</section>
 
@endsection