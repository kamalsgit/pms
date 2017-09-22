<?php
namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EmployeeRespository;
//use App\Employees;

class TeamRespository extends EloquentRepository
{
    protected $team;
    protected $repositoryId = 'rinvex.repository.uniqueid';
	private $employee;
	public function __construct(EmployeeRespository $employee){
		$this->employee = $employee;
	    $this->setModel('App\Team');
	}
	public function getMyTeam(){
	    $teamid = Auth::user()->TeamId;
		return $this->where("team_id",$teamid)->first();
	}
	public function getAllMembers($teamid){
	    $memb = $this->select("members")->where("team_id",$teamid)->first();
		$memb = json_decode($memb['members']);
		return $this->employee->getArrayOfEmployees($memb);
	} // end func
	public function getAllTeam(){
	    return $this->select("team_id","team_name")->get();
	}
	public function getMyTeams(){
		$user = Auth::user();
		if ($user->role_id < 4) {
		    return $this->select("*")->latest();
		}elseif ($user->role_id==5) {
		    return $this->select("*")->where('manager',$user->emp_id)->latest();
		}elseif ($user->role_id==6) {
		    
		}
		return [];
	}
}

?>