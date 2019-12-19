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

	public function ovnreturning()
	{
		$vehicles = vehicleTb::orderBy('vehtype', 'asc')->get();
		$destinations = destinationTb::all();
		$drivers = empDetailsTb::orderBy('fname')->where('subdeptid', 1205)->get();
		$destinies = destinationTb::all();
		$travelplans = travelplanTb::orderBy('id', 'desc')->where('datein', null)->paginate(5);

		return view('vehiclemovement.ovnreturning', ['drivers' => $drivers, 'vehicles' => $vehicles, 'destinies' => $destinies, 'destinations' => $destinations, 'travelplans' => $travelplans, 'drivers' => $drivers]);
	}

	public function edit_ovnreturning($id)
	{
		$travelplan = travelplanTb::find($id);
		$drivers = empDetailsTb::orderBy('fname')->where('subdeptid', 1205)->get();
		$vehicles = vehicleTb::orderBy('vehtype', 'asc')->get();
		return view('vehiclemovement.edit_ovnreturning', ['travelplan' => $travelplan, 'drivers' => $drivers, 'vehicles' => $vehicles]);
	}

	public function update_ovnreturning(Request $request, $id)
	{
			$this->validate($request, [
			'vehicleid' => 'required',
			'driverid' => 'required',
			'mileagein' => 'numeric|required',
			'datein' => 'required',
			'datein' => 'required',
		]);

		$travelplan = travelplanTb::findorFail($id);
		$travelplan->vehid = $request['vehicleid'];
		$travelplan->drivid = $request['driverid'];
		$travelplan->mileagein = $request['mileagein'];
		$travelplan->datein = $request['datein'];
		$travelplan->timein = $request['timein'];
		$travelplan->save();

		return redirect()->route('newtrip')->with('success', 'Update Successful!');
	}

	public function add_newtrip(Request $request)
	{
		if($request['triptype'] == 'returntrip')
		{
			$this->validate($request, [
				'vehicleid' => 'required',
				'driverid' => 'required',
				'destname' => 'required',
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
		$travelplan->destname = $request['destname'];
		$travelplan->mileageout = $request['mileageout'];
		$travelplan->mileagein = $request['mileagein'];
		$travelplan->dateout = $request['dateout'];
		$travelplan->datein = $request['datein'];
		$travelplan->timeout = $request['timeout'];
		$travelplan->timein = $request['timein'];
		$travelplan->save();

		return redirect()->route('newtrip')->with('success', 'New Trip Successful');

		}

		else {
			$this->validate($request,[
				'vehicleid' => 'required',
				'driverid' => 'required',
				'destname' => 'required',
				'mileageout' => 'numeric|required',
				'dateout' => 'required',
				'timeout' => 'required'
			]);

		$travelplan = new travelplanTb();
		$travelplan->vehid = $request['vehicleid'];
		$travelplan->drivid = $request['driverid'];
		$travelplan->destname = $request['destname'];
		$travelplan->mileageout = $request['mileageout'];
		$travelplan->dateout = $request['dateout'];
		$travelplan->timeout = $request['timeout'];
		$travelplan->save();

		return redirect()->route('newtrip')->with('success', 'New Overnight Trip Successful');
	}
	}

	public function edit_newtrip($id)
	{
		$travelplan = travelplanTb::find($id);
		$drivers = empDetailsTb::orderBy('fname')->where('subdeptid', 1205)->get();
		$vehicles = vehicleTb::orderBy('vehtype', 'asc')->get();
		return view('vehiclemovement.edit_newtrip', ['travelplan' => $travelplan, 'drivers' => $drivers, 'vehicles' => $vehicles]);
	}

	public function update_newtrip(Request $request, $id)
	{
		if(($request['timein'] || $request['datein'] || $request['mileagein']) == null) {
			$this->validate($request, [
			'vehicleid' => 'required',
			'driverid' => 'required',
			'destname' => 'required',
			'mileageout' => 'numeric|required',
			'dateout' => 'required',
			'timeout' => 'required',
		]);

		$travelplan = travelplanTb::findorFail($id);
		$travelplan->vehid = $request['vehicleid'];
		$travelplan->drivid = $request['driverid'];
		$travelplan->destname = $request['destname'];
		$travelplan->mileageout = $request['mileageout'];
		$travelplan->dateout = $request['dateout'];
		$travelplan->timeout = $request['timeout'];
		$travelplan->save();

		return redirect()->route('newtrip')->with('success', 'Update Successful!');

		}

		else {

		$this->validate($request, [
			'vehicleid' => 'required',
			'driverid' => 'required',
			'destname' => 'required',
			'mileageout' => 'numeric|required',
			'mileagein' => 'numeric|required',
			'dateout' => 'required',
			'datein' => 'required',
			'timeout' => 'required',
			'timein' => 'required'
		]);
		
		$travelplan = travelplanTb::findorFail($id);
		$travelplan->vehid = $request['vehicleid'];
		$travelplan->drivid = $request['driverid'];
		$travelplan->destname = $request['destname'];
		$travelplan->mileageout = $request['mileageout'];
		$travelplan->mileagein = $request['mileagein'];
		$travelplan->dateout = $request['dateout'];
		$travelplan->datein = $request['datein'];
		$travelplan->timeout = $request['timeout'];
		$travelplan->timein = $request['timein'];
		$travelplan->save();

		return redirect()->route('newtrip')->with('success', 'Update Successful!');
	}
	}
}