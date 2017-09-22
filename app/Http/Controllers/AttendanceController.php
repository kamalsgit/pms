<?php

/* namespace App\Http\Controllers;

use App\Repositories\AttendanceRespository;
use Illuminate\Http\Request;
use App\attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
	protected $attendanceRespository;
	public function __construct(EmployeeRespository $attendanceRespository){
        $this->attendanceRespository = $attendanceRespository;
    }
	public function starttime(){
        
		$user = Auth::user();
		$emp_id = $user->emp_id;
		if (isset($user->emp_id)) {
		
		$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
		$attend = attendance::all()->where('emp_id', $emp_id)->where('emp_intime','>',$today);
	
		if(count($attend) >0){
			$array = array();
			$array['success'] = 1;
			$array['data'] = $attend['5'];
			echo json_encode($array);
		}else{
			$array = array(
				'emp_id'=>$emp_id,
				'emp_intime'=>time()
			);
			$attendance = new attendance();
			$r = $attendance->store();
			if($attend==1){
				$this->starttime();
			}else{
				$array = array();
				$array['success'] = 0;
				$array['data'] = $r;
				echo json_encode($array);
			}
		}
		}
	}
}
 */