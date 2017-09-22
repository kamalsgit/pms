<?php
namespace App\Repositories;
use Rinvex\Repository\Repositories\EloquentRepository;


class ApprovelsRespository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

	public function __construct(){
	    $this->setModel('App\Client');
	} 

}

?>