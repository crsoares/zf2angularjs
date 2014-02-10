<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $repo = $em->getRepository("Application\Entity\Categoria");
        
        /*$categoria = new Categoria();
        $categoria->setNome("Mouse");
        
        $em->persist($categoria);
        $em->flush();*/
        
        /*$categoriaService = $this->getServiceLocator()->get("Application\Service\Categoria");
        $categoriaService->update(array('id' => 3, 'nome' => 'monitor'));*/
        
        $categorias = $repo->findAll();
        
        /*$categoria = $repo->find(2);
        
        $produto = new Produto();
        $produto->setNome("Multilaiser")
                ->setDescricao("Mouser da multilaiser")
                ->setCategoria($categoria);
        
        $em->persist($produto);
        $em->flush();*/
        
        $produtoService = $this->getServiceLocator()->get("Application\Service\Produto");
        $produtoService->insert(array('categoriaId' => 3));
        
        return new ViewModel(array("categorias"=>$categorias));
    }
}
