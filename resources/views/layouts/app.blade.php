<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
    <body class="@yield('body-class')">
    	@section('nav')
	 		@include('partials.navbar')
		@show
       
        
        <div id="content">
        	@include('partials.messages')
        	@yield('content')
        </div>
        
        @include('partials.footer')
        
        @include('partials.javascript')
        
        @yield('scripts')
    </body>
</html>