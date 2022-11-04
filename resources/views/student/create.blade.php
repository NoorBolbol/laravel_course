<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="{{ URL::to('students/store') }}">
		@csrf
		<label>Name: <input type="text" name="name"></label>
		<label>Email: <input type="email" name="email"></label>
		<input type="submit" value="Submit">
	</form>
</body>
</html>