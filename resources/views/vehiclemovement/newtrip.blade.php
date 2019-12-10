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
	<div class="display-forms md-form">
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
		<input placeholder="Date" type="text" name="dateout" id="datepicker" /><br>

		<label for="input_starttime">Time Out:</label>
		<input placeholder="Time" type="text" id="input_starttime" class="form-control timepicker" />
  		
		<input type="submit" value="Save" />
		<input type="hidden" value="{{ Session::token() }}" name="_token" />
	</div>
	</form>

	<br>

	<!--
	<table id="display-tables">
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>

	@foreach($destinies as $destiny)	
		@foreach($destiny->travelplans as $travelplan)
			@foreach($drivers as $driver)
				@if($travelplan->drivid == $driver->id)
					@foreach($vehicles as $vehicle)
						@if($travelplan->vehid == $vehicle->id)
						<tr>
							<td>{{ $travelplan->id }}</td>
							<td>{{ $vehicle->numberplate }}</td>
							<td>{{ $driver->fname }} {{ $driver->lname }}</td>
							<td>{{ $travelplan->pivot->mileageout }}</td>
							<td>{{ $travelplan->pivot->dateout }}</td>
							<td>{{ $travelplan->pivot->timeout }}</td>
							<td>{{ $travelplan->pivot->datein }}</td>
							<td>{{ $travelplan->pivot->timein }}</td>
							<td><a href="{{ action('eafwfunctionsController@edit_travelplan', $travelplan['id']) }}">Edit</a></td>
							<td><a href="">Delete</a></td>
						</tr>
						@endif
					@endforeach
				@endif
			@endforeach
		@endforeach
	@endforeach
	</table>
	<br>
	<br>

	<p>From Travel Plan's perspective</p>

-->
	<table id="display-tables">
	<th>ID#</th>
	<th>Driver</th>
	<th>Destination</th>
	<th>Vehicle</th>
	<th>Mileage Out</th>
	<th>Mileage In</th>
	<th>Date Out</th>
	<th>Time Out</th>
	<th>Date In</th>
	<th>Time In</th>
	<th>Edit</th>
	<th>Delete</th>
	@foreach($travelplans as $travelplan)
		@foreach($travelplan->destinations as $plan)
			@foreach($vehicles as $vehicle)
				@if($travelplan->vehid == $vehicle->id)
					@foreach($destinies as $destiny)
						@foreach($destiny->travelplans as $destined)
							@if($destined->pivot->travelplan_tb_id == $travelplan->id)
								<tr>
									<td>{{ $travelplan->id }}</td>
									<td>{{ $travelplan->drivers->fname }} {{ $travelplan->drivers->lname }}</td>
									<td>{{ $plan->destname }}</td>
									<td>{{ $vehicle->numberplate }}</td>
									<td>{{ $destined->pivot->mileageout }}</td>
									<td>{{ $destined->pivot->mileagein }}</td>
									<td>{{ $destined->pivot->dateout }}</td>
									<td>{{ $destined->pivot->timeout }}</td>
									<td>{{ $destined->pivot->datein }}</td>
									<td>{{ $destined->pivot->timein }}</td>
								</tr>
							@endif
						@endforeach
					@endforeach
				@endif
			@endforeach
		@endforeach	
	@endforeach
	</table>


</div>
<br>
<br>
@endsection