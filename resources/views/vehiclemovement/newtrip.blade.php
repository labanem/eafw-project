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
<div id="form-center">
	<form action="{{ route('add_newtrip') }}" method="post">
	<div class="display-forms">
		<label for="vehicleid">Select Vehicle:</label><br>
		<select name="vehicleid" id="vehicleid">
			<option value="" selected disabled hidden>Select Car:</option>
			@foreach($vehicles as $vehicle)
				<option value="{{ $vehicle->id }}">{{ $vehicle->numberplate }}</option>
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

		<label for="destinationid">Select Destination:</label><br>
		<select name="destinationid" id="destinationid">
			<option value="" selected disabled hidden>Select Destination:</option>
			@foreach($destinations as $destination)
				<option value="{{ $destination->id }}">{{ $destination->destname }}</option>
			@endforeach
		</select>
		<br>

		<label for="mileageout">Mileage Out:</label><br>
		<input type="text" name="mileageout" id="mileageout" /><br>

		<label for="dateout">Date Out:</label><br>
		<input type="text" name="dateout" id="datepicker" /><br>

		<label for="timeout">Time:</label><br>
		<input type="text" name="timeout" id="" /><br>

		<input type="submit" value="Save" />
		<input type="hidden" value="{{ Session::token() }}" name="_token" />
	</div>
	</form>

	<table id="display-tables">
	<th></th>
	@foreach($destinies as $destiny)	
		@foreach($destiny->travelplans as $travelplan)
			@foreach($drivers as $driver)
				@if($travelplan->drivid == $driver->id)
					<tr><td>{{ $travelplan->drivid }}</td><td>{{ $driver->fname }}</td><td>{{ $driver->lname }}</td><td>{{ $travelplan->pivot->dateout }}</td></tr>
				@endif
			@endforeach
		@endforeach
	@endforeach
	</table>

</div>
<br>
<br>
@endsection