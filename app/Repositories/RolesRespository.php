<?php
namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class RolesRespository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

	public function __construct(){
	    $this->setModel('App\Roles');
	}
	public function getAllRoles(){
		return $this->select('role_id','role_title')->get();
	}
}

?>