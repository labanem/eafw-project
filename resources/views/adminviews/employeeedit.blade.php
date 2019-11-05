@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<section id="">
	@if($message = Session::get('success'))
		<div class="form-success">
			{{ $message }}
		</div>
	@endif
	
	@if(count($errors)>0)
	<div class="form-fail">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	</div>
	@endif

	<h3 class="heading">Select Employee</h3>

<table id="display-tables">
	<th>First Name</th>
	<th>Sur Name</th>
	<th>Department</th>
	<th>Week Off</th>
	<th>Edit</th>
	@foreach($employees as $employee)
	<tr>
		<td>{{ $employee->fname }}</td>
		<td>{{ $employee->lname }}</td>
		<td>{{ $employee->department->deptname }}</td>
		<td>{{ $employee->weekoff->wname }}</td>
		<td><a href="{{ action('eafwprojectController@edit_employee', $employee['id']) }}">Edit</a></td>
	</tr>
	@endforeach

	<div class="paginate-links">
<!--@if($employees->lastPage() > 1)
		@for($i = 1; $i <= $employees->lastPage(); $i++)
			<a href="{{ $employees->url($i) }}">{{ $i }}</a>
		@endfor
	@endif
-->

	@if($employees->currentPage() !== 1)
		<a href="{{ $employees->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
	@endif
	@if($employees->currentPage() !== $employees->lastPage() && $employees->hasPages())
		<a href="{{ $employees->nextPageUrl() }}"><span class="fa fa-caret-right"></span></a>
	@endif
	</div>
</table>
<br>
</section>

@endsection