<?php

namespace App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class Employees extends Model
{
	/*protected $table='tbl_employee';*/
	protected $primaryKey='emp_id';
	public function roles(){
		return $this->hasOne('App\Roles','role_id','role_id');
	}
	public function store(){
		$emp = new employees;
		if (Input::get('edit_emp')!=null) {
		    $emp = Employees::find(Input::get('edit_emp'));
		}else {
		    $emp->password = Hash::make('pass@123');
		}
		$emp->name				= Input::get('name');
		$emp->gender			= Input::get('gender');
		$emp->personal_email	= Input::get('personal_email');
		$emp->business_email	= Input::get('business_email');
		$emp->personal_skype	= Input::get('personal_skype');
		$emp->business_skype	= Input::get('bussiness_skype');
		$emp->phone_number		= Input::get('phone_number');
		$emp->birthday			= strtotime(Input::get('birthday'));
		$emp->dateofjoin		= strtotime(Input::get('dateofjoin'));
		$emp->perment_address	= Input::get('perment_address');
		$emp->current_address	= Input::get('current_address');
		$emp->is_married		= Input::get('marital');
		$emp->partner_name		= Input::get('partner_name');
		$emp->partner_phone		= Input::get('partner_phone');
		$emp->anniversary		= strtotime(Input::get('anniversary'));
		$emp->role_id			= Input::get('roleId');
		$emp->manager			= Input::get('manager');
		return $r = $emp->save();
	}
}
?>