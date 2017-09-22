<?php
namespace App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DateTime;
class permission extends Model
{
	protected $table='emp_leaves';
	//protected $primaryKey='emp_id';

	public function leavetype(){
	    return $this->hasOne('App\Leaves','id','leave_type');
	}
	public function permissiontype(){
	    return $this->hasOne('App\Permission_type','id','permission_type');
	}
	public function permstatus(){
	    return $this->hasOne('App\status','status_id','status');
	}
	
	public function leavestatus(){
	    return $this->hasOne('App\Leave_status','id','status');
	}
	
	public function employee(){
	    return $this->hasOne('App\Employees','emp_id','emp_id');
	}
	
	public function store_perm(){
		$per = new permission;
		if (Input::get('edit_per')!=null) {
		    $per = permission::find(Input::get('edit_per'));
		}
		$per->emp_id 			= Auth::id();
		$per->start				= date_create(Input::get('permission_date'). ' '.substr(Input::get('start_time'), 0, -3))->getTimestamp();
		$per->end			    = date_create(Input::get('permission_date'). ' '.substr(Input::get('end_time'), 0, -3))->getTimestamp();
		$per->reason			= Input::get('reason');
		$per->permission_type	= substr(Input::get('permission_type'),7);
		return $r = $per->save();
	}
	public function store_leave(){
		$per = new permission;
		if (Input::get('edit_leav')!=null) {
		    $per = permission::find(Input::get('edit_leav'));
		}
		$per->emp_id 			= Auth::id();
		$per->start				= date_create(Input::get('startdate'))->getTimestamp();
		$per->end			    = date_create(Input::get('enddate'))->getTimestamp();
		$per->reason			= Input::get('leave_reason');
		$per->permission_type	= 0;
		$per->leave_type        = substr(Input::get('leavetype'),7);
		return $r = $per->save();
	}
	
}