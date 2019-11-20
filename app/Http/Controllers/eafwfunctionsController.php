<?php

namespace App\Http\Controllers;
use App\empDetailsTb;
use App\travelplanTb;
use App\vehicleTb;
use App\destinationTb;
use Illuminate\Http\Request;

Class eafwfunctionsController extends Controller
{
	public function vmvthome()
	{
		return view('vehiclemovement.vmvthome');
	}

	public function newtrip()
	{
		$drivers = empDetailsTb::where('deptid', 1800)->get();
		$vehicles = vehicleTb::all();
		$destinations = destinationTb::all();
		$drivers = empDetailsTb::all();

		$destinies = destinationTb::find(1);

		$travelplans = travelplanTb::all();

		return view('vehiclemovement.newtrip', ['drivers' => $drivers, 'vehicles' => $vehicles, 'destinies' => $destinies, 'destinations' => $destinations, 'travelplans' => $travelplans, 'drivers' => $drivers]);
	}

	public function newtrip2()
	{
		$destinations = destinationTb::all();
		$travelplans = travelplanTb::all();
		return view('vehiclemovement.newtrip2', ['travelplans' => $travelplans]);
	}

	public function add_newtrip(Request $request)
	{
		$this->validate($request, [
			'vehicleid' => 'required',
			'driverid' => 'required',
			'destinationid' => 'required',
			'mileageout' => 'numeric|required',
			'dateout' => 'required'
		]);

		$travelplan = new travelplanTb();
		$travelplan->vehid = $request['vehicleid'];
		$travelplan->drivid = $request['driverid'];
		$travelplan->save();
		$travelplan->destinations()->attach($request['destinationid'], ['mileageout' => $request['mileageout'], 'mileagein' => $request['mileagein'], 'dateout' => $request['dateout']]);

		return redirect()->route('newtrip')->with('success', 'New Trip Successful');
	}

	public function add_newtrip2(Request $request)
	{

	}
}