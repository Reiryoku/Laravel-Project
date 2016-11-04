@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard users">
@endsection

@section('dashboard-content')

<div class="col-md-2 col-sm-2 hidden-xs">
    <div class="sidebar affixable" style="width: 173px;">
    	<div class="scrollspy">
            <ul class="nav sections">
                <li><a href="#first-link">ΟΛΟΙ ΟΙ ΧΡΗΣΤΕΣ</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-10 col-sm-9">
	<div class="panel panel-default" id="first-link">
        <div class="panel-heading">ΟΛΟΙ ΟΙ ΧΡΗΣΤΕΣ</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>AVATAR</th>
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>ΟΝΟΜΑ</th>
                        <th>ΕΠΙΘΕΤΟ</th>
                        <th>ΑΡ. ΑΡΘΡΩΝ</th>
                        <th>ΦΥΛΟ</th>
                        <th>ΡΟΛΟΙ</th>
                        <th>ΔΗΜΙΟΥΡΓΗΘΗΚΕ</th>
                        <th>ΕΝΗΜΕΡΩΘΗΚΕ</th>
                        <th></th>
                    </tr
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($user->avatar) ? '/uploads/images/'.$user->avatar : '/img/avatar.png' }}" width="50"></td>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->posts->count() }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>@foreach($user->roles as $role) {{ $role->display_name }} @endforeach</td>
                    <td>{{ date('M j, Y', strtotime($user->created_at)) }}</td>
                    <td>{{ date('M j, Y', strtotime($user->updated_at )) }}</td>
                    <td>
                    	<a href="{{ route('users.show', $user->id) }}"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                      	<a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                       	<a><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a>
                    </td>
              	</tr>
                @endforeach
            	</tbody>
			</table>
        </div>
	</div>                
    <div class="pagination-bottom">
        {!! $users->links(); !!}
    </div>             
</div>

@endsection
