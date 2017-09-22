<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class attendance extends Model
{
	protected $table = 'attendance';

	public function stoptime($id){
		$attend = new attendance;
		$attend->emp_outtime	= time();
		return $r = $attend->where('id', $id)->update(array(
		'emp_outtime' 	  =>  time()
		));
	}
	
}