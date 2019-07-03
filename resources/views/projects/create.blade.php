<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Create a new Project</h1>

	<form method="POST" action="/projects">
		@csrf

		<div>
			<input type="text" name="title" placeholder="Project title">
		</div>

		<div>
			<textarea name="description" placeholder="Project description"></textarea>
		</div>

		<div>
			<button type="submit">Create project</button>
		</div>
	</form>
</body>
</html>