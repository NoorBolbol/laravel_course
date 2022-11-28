<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
</head>
<body>
<table>
	<tr>
		<th>Name</th>
		<th>Credit</th>
		<th>Created at</th>
	</tr>
	@foreach($courses as $course)
	<tr>
		<td>{{ $course->course_name }}</td>
		<td>{{ $course->credit }}</td>
		<td>{{ $course->created_at }}</td>
	</tr>
	@endforeach
	<div>
		{{$courses->links()}}
	</div>
</table>
<!-- customize pagination
php artisan vendor:publish --tag=laravel-pagination
 -->
</body>
</html>