<?php

namespace App;
use Illuminate\Support\Facades\Input;

class project extends Model
{
   protected $table = 'project';
   protected $primaryKey ='project_id';
   public function store(){
		$project = new project;
		if (Input::get('edit_project')!=null) {
		    $project = project::find(Input::get('edit_project'));
		}
		$project->title = Input::get('title');
		$project->description = Input::get('description');
		$project->start_date =strtotime(Input::get('start_date'));
		$project->end_date = strtotime(Input::get('end_date'));
		$project->team_id = substr(Input::get('team_id'),7);
		$project->project_state = substr(Input::get('status_id'),7);
		$project->is_deleted = 0;
		return $project->save();
   }
   public function project_status(){
       return $this->hasOne("App\status","status_id","project_state");
   } // end func
   public function team_name(){
       return $this->hasOne("App\Team","team_id","team_id");
   } // end func
}
