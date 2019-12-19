@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<section id="">
	
	@if(count($errors)>0)
	<div class="form-fail">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	</div>
	@endif

	<h3 class="heading">Edit Trip</h3>

	@if($travelplan->datein == null) 

	<!--overnight trip -->

		<form action="{{ route('update_newtrip', $travelplan->id) }}" method="post">
		<div class="display-forms">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PATCH" />

			<label for="id">Travel ID: </label>
			<input type="text" value="{{ $travelplan->id }}" name="id" id="id" disabled /><br>

			<label for="vehicleid">car: </label>
			<select name="vehicleid" id="vehicleid">
				<option value="{{ $travelplan->vehid }}">{{ $travelplan->car->numberplate }} ({{ $travelplan->car->vehtype }})</option>
				@foreach($vehicles as $vehicle)
					<option value="{{ $vehicle->id }}">{{ $vehicle->numberplate }} ({{ $vehicle->vehtype }})</option>
				@endforeach
			</select>
			<br>

			<label for="driverid">Driver: </label>
			<select name="driverid" id="driverid">
				<option value="{{ $travelplan->drivid }}">{{ $travelplan->driver->fname }} {{ $travelplan->driver->lname }}</option>
				@foreach($drivers as $driver)
					<option value="{{ $driver->id }}">{{ $driver->fname }} {{ $driver->lname }}</option>
				@endforeach
			</select>
			<br>

			<label for="timeout">Time Out:</label><br>
			<input placeholder="Time out" type="text" name="timeout" id="timeout" value="{{ $travelplan->timeout }}"/><br>

			<label for="timein">Time In:</label><br>
			<input placeholder="Time in" type="text" name="timein" id="timein" value="{{ $travelplan->timein }}" disabled /><br>

			<label for="mileageout">Mileage Out:</label><br>
			<input placeholder="Mileage-Out" type="text" name="mileageout" id="mileageout" value="{{ $travelplan->mileageout }}"/><br>

			<label for="mileagein">Mileage In:</label><br>
			<input placeholder="Mileage-In" type="text" name="mileagein" id="mileagein" value="{{ $travelplan->mileagein }}" disabled/><br>

			<label for="destname">Destination: </label>
			<input type="text" value="{{ $travelplan->destname }}" name="destname" id="destname" /><br>
			<br>

			<label for="dateout">Date Out:</label><br>
			<input placeholder="Date out" type="text" name="dateout" class="datepicker" value="{{ $travelplan->dateout }}"/><br>

			<label for="datein">Date In:</label><br>
			<input placeholder="Date in" type="text" name="datein" class="datepicker" value="{{ $travelplan->datein }}" disabled /><br>	
			<br>

			<input type="submit" value="Update" /> 
			<input type="hidden" value="{{ Session::token() }}" name="_token">
		</div>
	</form>

	@else

	<!--return trip -->

	<form action="{{ route('update_newtrip', $travelplan->id) }}" method="post">
		<div class="display-forms">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PATCH" />

			<label for="id">Travel ID: </label>
			<input type="text" value="{{ $travelplan->id }}" name="id" id="id" disabled /><br>

			<label for="vehicleid">car: </label>
			<select name="vehicleid" id="vehicleid">
				<option value="{{ $travelplan->vehid }}">{{ $travelplan->car->numberplate }} ({{ $travelplan->car->vehtype }})</option>
				@foreach($vehicles as $vehicle)
					<option value="{{ $vehicle->id }}">{{ $vehicle->numberplate }} ({{ $vehicle->vehtype }})</option>
				@endforeach
			</select>
			<br>

			<label for="driverid">Driver: </label>
			<select name="driverid" id="driverid">
				<option value="{{ $travelplan->drivid }}">{{ $travelplan->driver->fname }} {{ $travelplan->driver->lname }}</option>
				@foreach($drivers as $driver)
					<option value="{{ $driver->id }}">{{ $driver->fname }} {{ $driver->lname }}</option>
				@endforeach
			</select>
			<br>

			<label for="timeout">Time Out:</label><br>
			<input placeholder="Time out" type="text" name="timeout" id="timeout" value="{{ $travelplan->timeout }}"/><br>

			<label for="timein">Time In:</label><br>
			<input placeholder="Time in" type="text" name="timein" id="timein" value="{{ $travelplan->timein }}" /><br>

			<label for="mileageout">Mileage Out:</label><br>
			<input placeholder="Mileage-Out" type="text" name="mileageout" id="mileageout" value="{{ $travelplan->mileageout }}"/><br>

			<label for="mileagein">Mileage In:</label><br>
			<input placeholder="Mileage-In" type="text" name="mileagein" id="mileagein" value="{{ $travelplan->mileagein }}"/><br>

			<label for="destname">Destination: </label>
			<input type="text" value="{{ $travelplan->destname }}" name="destname" id="destname" /><br>
			<br>

			<label for="dateout">Date Out:</label><br>
			<input placeholder="Date out" type="text" name="dateout" class="datepicker" value="{{ $travelplan->dateout }}"/><br>

			<label for="datein">Date In:</label><br>
			<input placeholder="Date in" type="text" name="datein" class="datepicker" value="{{ $travelplan->datein }}"/><br>	
			<br>

			<input type="submit" value="Update" /> 
			<input type="hidden" value="{{ Session::token() }}" name="_token">
		</div>
	</form>

	@endif

<br>
<br>
</section>

@endsection