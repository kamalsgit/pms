<?php

namespace App;
use Illuminate\Support\Facades\Input;

class team extends Model
{
    protected $table = 'team';
	protected $primaryKey='team_id';
	public function store(){
		$l = Input::all();
		
		$team = new team();
		if (Input::get('edit_team')!='') {
		   $team = team::find(Input::get('edit_team'));
		}
		
		$team->team_name = Input::get('name');
		$team->team_description = Input::get('desc');
		$team->lead = substr(Input::get('teamlead'),7);
		$all = json_decode(Input::get('selectedmembers'));
		$ids = [];
		foreach ($all as $a => $v) {
		    $id[]=$v->emp_id;
		}
		
		$team->members = json_encode($id);
		$team->is_active = Input::get('teamstatus');
		$team->is_deleted = 0;
		return $team->save();
	}
	public function leader(){
	    return $this->hasOne('App\Employees','emp_id','lead');
	} // end func
}