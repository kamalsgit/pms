<?php
namespace App\Repositories;
use Rinvex\Repository\Repositories\EloquentRepository;


class ClientRespository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

	public function __construct(){
	    $this->setModel('App\Client');
	} 
	public function getAllClients(){
	    return $this;
	}
	public function getClientsById($id){
	    return $this->where('client_id',$id)
			->first();
	}
}

?>