@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<section id="">
	
	@if(count($errors)>0)
	<div class="form-fail">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	</div>
	@endif

	<h3 class="heading">Edit Employee</h3>	

<div class="display-forms">

	<form action="{{ route('update_employee', $employee->id) }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PATCH" />

		<label for="eid">Employee No: </label>
		<input type="text" value="{{ $employee->id }}" name="id" id="eid" disabled /><br>

		<label for="compid">Company: </label>
		<input type="text" value="{{ $employee->company->compname }}" name="compid" id="compid" disabled /><br>

		<label for="fname">First Name: </label>
		<input type="text" value="{{ $employee->fname }}" name="fname" id="fname" /><br>

		<label for="lname">Sur Name: </label>
		<input type="text" value="{{ $employee->lname }}" name="lname" id="lname" /><br>

		<label for="deptid">Department: </label>
		<select name="deptid" id="deptid">
			<option value="{{ $employee->deptid }}">{{ $employee->department->deptname }}</option>
			@foreach($departments as $department)
				<option value="{{ $department->id }}">{{ $department->deptname }}</option>
			@endforeach
		</select>
		<br>

		<label for="weekid">Week Off: </label>
		<select name="weekid" id="weekid">
		<option value="{{ $employee->weekid }}">{{ $employee->weekoff->wname }}</option>
			@foreach($weekoffs as $weekoff)
				<option value="{{ $weekoff->id }}">{{ $weekoff->wname }}</option>
			@endforeach
		</select>
		<br>
		<br>

		<input type="submit" value="Update" /> 
		<input type="hidden" value="{{ Session::token() }}" name="_token">

	</form>
</div>

<br>
<br>
</section>

@endsection