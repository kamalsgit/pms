<?php

namespace App\Http\Controllers;

use App\Repositories\AttendanceRespository;
use Illuminate\Http\Request;
use App\attendance;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PermissionRespository;
class PerformanceController extends Controller
{
	protected $attendanceRespository;
	protected $permissionRespository;

	public function __construct(AttendanceRespository $attendanceRespository,PermissionRespository $permissionRespository){
        $this->attendanceRespository = $attendanceRespository;
        $this->permissionRespository = $permissionRespository;
    }
	public function index(){
        $performance = [];
		$permissions = $this->permissionRespository->getMyPemissionlist(Auth::user()->emp_id)->paginate(5);

		foreach ($permissions as $k => $v ) {
		    $permissions[$k]['leavetype'] = $v->leavetype;
		    $permissions[$k]['permstatus'] = $v->permstatus;
			if ($v->permission_type!=0) {
			    $permissions[$k]['permissiontype'] = $v->permissiontype;
			}
		}
        $page = 'list';
		return view('dk.performance.performance',compact('page','performance','permissions'));
	}
	public function performancedetails(){
        $performance = performance::all();
        return $performance;
    }
	public function starttime(){
		$user = Auth::user();
		if (isset($user->emp_id)){
			$emp_id = $user->emp_id;
			$attend = $this->attendanceRespository->getAttendanceById($emp_id); 
			if(count($attend) >0){
				$attend['success'] = 1;
				echo json_encode($attend);
			}else{
				$r = $this->attendanceRespository->addAttendance($emp_id);
				$this->starttime();
			}
		}
	}
	public function stoptheday(){
		$user = Auth::user();
		$emp_id = $user->emp_id;
		if (isset($user->emp_id)){
			$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
			$attend = $this->attendanceRespository->getAttendanceById($emp_id,$today);
			if(count($attend) >0){
				$attendance = new attendance();
				$r = $attendance->stoptime($attend->id);
				$attend['success'] = 0;
				$attend = $r;
				echo json_encode($attend);
			}
		}
	}
}