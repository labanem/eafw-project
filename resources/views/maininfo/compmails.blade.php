@extends('layouts.master')

@section('content')
<br>
<br>
<br>

<p class="heading">
	Company Emails
</p>

<table id="display-tables">

	<th>#</th>
	<th>First Name</th>
	<th>Sur Name</th>
	<th>Email</th>

	<?php $i=1 ?>

	@foreach($emails as $email)
		<tr><td><?php echo $i ?></td><td>{{ $email->employee->fname }}</td><td>{{ $email->employee->lname }}</td><td>{{ $email->emailid }}</td></tr>
		<?php $i++ ?>
	@endforeach

</table>

<br>

@endsection