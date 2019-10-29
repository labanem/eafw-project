<?php

namespace App\Http\Controllers;

use App\deptTb;
use App\emailsTb;
use App\empDetailsTb;
use App\weekOffTb;
use App\extTb;
use App\subDeptTb;
use App\compTb;
use Illuminate\Http\Request;
use DB;

class eafwprojectController extends Controller
{
	public function getHome()
	{
		return view('home');
	}

	public function getAbout()
	{
		return view('mainpageinfo.about');
	}

	public function getHelp()
	{
		return view('mainpageinfo.help');
	}

	public function getcompMails()
	{
		$emails = emailsTb::with('employee')->get()
   			->sortBy(function($email) { 
       		return $email->employee->fname;
  		});
   			
		$employees = empDetailsTb::orderBy('fname')->get();
		return view('maininfo.compmails', ['emails' => $emails, 'employees' => $employees]);
	}

	public function goLogin()
	{
		return view('adminviews.login');
	}

	public function adminMain()
	{
		return view('adminviews.adminmain');
	}

	public function employeeadd()
	{
		$departments = deptTb::orderBy('deptname')->get();
		$companies = compTb::orderBy('compname')->get();
		$subdepartments = subDeptTb::orderBy('sdeptname')->get();
		$weekoffs = weekOffTb::all();
		return view('adminviews.employeeadd', ['departments' => $departments, 'companies' => $companies, 'subdepartments' => $subdepartments, 'weekoffs' => $weekoffs]);
	}

	public function employeeedit()
	{
		$employees = empDetailsTb::where('empstatus', 1)->orderBy('fname')->paginate(10);
		return view('adminviews.employeeedit', ['employees' => $employees]);
	}

	public function add_employee(Request $request)
	{
		$this->validate($request, [ 
			'id' => 'required|numeric|unique:emp_details_tbs',
			'fname' => 'required',
			'lname' => 'required',
			'compid' => 'required',
			'deptid' => 'required',
			'weekid' => 'required'
		]);
		
		$employee = new empDetailsTb();
		$employee->id = $request['id'];
		$employee->fname = ucfirst(strtolower($request['fname']));
		$employee->lname = ucfirst(strtolower($request['lname']));
		$employee->deptid = $request['deptid'];
		$employee->weekid = $request['weekid'];
		$employee->compid = $request['compid'];
		$employee->save();

		return redirect()->route('employeeadd')->with('success', 'New Employee Added!');
	}

	public function edit_employee($id)
	{
		$employee = empDetailsTb::find($id);

		$departments = deptTb::all();
		$weekoffs = weekOffTb::all();

		return view('adminviews.edit_employee', compact('employee', 'id'), ['departments' => $departments, 'weekoffs' => $weekoffs]);
		//$departments = deptTb::orderBy('deptname')->get();
		//$weekoffs = weekOffTb::all();
		//if(isset($request['id'])){
		//	$employees = empDetailsTb::where('id', $request['id'])->get();
		//	return view('adminviews.edit_employee', ['employees' => $employees, 'departments' => $departments, 'weekoffs' => $weekoffs]);
		//}
		//return redirect()->route('employeeedit');		
	}

	public function update_employee(Request $request, $id)
	{
		$this->validate($request, [
			'fname' => 'required|alpha',
			'lname' => 'required|alpha'
		]);

		//$id = $request->input('id');

		$employee = empDetailsTb::findorFail($id);
		//$employee = empDetailsTb::where('id', $request['id']);
		$employee->fname = ucfirst(strtolower($request->get('fname')));
		$employee->lname = ucfirst(strtolower($request->get('lname')));		
		$employee->deptid = $request->get('deptid');
		$employee->weekid = $request->get('weekid');
		$employee->save();

		return redirect()->route('employeeedit')->with('success', 'Update Successful!');
	}

	#dump controller
	public function testees(Request $request, $id)
	{
		dd(request()->all());
	}
	#end of dump controller



	public function getExtensions()
	{
		$departments = deptTb::orderBy('deptname')->paginate(1);
		$employees = empDetailsTb::where('empstatus', 1)->get();
		$extensions = extTb::orderBy('extid')->get();
		$depts = deptTb::orderBy('deptname')->get();
		$subdepartments = subDeptTb::all();
		return view('maininfo.extensions', ['departments' => $departments, 'depts' => $depts, 'employees' => $employees, 'extensions' => $extensions, 'subdepartments' => $subdepartments]);
	}

	public function getcompMails2()
	{
		$emp_details = empDetailsTb::whereHas('dept_tb', function($query){
						$query -> where('id', '=', '1000');
						})->get();

		$emp_details = empDetailsTb::all();
		$emp_details = empDetailsTb::orderBy('fname')->get();

		//$emp_details = DB::table('emp_details_tbs')
		//				->join('dept_tbs','emp_details_tbs.dept_tbs_id', '=', 'dept_tbs.id')
		//				->orderBy('deptname')
		//				->get();

		$wk_emails = wkEmailsTb::orderBy('wkemail')->get();

		$wk_emails = wkEmailsTb::whereHas('emp_detail_tb', function($query){
			$query -> where('empstatus', '=', 1);
					})->get();

		//$emails = DB::table('wk_emails_tbs')->where('id', '2')->value('emp_details_tbs_id');

		$depts = deptTb::find('1100')->wk_emails_tb; //hasManyThrough relationship
		//$depts = DB::table('dept_tbs')->get();
		$depts = deptTb::all();
		return view('maininfo.compmails', ['wk_emails' => $wk_emails, 'depts' => $depts, 'emp_details' => $emp_details]);
	}

	public function filterMails(Request $request)
	{
		$depts = deptTb::all();
		$employees = empDetailsTb::all();
		if(isset($request['dname'])){
			$departs = deptTb::find($request['dname'])->wk_emails_tb;
			$departments = deptTb::where('id', $request['dname'])->get();
			return view('maininfo.compmailsfilt', ['dname' => $request['dname'], 'departs' => $departs, 'employees' => $employees, 'departments' => $departments]);
		}
		return redirect()->back();
	}

	public function filterMails2(Request $request)
	{
		if(isset($request['ename'])){
			$employs = empDetailsTb::where('id', $request['ename'])->get();
			$wk_emails = wkEmailsTb::where('emp_details_tbs_id', $request['ename'])->get();
			$extensions = extTb::where('extstatus', 1)->get();
			return view('maininfo.compmailsfilt2', ['ename' => $request['ename'], 'employs' => $employs, 'wk_emails' => $wk_emails, 'extensions' => $extensions]);
		}
		return redirect()->back();
	}

	public function getSatoffs()
	{
		$weekoffs = weekOffTb::paginate(1);
		$employees = empDetailsTb::where('empstatus', 1)->orderBy('fname')->get();
		return view('maininfo.satoffs', ['weekoffs' => $weekoffs, 'employees' => $employees]);
	}
}