<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="{{ URL::to('students/update') }}">
		@csrf
		<input type="hidden" name="id" value="{{ $student->id }}">
		<label>Name: <input type="text" name="name"value="{{ $student->name }}"></label>
		<label>Email: <input type="email" name="email" value="{{ $student->email }}"></label>
		<input type="submit" value="Submit">
	</form>
</body>
</html>