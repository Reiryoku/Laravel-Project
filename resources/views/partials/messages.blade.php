@if (Session::has('success'))
	<div class="alert alert-success alert-fixed fade in alert-dismissible" role="alert">
    	<div class="container">
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    		{{ Session::get('success') }}
        </div>
    </div>
@endif
@if (count($errors) > 0)
	<div class="alert alert-danger alert-fixed fade in alert-dismissible" role="alert">
    	<div class="container">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    </div>
@endif