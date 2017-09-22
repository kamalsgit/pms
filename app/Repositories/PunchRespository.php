<?php
namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EmployeeRespository;
use App\Repositories\PermissionRespository;

class PunchRespository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';
	private $employeeRespository;
	private $permissionRespository;
	public function __construct(EmployeeRespository $employeeRespository,PermissionRespository $permissionRespository){
	    $this->setModel('App\punching');
		$this->employeeRespository = $employeeRespository;
		$this->permissionRespository = $permissionRespository;
	}
	public function getMyPunchThisMonth($emp_id){
		$punching = $this->whereRaw('MONTH( FROM_UNIXTIME(emp_intime) ) = MONTH( CURDATE( ) )')->where('emp_intime','<',mktime(0,0,0,date('m'),date('d'),date('Y')))->where('emp_id', '=',$emp_id)->get();
		$arr = [];
		$m = date('m');
		$y = date('Y');
		$d=cal_days_in_month(CAL_GREGORIAN,$m,$y);
		foreach ($punching as $k => $v) {
			$da = date('j', $v['emp_intime']);
			$arr[$da]['intime'] = $v['emp_intime'];
			$arr[$da]['outtime'] = $v['emp_outtime'];
			$arr[$da]['dur'] = gmdate("H:i:s",($v['emp_outtime'] - $v['emp_intime']));
		}
		$user = $this->employeeRespository->getEmployeeById($emp_id);
		$um = date('m',$user->dateofjoin);
		$uy = date('Y',$user->dateofjoin);
		$ud = date('j',$user->dateofjoin);
	
		for ($i=1;$i<=$d ;$i++) {
			$diff = date_diff(date_create("$uy-$um-$ud"),date_create("$y-$m-$i"));

			if (intval($diff->format("%R%a"))>=0 && (	mktime(0,0,0,$m,$i,$y) < mktime(0,0,0,date('m'),date('j'),date('Y')))) {
				if (! isset($arr[$i])) {
					//$s = $this->permissionRespository->isAmLeave($emp_id,"$y-$m-$i");
					$arr[$i]['leave']=1;
				}else {
				    $arr[$i]['leave']=0;
				}
				$arr[$i]['date'] = date_create("$y-$m-$i")->format('d M, Y');
			}
		}
		ksort($arr);
		return $arr;
	}
}
?>