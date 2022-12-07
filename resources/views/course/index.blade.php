<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
	@if (App::isLocale('en'))

	@else

	@endif
</head>
<body>
<table>
	<tr>
		<th>@lang('course.name')</th>
		<th>@lang('course.credit')</th>
		<th>@lang('course.price')</th>
		<th>Created at</th>
	</tr>
	@foreach($courses as $course)
	<tr>
		<td>{{ $course->course_name }}</td>
		<td>{{ $course->credit }}</td>
		<td>{{ $course->price }}</td>
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