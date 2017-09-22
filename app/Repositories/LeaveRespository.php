<?php
namespace App\Repositories;
use Rinvex\Repository\Repositories\EloquentRepository;


class LeaveRespository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

	public function __construct(){
	    $this->setModel('App\permission');
	} 
	public function allUnAproveLeaves(){
	    return $this->select("*")->where('leave_type','>','0')->where('is_approved',0)->where('is_cancelled',0)->get();
	}
	public function allUnAprovePermissions(){
	    return $this->select("*")->where('permission_type','>','0')->where('is_approved',0)->where('is_cancelled',0)->get();
	}
}

?>