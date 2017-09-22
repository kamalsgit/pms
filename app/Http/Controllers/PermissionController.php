<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\permission;
use App\Permission_type;
use App\Leaves;
use App\Leave_status;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PermissionRespository;
class PermissionController extends Controller
{
	private $permissionRespository;
	public function __construct(PermissionRespository $permissionRespository){
	    $this->permissionRespository = $permissionRespository;
	} // end func
	public function index(){

        $permissions =[];
        $page = 'list';
		return view('permissions',compact('page','permissions'));
	}
	public function permissiondetails(){
       $permissions = permissions::all();
        return $permissions;
    }
	public function allroles(){
		$r = Roles::all();
		return $r;
	}
	
	public function apply_permission(Request $request){
		if (count($request->input())>0) {
			$this->validate($request, [
				'start_time' => 'required|min:5|max:35',
				'end_time' => 'required',
				'permission_type' => 'required',
				'reason' => 'required|max:255'
			]);
			/* $r = $this->permissionRespository->store_permission(); */
			$per = new permission();
			$r = $per->store_perm();
	
			if ($r==1 && $request->input('edit_per') == null) {
				\Session::flash('message','Permission successfully added.');
			}elseif ($r==1 && $request->input('edit_per') != null) {
			    \Session::flash('message','Permission successfully Updated.');
			}elseif ($r==1 && $request->input('edit_per') != null) {
			    \Session::flash('message-fail','Permission Update failed.');
			} else{
				\Session::flash('message-fail','Permission Added failed.');
			}
			return redirect('/performance');
		}
	}

	public function leave_types(){
		$all = Leaves::all();
		return $all;
	}
	public function leave_stats(){
		$all = Leave_status::all();
		return $all;
	}	
	public function permission_edit($pid){
		return $this->permissionRespository->getPemissionById($pid);
	}
	public function permission_types(){
		$all = Permission_type::all();
		return $all;
	}
	public function apply_leave(Request $request){
		if (count($request->input())>0) {
			$this->validate($request, [
				'startdate' => 'required',
				'enddate' => 'required',
				'leavetype' => 'required',
				'leave_reason' => 'required|max:255'
			]);
			/* $r = $this->permissionRespository->store_leave(); */
			$per = new permission();
			$r = $per->store_leave();
			
			if ($r==1 && $request->input('edit_leav') == null) {
				\Session::flash('message','Leave successfully added.');
			}elseif ($r==1 && $request->input('edit_leav') != null) {
			    \Session::flash('message','Leave successfully Updated.');
			}elseif ($r==1 && $request->input('edit_leav') != null) {
			    \Session::flash('message-fail','Leave Update failed.');
			} else{
				\Session::flash('message-fail','Leave Added failed.');
			}
			return redirect('/performance');
		}
	}
	
	public function permission_del($id){
		$permissions = permission::destroy($id);
		return $permissions;
	}
	
}

?>