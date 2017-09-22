<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRespository;
class ClientController extends Controller
{
	protected $clientRespository;
	public function __construct(ClientRespository $clientRespository){
		$this->clientRespository = $clientRespository;
	}
	public function index(){
		$clients = $this->clientRespository->getAllClients()->paginate(5);
		return view('dk.client.list',compact('clients'));
	}
	public function edit($id){
	    $client = $this->clientRespository->getClientsById($id);
		return $client;
	}
	public function save(Request $request){
		//$req = file_get_contents("php://input");
		//$req = (array)json_decode($req);

		echo "<pre>";
		print_r($request->input());
		echo "</pre>";
		if (count($request->input())>0) {
		    $this->validate($request, [
				'name'=>'required',
				'address'=>'required',
				'skype'=>'required',
				'email'=>'required',
				'gender'=>'required',
				'phone_number'=>'required'
			]);
		}
	}
}
