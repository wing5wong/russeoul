<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Russeoul GINUE</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
</head>
<body>

<div class="wrapper">
<header>
	<h1> Russeoul GINUE </h1>
	<h2> Resources Index</h2>
</header>
	{{ HTML::link('/','Home') }} &nbsp;&nbsp;
	{{ HTML::link('resource/add','Add Resource') }}
	
	<h2>Resources List</h2>
	<ul>
		<li>
			Sample resource 1
		</li>
		
		<li>
			Sample resource 2
		</li>
		
		<li>
			Sample resource 3
		</li>
	</ul>
	</div>
</body>
</html>
