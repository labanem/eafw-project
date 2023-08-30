@extends('layouts.master')
@section('content')
	<br>
	<br>
	<br>
	<p class="heading">
		Saturday Offs
	</p>
	<?php
		$j = 1;
	?>

	<table id="display-tables">
		<th>#</th>
		<th>First Name</th>
		<th>Sur Name</th>
		<th>Department</th>
	@foreach($weekoffs as $weekoff)
		<p class="heading">{{ $weekoff->wname }}</p>
		<br>
		@foreach($employees as $employee)
			@if($employee->weekid == $weekoff->id)
				<tr><td><?php echo "$j"; ?></td><td>{{ $employee->fname }}</td><td>{{ $employee->lname }}</td><td>{{ $employee->department->deptname }}</td></tr>
				<?php $j++ ?>
			@endif
		
		@endforeach
	@endforeach
	</table>
	<br>

	@if($weekoffs->lastPage() > 1)
		@for($i=1; $i<=$weekoffs->lastPage(); $i++)
			@if($i < 5)
				<a href="{{ $weekoffs->url($i) }}"> WEEK {{ $i }} |</a>
			@else
				<a href="{{ $weekoffs->url($i) }}"> MISC </a>
			@endif
		@endfor
	@endif
	<br>
	<br>
@endsection
