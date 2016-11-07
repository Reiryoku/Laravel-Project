@extends('dashboard.index')

@section('title', '| Πίνακας Ελέγχου - Κατηγορίες')

@section('bodytag')
	<body class="dashboard categories">
@endsection

@section('dashboard-content')
<div class="col-md-2 col-sm-2 hidden-xs">
    <div class="sidebar affixable" style="width: 173px;">
    	<div class="scrollspy">
            <ul class="nav sections">
                <li><a href="#first-link">ΟΛΕΣ ΟΙ ΚΑΤΗΓΟΡΙΕΣ</a></li>
                <li><a href="#second-link">ΝΕΑ ΚΑΤΗΓΟΡΙΑ</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-md-10 col-sm-9">
    <div class="panel panel-default" id="first-link">
        <div class="panel-heading">ΟΛΕΣ ΟΙ ΚΑΤΗΓΟΡΙΕΣ</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    	<th>ΕΙΚΟΝΑ</th>
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
                    @foreach ($categories as $category)
                    <tr>
                    	<td class="col-sm-1">{{ $category->image }}</td>
                        <td class="col-sm-1">{{ $category->id }}</th>
                        <td class="col-sm-1">{{ $category->name }}</td>
                        <td class="col-sm-1">{{ $category->description }}</td>
                        <td class="col-sm-1">{{ $category->posts->count() }}</td>
                        <td class="col-sm-1">{{ date('M j, Y', strtotime($category->created_at)) }}</td>
                        <td class="col-sm-1">{{ date('M j, Y', strtotime($category->updated_at)) }}</td>
                        <td class="col-sm-1">
                        	<a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                            <a class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
			</table>
        </div>
	</div>
   	<div class="pagination-bottom">
		{!! $categories->links(); !!}
	</div>
    {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}	    
        <div class="panel panel-default" id="second-link">
            <div class="panel-heading">ΝΕΑ ΚΑΤΗΓΟΡΙΑ</div>
            <div class="panel-body">		
                <div class="form-group">
                    <label>ΟΝΟΜΑ</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ΟΝΟΜΑ ΚΑΤΗΓΟΡΙΑΣ']) !!}
                </div>
                <div class="form-group">
                    <label>ΠΕΡΙΓΡΑΦΗ</label>
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'ΠΕΡΙΓΡΑΦΗ']) !!}
                </div>
            </div>
        </div>
    	<div class="form-group" style="text-align: center;">
    		{!! Form::submit('Νέα Κατηγορία', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection