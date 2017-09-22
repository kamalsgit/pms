<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\punching as punching;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PunchRespository;
use App\Repositories\EmployeeRespository;


class PunchingController extends Controller
{
	private $punchRespository;
	protected $employeeRespository;
    public function __construct(PunchRespository $punchRespository,EmployeeRespository $employeeRespository){
		$this->employeeRespository = $employeeRespository;
		$this->punchRespository =$punchRespository;
	}
	public function index(Request $request){
		$user = Auth::user();
		$user_id=$request->input('user_id');
		if (isset($user_id) && $user_id!="") {
			$punching = $this->punchRespository->getMyPunchThisMonth($user_id);
		}else {
			$punching = $this->punchRespository->getMyPunchThisMonth($user->emp_id);
		}
		
		$users = $this->employeeRespository->getMyEmployees()->paginate(1000);
		return view('dk.punching.mypunch',compact('punching','users','user_id'));
	}
}