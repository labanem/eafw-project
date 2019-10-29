@extends('layouts.master')
@section('content')
	<br>
	<br>
	<br>
	<br>
	@foreach($departments as $department)
		{{ $department->deptname }}
	@endforeach
	<br>
	<br>
	@if(count($departs) == 0)
	<br>
		No Emails in this Departnment
	<br>
	@else
		<table>
			@foreach($departs as $depart)
				@foreach($employees as $employee)
					@if($depart->emp_details_tbs_id == $employee->id)
						<tr><td>{{ $employee->fname }} {{ $employee->lname }}</td><td>{{ $depart->wkemail }}</td></tr>
					@endif
				@endforeach
			@endforeach
		</table>
	@endif
	<br>
	<a href="{{ route('compmails') }}">Back</a>
	<br>
	<br>
@endsection