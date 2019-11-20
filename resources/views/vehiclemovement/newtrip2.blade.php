@extends('layouts.master')
@section('content')
<br>
<br>
<br>

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

<h3 class="heading">New Trip: Destination</h3>
<div id="form-center">
	<form action="" method="post">
	<div class="display-forms">
		<label for="destinationid">Select Destination:</label><br>
		<select name="destinationid" id="destinationid">
			<option value="" selected disabled hidden>Destination?</option>
			@foreach($destinations as $destination)
				<option value="{{ $destination->id }}">{{ $destination->destname }}</option>
			@endforeach
			</select>
			<br>

		<input type="submit" value="Save" />
		<input type="hidden" value="{{ Session::token() }}" name="_token" />
	</div>
	</form>
</div>
<br>
<br>

@endsection