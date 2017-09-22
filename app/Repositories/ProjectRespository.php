<?php
namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TasksRespository;
use App\Repositories\EmployeeRespository;

class ProjectRespository extends EloquentRepository{
	protected $team;
	protected $repositoryId = 'rinvex.repository.uniqueid';
	private $tasksRespository;
	public function __construct(TasksRespository $tasksRespository){
		$this->tasksRespository = $tasksRespository;
	    $this->setModel('App\project');
	}
	public function allMyProjects($emp_id){
		return $this->select("*")->whereIn('project_id',$this->tasksRespository->select("project_id")->distinct()->where('assignee',$emp_id)->get());
	}
	public function leadProjects($emp_id){
		return $this->select("*")->where('lead',$emp_id)->latest();
	}

	public function projectDetail($proj_id){
		return $this->select("*")->where('project_id',$proj_id)->first();
	}
}
?>