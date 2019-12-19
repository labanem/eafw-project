@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<h3 class="heading">Vehicles Outside</h3>

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

<br>

<table id="display-tables">
	<th>Car</th>
	<th>Driver</th>
	<th>Date Out</th>
	<th>Time Out</th>
	<th>Date In</th>
	<th>Time In</th>
	<th>Mileage Out</th>
	<th>Mileage In</th>
	<th>Destination</th>
	<th>Return</th>
	@foreach($travelplans as $travelplan)
		<tr>
			<td> {{ $travelplan->car->numberplate }} </td>
			<td> {{ $travelplan->driver->fname }} {{ $travelplan->driver->lname }}</td>
			<td> {{ $travelplan->dateout }} </td>
			<td> {{ $travelplan->timeout }} </td>
			<td> {{ $travelplan->datein }} </td>
			<td> {{ $travelplan->timein }} </td>
			<td> {{ $travelplan->mileageout }} </td>
			<td> {{ $travelplan->mileagein }} </td>
			<td> {{ $travelplan->destname }} </td>
			<td><a href="{{ action('eafwfunctionsController@edit_ovnreturning', $travelplan['id']) }}">Return</a></td>
		</tr>
	@endforeach
</table>

<br>

@if($travelplans->lastPage() > 1)
	@for($i = 1; $i <= $travelplans->lastPage(); $i++)
		<a href="{{ $travelplans->url($i) }}">{{ $i }}</a>
	@endfor
@endif
<br>
<br>
@endsection