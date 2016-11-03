<!DOCTYPE html>
<html lang="el" class="no-js">
    <head>
        @include('partials.head')
    </head>

    @section('bodytag')
	<body>
    @show
       
    	@section('nav')
	 		@include('partials.navbar')
		@show
       
        @include('partials.messages')
        
        <div id="content">
        	@yield('content')
        </div>
        
        @section('footer')
			 @include('partials.footer')
    	@show

        @include('partials.javascript')
        
        @yield('scripts')
    </body>
</html>