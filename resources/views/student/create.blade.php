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
	@if(session()->has('status'))
		{{session()->get('status')}}
	@endif
	<form method="post" action="{{ URL::to('students/store') }}" enctype="multipart/form-data" id="add-form">
		@csrf
		<label>Name: <input type="text" name="name"></label>

		<label>Email: <input type="email" name="email"></label>
		
		<label>Enter your image:<input type="file" name="image"></label>
		<input type="button" value="Submit" id="add-btn">
	</form>
<script src="{{asset('js/jquery-2.2.4.js')}}"></script>
<script>
	$('#add-btn').click(function(e){
		e.preventDefault();
		var state = confirm('Are you sure?');
		if(state){
			$('#add-form').submit();
		}else{

		}
	});
</script>
</body>
</html>