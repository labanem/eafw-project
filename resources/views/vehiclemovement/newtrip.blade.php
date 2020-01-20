@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<h3 class="heading">Create New Trip</h3>

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
<form action="{{ route('add_newtrip') }}" method="post">
<div class="display-forms md-form">
	<table>
		<tr><td>Return Trip</td><td><input type="radio" name="triptype" value="returntrip" checked></td></tr>
		<tr><td>Overnight Trip</td><td><input type="radio" name="triptype" value="ovntrip"></td></tr>
	</table>

	<label for="vehicleid">Select Vehicle:</label><br>
	<select name="vehicleid" id="vehicleid">
		<option value="" selected disabled hidden>Select Car:</option>
		@foreach($vehicles as $vehicle)
			<option value="{{ $vehicle->id }}">{{ $vehicle->numberplate }} ({{ $vehicle->vehtype }})</option>
		@endforeach
		</select><br>
	<label for="driverid">Select Driver:</label><br>
	<select name="driverid" id="driverid">
		<option value="" selected disabled hidden>Select Driver:</option>
		@foreach($drivers as $driver)
			<option value="{{ $driver->id }}">{{ $driver->fname }} {{ $driver->lname }}</option>
		@endforeach
	</select>
	<br>

	<label for="timeout">Time Out:</label><br>
	<input placeholder="Time out" type="text" name="timeout" id="timeout" value="{{ old('timeout')}}"/><br>

	<label for="timein">Time In:</label><br>
	<input placeholder="Time in" type="text" name="timein" id="timein" value="{{ old('timein') }}" /><br>

	<label for="mileageout">Mileage Out:</label><br>
	<input placeholder="Mileage-Out" type="text" name="mileageout" id="mileageout" value="{{ old('mileageout') }}"/><br>

	<label for="mileagein">Mileage In:</label><br>
	<input placeholder="Mileage-In" type="text" name="mileagein" id="mileagein" value="{{ old('mileagein') }}"/><br>

	<label for="destname">Destination:</label><br>
	<input type="text" name="destname" id="destname"><br>

	<label for="dateout">Date Out:</label><br>
	<input placeholder="Date out" type="text" name="dateout" class="datepicker" value="{{ old('dateout') }}"/><br>

	<label for="datein">Date In:</label><br>
	<input placeholder="Date in" type="text" name="datein" class="datepicker" id="datein" value="{{ old('datein') }}"/><br>
		
	<input type="submit" value="Save" />
	<input type="hidden" value="{{ Session::token() }}" name="_token" />
</div>
</form>

<br>

<table id="display-tables">
	<th>#</th>
	<th>Car</th>
	<th>Driver</th>
	<th>Date Out</th>
	<th>Time Out</th>
	<th>Date In</th>
	<th>Time In</th>
	<th>Mileage Out</th>
	<th>Mileage In</th>
	<th>Destination</th>
	<th>Edit</th>
	<th>Delete</th>
	@foreach($travelplans as $travelplan)
		<tr>
			<td> {{ $travelplan->id }}</td>
			<td> {{ $travelplan->car->numberplate }} </td>
			<td> {{ $travelplan->driver->fname }} {{ $travelplan->driver->lname }}</td>
			<td> {{ $travelplan->dateout }} </td>
			<td> {{ $travelplan->timeout }} </td>
			<td> {{ $travelplan->datein }} </td>
			<td> {{ $travelplan->timein }} </td>
			<td> {{ $travelplan->mileageout }} </td>
			<td> {{ $travelplan->mileagein }} </td>
			<td> {{ $travelplan->destname }} </td>
			<td><a href="{{ action('eafwfunctionsController@edit_newtrip', $travelplan['id']) }}"><span class="fa fa-pencil"></span></a></td>
			<td>
				<form action="{{ action('eafwfunctionsController@destroy', $travelplan['id']) }}" method="POST">
					<input type="hidden" name="_method" value="DELETE" />
					<button class="fa fa-trash" onclick="return deleteFunction()"></button>
					<!--<a class="btn" href="#"><i class="fa fa-trash"></i></a>-->
					<input type="hidden" value="{{ Session::token() }}" name="_token" />
				</form>
			</td>
		</tr>
	@endforeach
</table>
<br>

<!--
@if($travelplans->lastPage() > 1)
	@for($i = 1; $i <= $travelplans->lastPage(); $i++)
		<a href="{{ $travelplans->url($i) }}">{{ $i }}</a>
	@endfor
@endif
-->

<div class="paginate-links">
	@if($travelplans->currentPage() !== 1)
		<a href="{{ $travelplans->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
	@endif
	@if($travelplans->currentPage() !== $travelplans->lastPage() && $travelplans->hasPages())
		<a href="{{ $travelplans->nextPageUrl() }}"><span class="fa fa-caret-right"></span></a>
	@endif
	</div>
<br>
<br>
@endsection