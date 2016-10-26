<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Blog @yield('title')</title>

<link rel="shortcut icon" href="{{{ asset('themes/subztv/assets/bootstrap/img/favicon.ico') }}}" type="image/x-icon">
<link rel="icon" href="{{{ asset('themes/subztv/assets/bootstrap/img/favicon.ico') }}}" type="image/x-icon">

{!! Html::style('//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700') !!}
{!! Html::style('css/font-awesome.min.css') !!}

<!-- Bootstrap -->
{!! Html::style('css/bootstrap.css') !!}

{!! Html::style('css/styles.css') !!}

@yield('stylesheets')

<!-- Scripts -->
<script type="text/javascript">
window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
</script>