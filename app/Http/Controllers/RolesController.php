<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\RolesRespository;

class RolesController extends Controller
{
	protected $rolesRespository;
	public function __construct(RolesRespository $rolesRespository){
        $this->rolesRespository = $rolesRespository;
    }
    public function allroles()
    {
		$res = $this->rolesRespository->getAllRoles();
		echo json_encode($res);
    }
}
