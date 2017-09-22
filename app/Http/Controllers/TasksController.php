<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project as Project;
use App\status as status;
use App\Task as Task;
use App\Priority as Priority;
use App\Employees as Employees;
use App\task_type as task_type;
use App\Attension as Attension;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TasksRespository;

class TasksController extends Controller
{
	private $tasksRespository;
	public function __construct(TasksRespository $tasksRespository){
		$this->tasksRespository = $tasksRespository;
	}
	public function index(){
        $tasks = [];
        $page = 'list';
		return view('tasks',compact('page','tasks'));
	}

  	public function priority(){
        $priority = Priority::all();
        return $priority;
    }
  	public function task_type(){
        $task_type = Task_type::all();
        return $task_type;
    }
	public function project_task($id){
		$task = new Task;
		$tasks = $task->where('project_id',$id)->get();
		$page = 'list';
		return view('tasks',compact('page','tasks','id'));
    }
	public function edit_task($id){
		$tasks = Task::get()->where('task_id',$id);
		$tasks = $tasks->first();
		return $tasks;
    }
	public function create(Request $request, $id){
		if (count($request->input())>0) {
			$this->validate($request, [
				'title'=>'required',
				'description'=>'required',
				'task_type'=>'required',
				'priority'=>'required',
				'assignee'=>'required',
				'start_date'=>'required',
				'end_date'=>'required',
				'task_status'=>'required'
			]);
			$task = new Task();
			$r = $task->store();
			if ($r==1 && $request->input('edit_task') == null) {
				\Session::flash('message','Task successfully added.');
			}elseif ($r==1 && $request->input('edit_task') != null) {
			    \Session::flash('message','Task successfully Updated.');
			}elseif ($r==1 && $request->input('edit_task') != null) {
			    \Session::flash('message-fail','Task Update failed.');
			} else{
				\Session::flash('message-fail','Task Added failed.');
			}
		}
		return redirect('/tasks/'.$id);
	}
	public function attension(Request $request){
		if (count($request->input())>0) {
			$this->validate($request, [
				'attensions'=>'required'
			]);
			$attension = new Attension();
			$r = $attension->store();
			
			if ($r==1 && $request->input('attensions') != null) {
				\Session::flash('message','Attension successfully added.');
			}else {
				\Session::flash('message-fail','Attension Added failed.');
			}
		}
		return redirect('/mytasks');
	}
	
	public function task_delete($id){
		$task = Task::destroy($id);
		return $task;
    }
	public function mytasks(){
		$user = Auth::user();
		if ($user->role_id==7 || $user->role_id==6) {
			$userid = Auth::user()->emp_id;
			$tasks = $this->tasksRespository->alltasksofmine($userid)->paginate(10);
			if (count($tasks)>0) {
				foreach ( $tasks as $k => $task ) {
					$tasks[$k]['project'] = $task->projectname;
					$tasks[$k]['task_priority'] = $task->task_priority;
					$tasks[$k]['task_type_detail'] = $task->task_type_detail;
					$tasks[$k]['task_status_details'] = $task->task_status_details;
					$tasks[$k]['task_assignee'] = $task->task_assignee;
					$tasks[$k]['start_date'] = date('d M Y', $task['start_date']);
					$tasks[$k]['end_date'] = date('d M Y', $task['end_date']);
				}
			}
			return view('dk.tasks.mytasks',compact('tasks'));
		}else {
		    return redirect('home');
		}
	}
	public function taskdetails($id){
		$taskdetails = $this->tasksRespository->taskdetails($id);
			$taskdetails['project'] = $taskdetails->projectname;
			$taskdetails['task_priority'] = $taskdetails->task_priority;
			$taskdetails['task_type_detail'] = $taskdetails->task_type_detail;
			$taskdetails['task_status_details'] = $taskdetails->task_status_details;
			$taskdetails['task_assignee'] = $taskdetails->task_assignee;
			$taskdetails['start_date'] = date('d M Y', $taskdetails['start_date']);
			$taskdetails['end_date'] = date('d M Y', $taskdetails['end_date']);
		return $taskdetails;
	}
	public function attensiondetails($id){
		$attensiondetails = $this->tasksRespository->attensiondetails($id);
		$atensiondetails['mychat'] = $attensiondetails->mychat;
		return $attensiondetails;
	}
	
	public function TeamLeaderTasks(){
		$user = Auth::user();
		if ($user->role_id==6) {
			$tasks = $this->tasksRespository->tasksAssignedByMe($user->emp_id)->paginate(10);
			return view('dk.tasks.TLtasks',compact('tasks'));
		}else {
		    echo "NO Authorized ";
		}
	} 
}