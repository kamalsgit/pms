<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Roles;
use App\team as Team;
use App\Employees as Employees;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Repositories\TeamRespository;
use App\Repositories\EmployeeRespository;
class TeamsController extends Controller
{
	private $teamRepository;
	protected $employeeRespository;
	public function __construct(EmployeeRespository $employeeRespository,TeamRespository $teamRepository){
		$this->teamRepository = $teamRepository;
		$this->employeeRespository = $employeeRespository;
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
		$teams = $this->teamRepository->getAllTeam();
		$page = 'list';
		return view('dk.teams.list',compact('page','teams'));
	}
	public function managerpage(){
		$teams = $this->teamRepository->getMyTeams()->paginate(5);
		$myemployees = $this->employeeRespository->getMyEmployees()->paginate(1000);

		return view('dk.teams.managerTeam',compact('teams','myemployees'));
	}
	public function create(Request $request){
		if (count($request->input())>0) {
			$this->validate($request, [
				'name'=>'required',
				'desc'=>'required',
				'teamlead'=>'required',
				'selectedmembers'=>'required',
				'teamstatus'=>'required'
			]);
			$team = new Team();
			$r = $team->store();
			if ($r==1 && $request->input('edit_emp') == null) {
				\Session::flash('message','Team successfully added.');
			}elseif ($r==1 && $request->input('edit_emp') != null) {
			    \Session::flash('message','Team successfully Updated.');
			}elseif ($r==1 && $request->input('edit_emp') != null) {
			    \Session::flash('message-fail','Team Update failed.');
			} else{
				\Session::flash('message-fail','Team Added failed.');
			}
		}
		return redirect('/teams');
	}
	public function allteams(){
		$teams = Team::all();
		return $teams;
	}
	public function teamedit($id){
        $teams = Team::get()->where('team_id',$id);
		$teams = $teams->first();
        return $teams;
    }
	public function teamleaders(){
		$lead_id = Roles::where('role_title','Team Leader')->first();
		$tls = $this->leaders($lead_id->role_id);
		return $tls;
	}
	public function teammembers(){
		$m = Roles::all();

		$members = Roles::whereIn('role_title',['Developer','Designer'])->get();
		$id = [];
		foreach($members as $k => $v){
			$id[] = $v->role_id;
		}
		$tms = $this->members($id);
		return $tms;
	}
	private function leaders($id){
		$leaders = Employees::where('role_id',$id)->select('emp_id','name')->get();
		return $leaders;
	}
	private function members($id){
		$members = Employees::whereIn('role_id',$id)->select('emp_id','name')->get();
		return $members;
	}
	public function team_delete($id){
		$teams = Team::destroy($id);
		return $teams;
    }
	public function myteam(){
		$user = Auth::user();
		if ($user->role_id==7 || $user->role_id==6) {
			$team = $this->teamRepository->getMyTeam();
			$team['lead_data'] = $team->leader;
			$team['mem_data'] =  $this->member($team->team_id);
			return view('dk.teams.myteam',compact('team'));
		}else {
		    return redirect('home');
		}
	} // end func
	public function member($team_id){
		return $this->teamRepository->getAllMembers($team_id);
	} // end func
}