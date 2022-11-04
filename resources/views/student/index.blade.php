<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Status</th>
	</tr>
	@foreach($students as $student)
	<tr>
		<td>{{ $student->name }}</td>
		<td>{{ $student->email }}</td>
		<td>{{ $student->status == 'N'? 'disabled':'enabled' }}</td>
	</tr>
	@endforeach
</table>
</body>
</html>