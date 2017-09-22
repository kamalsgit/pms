<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Login extends Authenticatable
{
	use Notifiable;
    protected $table='employees';
	protected $primaryKey = 'emp_id';
}
