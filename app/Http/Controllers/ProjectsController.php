<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project as Project;
use App\status as status;
use App\team as Team;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProjectRespository;

class ProjectsController extends Controller
{
	private $projectRespository;
	public function __construct(ProjectRespository $projectRespository){
		$this->projectRespository = $projectRespository;
	}
	public function index(){
		$user = Auth::user();
		if ($user->role_id==6) {
			$projects = $this->projectRespository->leadProjects($user->emp_id)->paginate(5);
			$page = 'list';
			return view('dk.projects.list',compact('page','projects'));
		}else {
		    echo "NO Authorize";
		}
	}
	public function all_projects(){
        $Projects = project::all();
        return $Projects;
    }
	public function projectedit($id){
		$projects = project::get()->where('project_id',$id);
		$projects = $projects->first();
		return $projects;
    }
	public function project_status(){
        $status = status::all();
        return $status;
    }
	public function create(Request $request){
		if (count($request->input())>0) {
			$this->validate($request, [
				'title'=>'required',
				'description'=>'required',
				'start_date'=>'required',
				'end_date'=>'required',
				'team_id'=>'required',
				'status_id'=>'required'
			]);
			$project = new Project();
			$r = $project->store();
			if ($r==1 && $request->input('edit_project') == null) {
				\Session::flash('message','Project successfully added.');
			}elseif ($r==1 && $request->input('edit_project') != null) {
			    \Session::flash('message','Project successfully Updated.');
			}elseif ($r==1 && $request->input('edit_project') != null) {
			    \Session::flash('message-fail','Project Update failed.');
			} else{
				\Session::flash('message-fail','Employee Added failed.');
			}
		}
		return redirect('/projects');
	}
	public function project_delete($id){
		$projects = project::destroy($id);
		return $projects;
	}
	public function myprojects(){
		$user = Auth::user();
		if ($user->role_id==7 || $user->role_id==6) {
			$userid = Auth::user()->emp_id;
			$projects = $this->projectRespository->allMyProjects($userid)->paginate(1);
			if (count($projects)>0) {
			    foreach ($projects as $k => $project) {
			        $projects[$k]['project_status'] = $project->project_status;
			        $projects[$k]['start_date'] = date('d M Y', $project['start_date']);
			        $projects[$k]['end_date'] = date('d M Y', $project['end_date']);
			        $projects[$k]['team_name'] = $project->team_name;
			    }
			}
			return view('dk.project.myproject',compact('projects'));
		}else {
			return redirect('home');
		}
	}
	public function projectdetails($id){
		$projectdetails = $this->projectRespository->projectDetail($id);
		$projectdetails['project_status'] = $projectdetails->project_status;
		$projectdetails['start_date'] = date('d M Y', $projectdetails['start_date']);
		$projectdetails['end_date'] = date('d M Y', $projectdetails['end_date']);
		$projectdetails['team_name'] = $projectdetails->team_name;
		return $projectdetails;
	}
}