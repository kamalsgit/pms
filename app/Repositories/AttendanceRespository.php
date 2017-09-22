<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Attendance as Attendance;
use Rinvex\Repository\Repositories\EloquentRepository;

class AttendanceRespository extends EloquentRepository
{	
    protected $attendance;
    protected $repositoryId = 'rinvex.repository.uniqueid';
	
	public function __construct(){
	    $this->setModel('App\Attendance');
	}
	
	public function getAttendanceById($id){
		$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
	    return $this->get()->where('emp_id',$id)->where('emp_intime','>',$today)->first();
	}
	public function addAttendance($id){
		return $this->insert(array('emp_id'=>$id,"emp_intime"=>time()));
	}
	public function attendanceLogout($id){
		$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
		$attend = $this->getAttendanceById($id);
		return $attend->id;
	}
	public function newLogin(){
		$emp = Auth::user()->emp_id;
		if (count($this->getAttendanceById($emp))==0) {
		    $this->addAttendance($emp);
		}
	}
}

?>