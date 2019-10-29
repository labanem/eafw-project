@extends('layouts.master')
@section('content')
	<br>
	<br>
	<br>
	<br>
	@foreach($employs as $employ)
		{{ $employ->fname }} {{ $employ->lname }}
		<br>
		{{ $employ->dept_tb->deptname }}
	@endforeach
	<br>
	<br>
	<?php echo "Email" ?>
	<br>
	<!--This if statement is unnecessary because we are already passing only the employees that have and email #lambe-->
	@if(count($wk_emails) == 0)
		<?php echo "USER DOES NOT HAVE A COMPANY EMAIL!" ?>
		<br>
	<!--end of unnecessary code #lambe-->
	@else
		@foreach($wk_emails as $wk_email)
			{{ $wk_email->wkemail }} 
			<br>		
		@endforeach
	@endif
	<br>
	<?php echo "Extension" ?>
	<br>
	@foreach($employs as $employ)
		@foreach($extensions as $extension)
			@if($employ->id == $extension->empid)
				{{ $extension->extid }}
				<br>
			@endif
		@endforeach
	@endforeach
	<br>
	<br>
	<br>
@endsection