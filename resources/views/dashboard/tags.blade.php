@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard tags">
@endsection

@section('dashboard-content')

<div class="col-md-2 col-sm-2 hidden-xs">
    <div class="sidebar affixable" style="width: 173px;">
    	<div class="scrollspy">
            <ul class="nav sections">
                <li><a href="#first-link">ΟΛΕΣ ΟΙ ΕΤΙΚΕΤΕΣ</a></li>
                <li><a href="#second-link">ΝΕΑ ΕΤΙΚΕΤΑ</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-10 col-sm-9">
    <div class="panel panel-default" id="first-link">
        <div class="panel-heading">ΟΛΕΣ ΟΙ ΕΤΙΚΕΤΕΣ</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ΟΝΟΜΑ</th>
                        <th>ΠΕΡΙΓΡΑΦΗ</th>
                        <th>ΑΡ. ΑΡΘΡΩΝ</th>
                        <th>ΔΗΜΙΟΥΡΓΗΘΗΚΕ</th>
                        <th>ΕΝΗΜΕΡΩΘΗΚΕ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->description }}</td>
                        <td>{{ $tag->posts->count() }}</td>
                        <td>{{ date('M j, Y', strtotime($tag->created_at)) }}</td>
                        <td>{{ date('M j, Y', strtotime($tag->updated_at)) }}</td>
                        <td>
                        	<a href="{{ route('tags.show', $tag->id) }}"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                            <a href="{{ route('tags.edit', $tag->id) }}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                            <a><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
              </tbody>
			</table>
        </div>
    </div>
    <div class="pagination-bottom">
		{!! $tags->links(); !!}
	</div>
	{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
        <div class="panel panel-default" id="second-link">
            <div class="panel-heading">ΝΕΑ ΕΤΙΚΕΤΑ</div>
            <div class="panel-body">		
                <div class="form-group">
                	<label>ΟΝΟΜΑ</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ΟΝΟΜΑ ΕΤΙΚΕΤΑΣ']) !!}
                </div>
                <div class="form-group">
                	<label>ΠΕΡΙΓΡΑΦΗ</label>
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'ΠΕΡΙΓΡΑΦΗ ΕΤΙΚΕΤΑΣ']) !!}
                </div>
            </div>
        </div>
        <div class="form-group" style="text-align: center;">
            {{ Form::submit('ΝΕΑ ΕΤΙΚΕΤΑ', ['class' => 'btn btn-primary']) }}
        </div>
	{!! Form::close() !!}
</div>

@endsection
