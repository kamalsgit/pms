<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class Attension extends Model
{
    protected $table = 'attension';
	public function store(){
		$user = Auth::user();
		$userid = Auth::user()->emp_id;
		$attension = new Attension;

		$attension->emp_id = $userid;
		$attension->task_id = Input::get('task_id');
		$attension->lead_id = 0;
		$attension->reply_to = 0;
		$attension->is_watched = 0;
		$attension->attension = Input::get('attensions');
		return $attension->save();
	}
}