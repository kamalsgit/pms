<?php
namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class PermissionRespository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

	public function __construct(){
	    $this->setModel('App\permission');
	}
	public function getMyPemissionlist($id){
	    return $this->where('emp_id',$id)->orderBy('id','desc');
	}
	public function getPemissionById($id){
	    return $this->get()->where('id',$id)->first();
	}
	public function store_permission(){
	    $arr = [];
		$arr['emp_id']	=  Auth::id();
		$arr['start'] = date_create(Input::get('permission_date'). ' '.substr(Input::get('start_time'), 0, -3))->getTimestamp();
		$arr['end'] = date_create(Input::get('permission_date'). ' '.substr(Input::get('end_time'), 0, -3))->getTimestamp();
		$arr['reason'] =Input::get('reason');
		$arr['permission_type'] =substr(Input::get('permission_type'),7);
		if (Input::get('edit_per')!=null) {
		    return $this->where('id',Input::get('edit_per')->update($arr));

		}else {
		    return $this->insert($arr);
		}
	}
	public function store_leave(){
	    $arr = [];
		$arr['emp_id']	= Auth::id();
		$arr['start'] =date_create(Input::get('startdate'))->getTimestamp();
		$arr['end'] =date_create(Input::get('enddate'))->getTimestamp();
		$arr['reason']= Input::get('leave_reason');
		$arr['permission_type']	= 0;
		$arr['leave_type']	= substr(Input::get('leavetype'),7);
		if (Input::get('edit_leav')!=null) {
			  return $this->where('id',Input::get('edit_leav'))
				->update($arr);
		}else {
		    return $this->insert($arr);
		}
	} // end func
}
?>