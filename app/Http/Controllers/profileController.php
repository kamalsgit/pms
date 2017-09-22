<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Carbon\Carbon;
use App\Employees;
class profileController extends Controller
{
    public function profileview()
    {
        $profile=Auth::User();
        $id = $profile->emp_id;

        $user = Employees::find($id);
		$user['dateofjoin'] = date('d M Y', $user->dateofjoin);
		if($user->anniversary!=0){
			$user['anniversary'] = date('d M Y', $user->anniversary);
		}
		if($user->birthday!=0){
			$user['birthday'] = date('d M Y', $user->birthday);
		}
        return view('dk.profile.profile',compact('user'));
    }
    public function updateProfile(){
        $post = request()->all();
        $bday = strtotime(request('birthday'));
        //$date = Carbon::parse(date_format($bday,'d M, Y'));
        //echo $date;
        //echo $bday;
		
        $id = Auth::User()->emp_id;
        $emp = Employees::findOrFail($id);
		
        $emp->name = request('name');
        $emp->gender = request('gender');
        $emp->phone_number = request('phone_number');
        $emp->personal_email = request('personal_email');
        $emp->personal_skype = request('personal_skype');
        $emp->birthday = $bday;
		
        $emp->current_address = request('current_address');
        $emp->perment_address = request('perment_address');
        $emp->is_married = request('is_married');
        if(request('is_married')!=0) {
            $emp->partner_name = request('partner_name');
            $emp->partner_phone = request('partner_phone');
            $emp->anniversary = strtotime(request('anniversary'));
        } else {
            $emp->partner_name = NULL;
            $emp->partner_phone = NULL;
            $emp->anniversary = NULL;
        }

        $res = $emp->save();
        //echo $res;
        return redirect('/profile');

    }

}