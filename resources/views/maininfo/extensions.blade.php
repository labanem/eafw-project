@extends('layouts.master')
@section('content')
	<br>
	<br>
	<br>
	<p class="heading">
		Extensions
	</p>
	<table id="display-tables">

	@foreach($departments as $department)
		
		@if($departments->lastPage() > 1)
		<div id="dept-titles">
			@for($i=1; $i<=$departments->lastPage(); $i++)
				@foreach($depts as $dept)
					<a href="{{ $departments->url($i) }}"> {{ $dept->deptname }} |</a>
					<?php $i++ ?>
				@endforeach
			<?php break; ?>
			@endfor
		</div>
		@endif
    <br>
	<p class="heading">
		{{ $department->deptname }}
	</p>	
    <br>
	@endforeach

	<?php $j = 1 ?>

	<th>#</th>
	<th>Number</th>
	<th>First Name</th>
	<th>Sur Name</th>
	<th>Sub Department</th>

	@foreach($employees as $employee)
		@if($employee->deptid == $department->id)
			@foreach($extensions as $extension)
				@if($extension->empid == $employee->id)
					<tr><td><?php echo $j ?></td><td>{{ $extension->extid }}</td><td>{{ $employee->fname }}</td><td>{{ $employee->lname }}</td>
					@foreach($subdepartments as $subdepartment)
						@if($employee->subdeptid == $subdepartment->id)
							<td>{{ $subdepartment->sdeptname }}</td></tr>
						@endif
					@endforeach
					<?php $j++ ?>
				@endif
			@endforeach
		@endif
	@endforeach
	</table>
	<br>
	<br>
	<br>
	<br>
@endsection