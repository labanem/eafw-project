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

	<h3 class="heading">Edit Travel Plan</h3>	

	<form action="" method="post">
		<div class="display-forms">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PATCH" />

			<label for="id">Travel ID: </label>
			<input type="text" value="{{ $travelplan->id }}" name="id" id="id" disabled /><br>

			<label for="vehid">Car: </label>
			<input type="text" value="" name="vehid" id="vehid" disabled /><br>

			<label for="fname">Driver: </label>
			<input type="text" value="{{ $travelplan->drivers->fname }}" name="fname" id="fname" /><br>

			<label for="destination">Destination: </label>
			<input type="text" value="" name="destination" id="destination" /><br>
			<br>
			<br>

			<input type="submit" value="Update" /> 
			<input type="hidden" value="{{ Session::token() }}" name="_token">
		</div>
	</form>

<br>
<br>
</section>

@endsection