@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<h3 class="heading">Vehicle Movement</h3>
	<p>
		<a class="btn" href="{{ route('newtrip') }}">
	  	<i class="fa fa-pencil"></i> New Trip / Edit</a>
  	</p>
	<p>
		<a class="btn" href="{{ route('ovnreturning') }}">
	  	<i class="fa fa-reply"></i> Returning</a>
  	</p>
@endsection
