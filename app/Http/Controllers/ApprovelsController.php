<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Approvels as Approvels;
use App\Roles as Roles;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ApprovelsRespository;
use App\Repositories\LeaveRespository;


class ApprovelsController extends Controller
{
	private $leaveRespository;
	public function __construct(LeaveRespository $leaveRespository){
		$this->leaveRespository = $leaveRespository;
	}
	public function index(){
        $approvels = [];
        $page = 'list';
		return view('approvels',compact('page','approvels'));
	}
	public function all_approvels(){
        $approvels = Approvels::all();
        return $approvels;
    }
	public function leaves_approvel(){
	    $user = Auth::user();
		if ($user->role_id==3) {
		    $leaves = $this->leaveRespository->allUnAproveLeaves();
			return view('dk.approvels.approveleaves',compact('leaves'));
		}else {
		    echo "No Authorize";
		}
	} 
	public function permission_approvel(){
	    $user = Auth::user();
		if ($user->role_id==3) {
		    $permissions = $this->leaveRespository->allUnAprovePermissions();
			return view('dk.approvels.approvepermission',compact('permissions'));
		}else {
		    echo "No Authorize";
		}
	} 
}