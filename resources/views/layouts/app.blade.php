<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
     
    <body class="@yield('body-class')">
       
    	@section('nav')
	 		@include('partials.navbar')
		@show
       
        @include('partials.messages')
        
        <div id="content">
        	@yield('content')
        </div>
        
        @include('partials.footer')
        
        @include('partials.javascript')
        
        @yield('scripts')
    </body>
</html>