<?php
namespace App\Repositories;
use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Auth;

class EmployeeRespository extends EloquentRepository
{
    protected $employee;
    protected $repositoryId = 'rinvex.repository.uniqueid';

	public function __construct(){
	    $this->setModel('App\Employees');
	}
	public function getAllEmployees(){
	    return $this->select('emp_id','role_id','name','business_email','business_skype','phone_number')
			->latest();
	}
	public function getEmployeeById($id){
	    return $this->get()->where('emp_id',$id)->first();
	}
	public function getArrayOfEmployees($array=[]){
	    if (count($array)>0) {
	        return $this->select("emp_id", "name","business_email")
				->whereIn('emp_id',$array)
				->get();
	    }else {
	        return [];
	    }
	} // end func
	public function getAllManager(){
	    return $this->select("emp_id","name")->where("role_id",5)->get();
	} // end func
	public function getMyEmployees(){
		$user = Auth::user();

		if ($user->role_id < 4) {
		    return $this->select("*")->where("emp_id","!=",$user->emp_id)->latest();
		}elseif ($user->role_id==5) {
		    return $this->select("*")->where('manager',$user->emp_id)->latest();
		}elseif ($user->role_id==6) {
		    
		}
		return [];
	}
}

?>