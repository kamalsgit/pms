<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Repositories\AttendanceRespository;
use App\attendance;

class LoginController extends Controller
{
	private $attendanceRespository;
	public function __construct(AttendanceRespository $attendanceRespository){
	    $this->attendanceRespository = $attendanceRespository;
	} // end func
	public function login(){
		if (Auth::check()) {
			$role = Auth::user()->role_id;
			if ($role==5) {
			    return redirect('/employees');
			}elseif ($role==6) {
			    return redirect('/tasks');
			}elseif ($role==7) {
			    return redirect('/mytasks');
			}else{
			    return redirect('/employees');
			}
		    
		}else {
		    return view('login');
		}
	}
	public function logout(){
		$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
		if (Auth::check()) {
			$attend = $this->attendanceRespository->getAttendanceById(Auth::user()->emp_id,$today);
			if(count($attend) >0){
				$attendance = new attendance();
				$r = $attendance->stoptime($attend->id);
			}
			Auth::logout(); 
		}
		return redirect('/login');
	}
	public function login_validation(Request $request){
		$data = Input::except(array('_token'));
		$rule = array(
				'email' => 'required|email',
				'password' => 'required'
		);
		$validator=Validator::make($data,$rule);
		$errors =$validator->errors();
		$this->errors=$errors;

		if ($validator->fails()) {
		   return view('login',compact('errors'));
		}else {
			$data1['business_email']=$data['email'];
			$data1['password']=$data['password'];
			if (Auth::attempt($data1)) {
				$this->attendanceRespository->newLogin();
				$role = Auth::user()->role_id;
				if ($role==5) {
					return redirect('/employees');
				}elseif ($role==6) {
					return redirect('/tasks');
				}elseif ($role==7) {
					return redirect('/mytasks');
				}else{
					return redirect('/employees');
				}
				
			}else {
				Session::flash('msg', "Invalid email or password. Please Try again! ");
			    return redirect('login');
			}
		}
	}
}