<?php

namespace SONRest\Controller;

use Zend\Controller\AbstractRestfulController;

class CategoriaController extends AbstractRestfulController
{
	public function getList()
	{
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$data = $em->getRepository('Application\Entity\Categoria')->findAll();

		return $data;
	}

	public function get($id)
	{

	}

	public function create($data)
	{

	}

	public function update($id, $data)
	{

	}

	public function delete($id)
	{
		
	}
}