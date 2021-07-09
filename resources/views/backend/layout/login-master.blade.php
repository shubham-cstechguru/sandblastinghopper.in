@php
  $setting =  App\Model\Setting::findOrFail(1);
 
@endphp
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('imgs/'.$setting->fav_icon)}}">
	<title>App Name-@yield('title')</title>
	{{Html::style('admin/css/style.css')}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container">
		@yield('contant')
	</div>
</body>
</html>