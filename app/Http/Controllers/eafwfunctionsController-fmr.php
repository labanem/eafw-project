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
		$vehicles = vehicleTb::orderBy('vehtype', 'asc')->get();
		$destinations = destinationTb::all();
		$drivers = empDetailsTb::orderBy('fname')->where('subdeptid', 1205)->get();
		$destinies = destinationTb::all();

		//$destinies = destinationTb::find(1)->travelplans()->get();
		//return $destinies;

		//$destinations = travelplanTb::find(30)->destinations;
		//return $destinations;

		$travelplans = travelplanTb::orderBy('id', 'desc')->paginate(5);
		//$travelplans = travelplanTb::find(43)->destinations()->get();
		//return $travelplans;

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
			'mileagein' => 'numeric|required',
			'dateout' => 'required',
			'datein' => 'required',
			'timeout' => 'required',
			'timein' => 'required'
		]);

		$travelplan = new travelplanTb();
		$travelplan->vehid = $request['vehicleid'];
		$travelplan->drivid = $request['driverid'];
		$travelplan->save();
		$travelplan->destinations()->attach($request['destinationid'], ['mileageout' => $request['mileageout'], 'mileagein' => $request['mileagein'], 'dateout' => $request['dateout'], 'datein' => $request['datein'], 'timeout' => $request['timeout'], 'timein' => $request['timein']]);

		return redirect()->route('newtrip')->with('success', 'New Trip Successful');
	}

	public function edit_travelplan($id)
	{
		$travelplan = travelplanTb::find($id);

		$plans = destinationTb::find(1)->travelplans;
		return $plans;

		$destination = travelplanTb::find($id)->destinations;
		//return $destination;

		$drivers = empDetailsTb::orderBy('fname')->where('subdeptid', 1205)->get();
		return view('vehiclemovement.edit_travelplan', ['travelplan' => $travelplan, 'destination' => $destination, 'drivers' => $drivers]);
	}
}