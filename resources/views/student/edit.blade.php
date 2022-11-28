<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="{{ URL::to('students/update') }}">
		@csrf
		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')
		<input type="hidden" name="id" value="{{ $student->id }}">
		<label>Name: <input type="text" name="name"value="{{ $student->user->name }}"></label>
		<label>Email: <input type="email" name="email" value="{{ $student->user->email }}"></label>
		<input type="submit" value="Submit">
	</form>
</body>
</html>