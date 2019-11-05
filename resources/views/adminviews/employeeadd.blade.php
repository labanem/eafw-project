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

<h3 class="heading">New Employee</h3>

<form action="{{ route('add_employee') }}" method="post">
<div class="display-forms">
	<label for="id">Employee Number:</label>
	<input type="text" name="id" id="id" /><br>

	<label for="fname">First Name:</label>
	<input type="text" name="fname" id="fname" /><br>

	<label for="lname">Sur Name:</label>
	<input type="text" name="lname" id="lname" /><br>

	<label for="compid">Company:</label>
	<select name="compid" id="compid">
	<option value="" selected disabled hidden>Select Company</option>
		@foreach($companies as $company)
			<option value="{{ $company->id }}">{{ $company->compname }}</option>
		@endforeach
	</select>
	<br>

	<label for="deptid">Department:</label>
	<select name="deptid" id="deptid">
	<option value="" selected disabled hidden>Select Department</option>
		@foreach($departments as $department)
			<option value="{{ $department->id }}">{{ $department->deptname }}</option>
		@endforeach
	</select>

	<label for="subdeptid">Sub Department:</label>
	<select name="subdeptid" id="subdeptid">
	<option value="" selected disabled hidden>Select Sub Department</option>
	@foreach($departments as $department)
		@foreach($subdepartments as $subdepartment)
			<option value="{{ $subdepartment->id }}">{{ $subdepartment->sdeptname }}</option>
		@endforeach
	@endforeach
	</select>
	<br>

	<label for="weekid">Saturday Off:</label>
	<select name="weekid" id="weekid">
		<option value="" selected disabled hidden>Select Saturday Off</option>
		@foreach($weekoffs as $weekoff)
			<option value="{{ $weekoff->id }}">{{ $weekoff->wname }}</option>
		@endforeach
	</select>
	<br>

	<input type="submit" value="Save" />
	<input type="hidden" value="{{ Session::token() }}" name="_token">

</form>
</div>
<br>
</section>

@endsection