<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- $errors->get('std') -->
	@foreach($errors->all() as $message)
		{{$message}}
	@endforeach
	<form method="post" action="{{ URL::to('students/store') }}" enctype="multipart/form-data">
		@csrf
		<label>Name: <input type="text" name="name"></label>

		<label>Email: <input type="email" name="email"></label>
		
		<label>Enter your image:<input type="file" name="image"></label>
		<input type="submit" value="Submit">
	</form>
</body>
</html>