@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<section id="">
	<p><a href="{{ route('employeeadd') }}">Add Employee</a></p>
	<p><a href="{{ route('employeeedit') }}">Edit Employee</a></p>
	<p>extensionadd</p>
	<p>extensionedit</p>
	<p>departmentadd</p>
	<p>departmentedit</p>
	<p>subdepartmentadd</p>
	<p>subdepartmentedit</p>
	<p><a href="{{ route('vmvthome') }}">Vehicle Movement</a></p>
</section>

@endsection