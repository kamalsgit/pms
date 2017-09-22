<?php
namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Auth;
class TasksRespository extends EloquentRepository{
	protected $team;
	protected $repositoryId = 'rinvex.repository.uniqueid';
	private $employee;
	public function __construct(){
		$this->setModel('App\Task');
	}
	public function alltasksofmine($id){
		$tasks = $this->select("*")->where("assignee",$id)->latest();
		return $tasks;
	}
	public function taskdetails($taskid){
		return $this->select("*")->where('task_id',$taskid)->first();	
	}
	public function attensiondetails($id){
		return $this->select("*")->where('task_id',$id)->first();
	}
	public function tasksAssignedByMe($id,$status=1){
	    $tasks = $this->select('*')->where("lead",$id)->where('task_status',$status)->latest();
		return $tasks;
	}
}

?>