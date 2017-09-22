<?php

namespace App;
use Illuminate\Support\Facades\Input;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class task extends Model
{
    protected $table = 'tasks';
	protected $primaryKey ='task_id';
	public function store(){
		$task = new task;
		if (Input::get('edit_task')!=null) {
		    $task = task::find(Input::get('edit_task'));
		}
		$task->title = Input::get('title');
		$task->description = Input::get('description');
		$task->task_type = substr(Input::get('task_type'),7);
		$task->priority = substr(Input::get('priority'),7);
		$task->assignee = substr(Input::get('assignee'),7);
		$task->start_date =strtotime(Input::get('start_date'));
		$task->end_date = strtotime(Input::get('end_date'));
		$task->task_status = substr(Input::get('task_status'),7);
		$task->project_id = Input::get('projectID');
		$task->file_id = 1;
		$task->is_deleted = 0;
		return $task->save();
	}
	public function projectname(){
		return $this->hasOne('App\project','project_id','project_id');
	}
	public function task_type_detail(){
		return $this->hasOne('App\task_type','task_type_id','task_type');
	}
	public function task_priority(){
		return $this->hasOne('App\priority','priority_id','priority');
	}
	public function task_assignee(){
		return $this->hasOne('App\Employees','emp_id','assignee');
	}
	public function task_status_details(){
		return $this->hasOne('App\status','status_id','task_status');
	}
	public function mychat(){
		return $this->hasMany('App\Attension','task_id','task_id');
	}
}