<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\EmployeeRespository;
use App\Repositories\TeamRespository;
use App\Repositories\RolesRespository;
use App\Roles;
use App\Employees;

class EmployeesController extends Controller
{
	protected $employeeRespository;
	private $user;
	private $teamRepository;
	public function __construct(EmployeeRespository $employeeRespository,RolesRespository $rolesRespository,TeamRespository $teamRepository){
        $this->employeeRespository = $employeeRespository;
        $this->rolesRespository = $rolesRespository;
		$this->teamRepository = $teamRepository;
    }
	public function index(){
		$user = Auth::user();
		if ($user->role_id==3) {
		    return $this->hrpage();
		}elseif ($user->role_id==5) {
		    return $this->managerpage();
		}elseif ($user->role_id==6) {
		    return $this->leadpage();
		}
	}
	public function hrpage(){
		$user = Auth::user();
		if ($user->role_id==3) {
			$employees = $this->employeeRespository->getMyEmployees()->paginate(5);
			$roles = $this->rolesRespository->getAllRoles();
			$managers = $this->employeeRespository->getAllManager();
			return view('dk.employee.list',compact('employees','roles','user',"managers"));
		}else {
		    echo "No authorized";
		}
	}
	public function managerpage(){
	    $user = Auth::user();
		if ($user->role_id==5) {
			$employees = $this->employeeRespository->getMyEmployees()->paginate(5);
			$roles = $this->rolesRespository->getAllRoles();
			$teams = $this->teamRepository->getMyTeams();
			return view('dk.employee.manager',compact('employees','roles','user'));
		}else {
		    echo "No authorized";
		}
	}
	public function create(Request $request){
		if (count($request->input())>0) {
			$this->validate($request, [
				'name' => 'required|max:255',
				'personal_email' => 'required|email',
				'business_email' => 'required|email',
				'manager' => 'required',
				'personal_skype' => 'required',
				'bussiness_skype' => 'required',
				'dateofjoin' => 'required',
				'phone_number' => 'required|numeric',
				'birthday' => 'required',
				'perment_address' => 'required',
				'current_address' => 'required'
			]);
			$emp = new Employees();
			$r = $emp->store();

			if ($r==1 && $request->input('edit_emp') == null) {
				\Session::flash('message','Employee successfully added.');
			}elseif ($r==1 && $request->input('edit_emp') != null) {
			    \Session::flash('message','Employee successfully Updated.');
			}elseif ($r==1 && $request->input('edit_emp') != null) {
			    \Session::flash('message-fail','Employee Update failed.');
			} else{
				\Session::flash('message-fail','Employee Added failed.');
			}
		}
		return redirect('/employees');
	}

	public function employeeedit($id){
		$employees = $this->employeeRespository->getEmployeeById($id);		
		return $employees;
    }
	public function employee_delete($id){
		$employees = Employees::destroy($id);
		return $employees;
    }
}