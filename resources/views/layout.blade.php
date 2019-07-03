<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Laracasts')</title>
    <link rel="stylesheet" href="">
    <style type="text/css" media="screen">
        body {
    		font-family: sans-serif;
    		background-color: #bada55;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
    	}

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
    </style>
    @yield('css')
</head>
<body>
	<ul>
		<li><a href="/">Home</a></li>
		<li><a href="/about">About</a></li>
		<li><a href="/contact">Contact</a></li>
	</ul>

    @yield('content')

</body>
</html>