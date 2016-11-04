@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard posts">
@endsection

@section('dashboard-content')

<div class="col-md-2 col-sm-2 hidden-xs">
    <div class="sidebar affixable" style="width: 173px;">
    	<div class="scrollspy">
            <ul class="nav sections">
                <li><a href="#first-link">ΟΛΑ ΤΑ ΑΡΘΡΑ</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-10 col-sm-9">
	<div class="panel panel-default" id="first-link">
        <div class="panel-heading">ΟΛΑ ΤΑ ΑΡΘΡΑ</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    	<th>ΕΙΚΟΝΑ</th>
                        <th>#</th>
                        <th>ΤΙΤΛΟΣ</th>
                        <th>ΠΕΡΙΛΗΨΗ</th>
                        <th></th>
                        <th>ΚΑΤΗΓΟΡΙΑ</th>
                        <th>ΔΗΜΙΟΥΡΓΗΘΗΚΕ</th>
                        <th>ΕΝΗΜΕΡΩΘΗΚΕ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                    	<td class="col-sm-1"><img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($post->image) ? '/uploads/images/'.$post->image : '/img/noimage2.png' }}" width="100"></td>
                        <th class="col-sm-1">{{ $post->id }}</th>
                        <td class="col-sm-1">{{ $post->title }}</td>
                        <td class="col-sm-1">{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                        <td class="col-sm-1">{{ $post->user->name }}</td>
                        <td class="col-sm-1">{{ $post->category->name }}</td>
                        <td class="col-sm-1">{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                        <td class="col-sm-1">{{ $post->updated_at->diffForHumans() }}</td>
                        <td class="col-sm-2">
                        	<a href="{{ route('posts.show', $post->id) }}"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                            <a href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                            <a><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a>
                       	</td>
                    </tr>
                    @endforeach
                </tbody>
			</table>
        </div>
	</div>                
    <div class="pagination-bottom">
        {!! $posts->links(); !!}
    </div>             
</div>

@endsection
