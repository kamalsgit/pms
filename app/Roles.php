<?php

namespace App;

class Roles extends Model
{
    public function role_title(){
		return Roles::where('role_id',$this->role_id);
	}
}
