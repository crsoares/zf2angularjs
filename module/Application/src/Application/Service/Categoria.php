<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;

use Application\Entity\Categoria as CategoriaEntity;

class Categoria
{
    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function insert($nome)
    {
        $categoria = new CategoriaEntity;
        $categoria->setNome($nome);
        
        $this->em->persist($categoria);
        $this->em->flush();
        
        return $categoria;
    }
    
    public function update(array $data)
    {
        $categoria = $this->em->getReference("Application\Entity\Categoria", $data['id']);
        $categoria->setNome($data['nome']);
        
        $this->em->persist($categoria);
        $this->em->flush();
        
        return $categoria;
    }
    
    public function delete($id)
    {
        $categoria = $this->em->getReference("Application\Entity\Categoria", $id);
        
        $this->em->remove($categoria);
        $this->em->flush();
        
        return $id;
    }
}
